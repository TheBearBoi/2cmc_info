<x-main-layout :currentdraft="false">
    <x-slot:title>Active Draft</x-slot:title>
    <x-slot:body>
        <x-draft.active.drafting-body :draft="$draft">
            <x-slot:players>
                @foreach($draft->seats as $seat)
                    <tr>
                        <td>{{ $seat->seat_number }}</td>
                        <td>{{ $seat->player->player_name }}</td>
                    </tr>
                @endforeach
            </x-slot:players>
        </x-draft.active.drafting-body>
    </x-slot:body>
</x-main-layout>
