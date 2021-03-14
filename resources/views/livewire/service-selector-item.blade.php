<div wire:click="onSelect()" x-data="{active:false}" x-on:click="active = !active" :class="{'active':active, 'opacity-70 hover:opacity-100':!active}" class="p-4 shadow rounded w-full md:w-1/3 flex flex-col lg:flex-row lg:flex items-center m-2  cursor-pointer" >
    <img src="{{$service->public_picture}}" alt="" class="w-16 h-16 object-cover rounded-full my-6 lg:mr-3">
    <div>
        <h2 class="uppercase font-bold text-gray-900">{{$service->name}}</h2>
        <div class="font-bold text-xl">P {{number_format($service->fee, 2)}}</div>
        <p class="text-xs text-gray-500">{{\Illuminate\Support\Str::limit($service->description, 60)}}</p>
    </div>
</div>