<x-main-layout :currentdraft="false">
    <x-slot:title>Active Draft</x-slot:title>
    <x-slot:body>
        <x-draft.active.matches-body :draft="$draft">
            <x-slot:matches>
                @foreach($draft->matches->where('round_number', $draft->phase - 2) as $match)
                    <livewire:match-handler :match="$match" :wire:key="$match->match_id" />
                @endforeach
            </x-slot:matches>
        </x-draft.active.matches-body>
    </x-slot:body>
</x-main-layout>
