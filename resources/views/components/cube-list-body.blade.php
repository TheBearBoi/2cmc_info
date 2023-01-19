<div class="mx-auto">
    <div class="relative">
        <div class="text-right pt-4 mx-8 absolute right-0">
            <input class="bg-slate-300 text-2xl rounded shadow-inner ring-2 ring-black px-1" id="card-search" type="text" placeholder="Search For A Card...">
        </div>
        <div class="mx-auto text-center">
            <p class="text-3xl font-semibold">2CMC Cube</p>
{{--            TODO Automatically set title--}}
            <p>by Teddy & Marlin</p>
        </div>
    </div>
    <div class="flex flex-auto flex-wrap justify-between my-4 mx-8">
        {{ $slot }}
    </div>
</div>
