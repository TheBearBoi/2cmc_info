<x-main-layout>
    <x-slot:title>Cube List</x-slot:title>
    <x-slot:body>
        <x-cube-list-body>
            @foreach($cube_list as $sort_category_1)
                <div>
                @foreach($sort_category_1 as $sort_category_2)
                    <div>
                    @foreach($sort_category_2 as $sort_category_3)
                        <div>
                        @foreach($sort_category_3 as $card)
                                <x-card.hover-link :card="$card" />
                        @endforeach
                        </div>
                    @endforeach
                    </div>
                @endforeach
                </div>
            @endforeach
        </x-cube-list-body>
    </x-slot:body>
</x-main-layout>
