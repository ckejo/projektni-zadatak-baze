<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Coach;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class CoachesTable extends Component
{
    public $nameSearch = "";
    public $nickSearch = "";
    public $surnameSearch = "";
    public $teamSearch = "";
    public $sortBy = "";
    public $sortDir = "";

    public function resetFilters()
    {
        $this->nameSearch = "";
        $this->nickSearch = "";
        $this->surnameSearch = "";
        $this->teamSearch = "";
        $this->sortBy = "";
        $this->sortDir = "";
    }

    public function setSortBy($sortCol)
    {
        if ($this->sortBy == $sortCol) 
        { 
            $this->sortDir = ($this->sortDir == "ASC") ? "DESC" : "ASC"; 
            return;
        }
        else
        {
            $this->sortBy = $sortCol;  
            $this->sortDir = "ASC";
        }
    }

    public function getTeamID()
    {
        return DB::scalar("SELECT IDTima FROM timovi WHERE ImeTima = ". "'". $this->teamSearch ."'");
    }
    
    public function render()
    {
        return view('livewire.coaches-table', [
            "coaches" => Coach::where("Ime", "like", "%". $this->nameSearch ."%")
                              ->when($this->nickSearch, function ($query) {
                                    $query->where("Nadimak","like", "%".$this->nickSearch ."%");
                              })
                              ->when($this->surnameSearch, function ($query) {
                                    $query->where("Prezime","like", "%". $this->surnameSearch ."%");
                              })
                              ->when($this->teamSearch !== "", function ($query) {
                                    $query->where("IDTima", "=", $this->getTeamID());
                              })
                              ->when($this->sortBy && $this->sortDir, function ($query) {
                                    $query->orderBy($this->sortBy, $this->sortDir);
                              })
                              ->get(),
            "teams" => Team::all()
        ]);
    }
}
