<div class="flex h-20 bg-blue-400 justify-between items-center">
    <div class="ml-16 text-3xl font-bold">
        LOGO
    </div>
    <ul class="flex m-0 place-content-end px-4 py-1  border-blue-300">
        <li data-active-page="{{ Illuminate\Support\Facades\Route::is('cards.*') }}"
            class="text-2xl font-semibold py-4 px-3 mx-1 rounded
        data-active:bg-blue-500 data-active:shadow-inner data-active:shadow-blue-600
        hover:data-inactive:bg-blue-300 hover:data-inactive:rounded
        hover:data-inactive:shadow hover:data-inactive:shadow-blue-500">
            <a href='{{ route('cards.list') }}'>Cards</a>
        </li>
        <li data-active-page="{{ Illuminate\Support\Facades\Route::is('statistics') }}"
            class="text-2xl font-semibold py-4 px-3 mx-1 rounded
        data-active:bg-blue-500 data-active:shadow-inner data-active:shadow-blue-600
        hover:data-inactive:bg-blue-300 hover:data-inactive:rounded
        hover:data-inactive:shadow hover:data-inactive:shadow-blue-500">
            <a href='{{ route('statistics') }}'>Statistics</a>
        </li>
        <li data-active-page="{{ Illuminate\Support\Facades\Route::is('drafts.*') }}"
            class="text-2xl font-semibold py-4 px-3 mx-1 rounded
        data-active:bg-blue-500 data-active:shadow-inner data-active:shadow-blue-600
        hover:data-inactive:bg-blue-300 hover:data-inactive:rounded
        hover:data-inactive:shadow hover:data-inactive:shadow-blue-500">
            <a href='{{ route('drafts.list') }}'>Drafts</a>
        </li>
        <li data-active-page="{{ Illuminate\Support\Facades\Route::is('players.*') }}"
            class="text-2xl font-semibold py-4 px-3 mx-1 rounded
        data-active:bg-blue-500 data-active:shadow-inner data-active:shadow-blue-600
        hover:data-inactive:bg-blue-300 hover:data-inactive:rounded
        hover:data-inactive:shadow hover:data-inactive:shadow-blue-500">
            <a href='{{ route('players.search') }}'>Players</a>
        </li>
        <li data-active-page="{{ Illuminate\Support\Facades\Route::is('decks.*') }}"
            class="text-2xl font-semibold py-4 px-3 mx-1 rounded
        data-active:bg-blue-500 data-active:shadow-inner data-active:shadow-blue-600
        hover:data-inactive:bg-blue-300 hover:data-inactive:rounded
        hover:data-inactive:shadow hover:data-inactive:shadow-blue-500">
            <a href='{{ route('decks.search') }}'>Decks</a>
        </li>
    </ul>
</div>
