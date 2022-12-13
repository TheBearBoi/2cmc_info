<x-main-layout :currentdraft="false">
    <x-slot:title>Active Draft</x-slot:title>
    <x-slot:body>
        <x-draft.active.deck-building-body :draft="$draft">
            <x-slot:players>
                @foreach($draft->seats as $seat)
                    <tr>
                        <td>{{ $seat->seat_number }}</td>
                        <td>{{ $seat->player->player_name }}</td>
                        <td><livewire:deck-builder :seat="$seat" :wire:key="$seat->seat_id" /></td>
                        <td><livewire:auto-deck-builder :seat="$seat" :wire:key="$seat->seat_id" /></td>
                    </tr>
                @endforeach
            </x-slot:players>
        </x-draft.active.deck-building-body>
    </x-slot:body>
</x-main-layout>
