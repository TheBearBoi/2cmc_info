<x-main-layout>
    <x-slot:title>Cube List</x-slot:title>
    <x-slot:body>
        <x-cube-list-body>
            @foreach($cube_list as $key => $sort_category_1)
                <div class="min-w-0 truncate basis-40 mx-1 mt-4 border-black border-4 rounded-lg h-min {{ $sort_category_1_coloring_enum[$key] }}"> {{--Sort Category 1 (WUBRG multi colorless land--}}
                    <div class="text-center text-xl font-semibold">{{ $key }}</div>
                @foreach($sort_category_1 as $key => $sort_category_2)
                    <div class="truncate border-black border-y-2 p-1">
                        {{--Sort Category 2--}}
                        {{--creature instant sorcery artifact enchantment land allied-colors enemy-colors--}}
                        <div class="text-center text-lg font-semibold">{{ $key }}</div>
                    @foreach($sort_category_2 as $key => $sort_category_3)
                        <ul class="mt-4"> {{--Sort Category 3 cmc--}}
                        @foreach($sort_category_3 as $card)
                                <li class="text-xs"><x-card.hover-link :card="$card" /></li>
                        @endforeach
                        </ul>
                    @endforeach
                    </div>
                @endforeach
                </div>
            @endforeach
        </x-cube-list-body>
    </x-slot:body>
</x-main-layout>
