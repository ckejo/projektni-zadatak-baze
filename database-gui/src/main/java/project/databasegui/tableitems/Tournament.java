package project.databasegui.tableitems;

import java.time.LocalDate;

public class Tournament
{
    private String name;
    private LocalDate startDate;
    private LocalDate endDate;
    private String location;
    private int prizePool;
    private boolean isBig;

    public String getName() { return name; }
    public void setName(String name) { this.name = name; }

    public LocalDate getStartDate() { return startDate; }
    public void setStartDate(LocalDate startDate) { this.startDate = startDate; }

    public LocalDate getEndDate() { return endDate; }
    public void setEndDate(LocalDate endDate) { this.endDate = endDate; }

    public String getLocation() { return location; }
    public void setLocation(String location) { this.location = location; }

    public int getPrizePool() { return prizePool; }
    public void setPrizePool(int prizePool) { this.prizePool = prizePool; }

    public boolean getIsBig() { return isBig; }
    public void setIsBig(boolean isBig) { this.isBig = isBig; }

    public Tournament(String name, LocalDate startDate, LocalDate endDate, String location, int prizePool, boolean isBig)
    {
        this.name = name;
        this.startDate = startDate;
        this.endDate = endDate;
        this.location = location;
        this.prizePool = prizePool;
        this.isBig = isBig;
    }
}
