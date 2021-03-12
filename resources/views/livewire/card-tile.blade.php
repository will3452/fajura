<div class="flex w-full p-4 shadow rounded  items-start max-w-sm m-2 cursor-pointer hover:bg-gray-100" wire:click="goto()">
    <img src="{{$icon}}" alt="" class="w-12">
    <div class="ml-4">
        <h1 class="text-xl uppercase text-gray-800 font-bold">
            {{ $title }}
        </h1>
        <p class="text-gray-700">
            {{ $description }}
        </p>
    </div>
</div>
