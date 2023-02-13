<div class="mx-auto">
    <div class="grid grid-cols-3 justify-center justify-items-center">
        <div class="w-fit text-center col-start-2">
            <p class="text-3xl font-semibold">2CMC Cube</p>
{{--            TODO Automatically set title--}}
            <p>by Teddy & Marlin</p>
        </div>
        <div class="justify-self-end text-right pt-4 mx-8">
            <input class="bg-slate-300 text-2xl rounded shadow-inner ring-2 ring-black px-1" id="card-search" type="text" placeholder="Search For A Card...">
        </div>
    </div>
    <div class="flex flex-auto flex-wrap justify-between my-4 mx-8">
        {{ $slot }}
    </div>
</div>
