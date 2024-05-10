<div>
    <div class="rounded-xl flex flex-row py-6 mt-8 mx-auto w-3/4 gap-x-10 text-white bg-gray-800 justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
        </svg> 

        <input wire:model.live.debounce.150ms="nameSearch" class="placeholder:text-center rounded-full px-2 py-1 text-white bg-gray-700" type="text" placeholder="Ime trenera">
        <input wire:model.live.debounce.150ms="nickSearch" class="placeholder:text-center rounded-full px-2 py-1 text-white bg-gray-700" type="text" placeholder="Nadimak trenera">
        <input wire:model.live.debounce.150ms="surnameSearch" class="placeholder:text-center rounded-full px-2 py-1 text-white bg-gray-700" type="text" placeholder="Prezime trenera">
        <select wire:model.live="teamSearch" class="rounded-full py-2 px-2 bg-gray-700" id="firstTeamSelect">
            @foreach ($teams as $team)
                <option value="{{ $team->ImeTima }}">{{ $team->ImeTima }}</option>
            @endforeach
            <option selected value="" class="text-gray-500">Ime tima</option>
        </select>
    </div>
    <div class="flex justify-center py-2 rounded-t-lg overflow-hidden">
        <table class="px-5 pt-10 w-3/4 rounded-t-lg">
            <thead class="bg-gray-800">
                <th class="rounded-tl-xl py-3 font-bold text-white">Ime</th>
                <th class="py-3 font-bold text-white">Nadimak</th>
                <th class="py-3 font-bold text-white">Prezime</th>
                <th class="rounded-tr-xl py-3 font-bold text-white">Ime tima</th>
            </thead>
            <tbody class="[&>*:nth-child(odd)]:bg-gray-700 [&>*:nth-child(even)]:bg-gray-600">
                @foreach ($coaches as $coach)
                    <tr class="text-white text-center">
                        <td class="py-2">{{ $coach->Ime }}</td>
                        <td class="py-2">{{ $coach->Nadimak }}</td>
                        <td class="py-2">{{ $coach->Prezime }}</td>
                        <td class="py-2">
                            @if ($coach->IDTima == null)
                                Nije u timu
                            @else
                                {{ $coach->getTeamName() }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
