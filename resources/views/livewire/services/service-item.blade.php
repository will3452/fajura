<tr class="" x-data="{isEditable:false, isDeleted:false}" x-show.transition="!isDeleted">
    <td>
        <img src="{{ $service->public_picture }}" alt="" class="w-16 h-16 object-cover">
    </td>
    <td>
        <div x-show="!isEditable">
            {{ $name }}
        </div>
        <div x-show="isEditable">
            <input  wire:model="name" ype="text" value="{{ $name }}" class="input">
        </div>
    </td>
    <td>
        <div x-show="!isEditable">
            {{ $description }}
        </div>
        <div x-show="isEditable">
            <input wire:model="description" type="text" value="{{ $description }}" class="input">
        </div>
    </td>
    <td>
        <div x-show="!isEditable">
            {{ $fee }}
        </div>
        <div x-show="isEditable">
            <input wire:model="fee" type="number" value="{{ $fee }}" class="input">
        </div>
    </td>
    <td>
        <a href="#" x-show="!isEditable" x-on:click="isEditable = true">
            <img src="/img/icons/edit.svg" alt="" class="w-4">
        </a>
        <a href="#" wire:click="submit()" x-show="isEditable" x-on:click="isEditable = false" class="p-1 px-2 text-sm bg-blue-500 text-white rounded">
            Save
        </a>
    </td>
    <td>
        <button class="font-bold text-2xl" wire:click="delete()" x-on:click="isDeleted=true">
            &times;
        </button>
    </td>
</tr>