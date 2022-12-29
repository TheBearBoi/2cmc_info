<x-main-layout :currentdraft="false">
    <x-slot:title>Active Draft</x-slot:title>
    <x-slot:body>
        <x-draft.active.deck-building-teams-body :draft="$draft">
            <x-slot:team_1>
                @foreach($draft->seats->where('team_number', 1) as $seat)
                    <tr>
                        <td>{{ $seat->seat_number }}</td>
                        <td>{{ $seat->player->player_name }}</td>
{{--                        <td><livewire:deck-builder :seat="$seat" :wire:key="$seat->seat_id" /></td>--}}
                        <td><livewire:auto-deck-builder :seat="$seat" :wire:key="$seat->seat_id" /></td>
                    </tr>
                @endforeach
            </x-slot:team_1>
            <x-slot:team_2>
                @foreach($draft->seats->where('team_number', 2) as $seat)
                    <tr>
                        <td>{{ $seat->seat_number }}</td>
                        <td>{{ $seat->player->player_name }}</td>
{{--                        <td><livewire:deck-builder :seat="$seat" :wire:key="$seat->seat_id" /></td>--}}
                        <td><livewire:auto-deck-builder :seat="$seat" :wire:key="$seat->seat_id" /></td>
                    </tr>
                @endforeach
            </x-slot:team_2>
        </x-draft.active.deck-building-teams-body>
    </x-slot:body>
</x-main-layout>
