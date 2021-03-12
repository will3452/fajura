<tr x-data="{isEdit:false, isDeleted:false}" x-show.transition="!isDeleted" class="text-sm border-t-2 border-b-2 border-gray-100">
    <td>
        <div x-show="!isEdit">
            {{ $account->email }}
        </div>
        <div x-show="isEdit">
            <input type="text" class="input" value="{{$account->email}}" wire:model="email">
        </div>
    </td>
    <td>
        <div x-show="!isEdit">
            {{ $account->name }}
        </div>
        <div x-show="isEdit">
            <input type="text" class="input" value="{{$account->name}}" wire:model="name">
        </div>
    </td>
    <td>
        <div x-show="!isEdit" class="capitalize">
            {{ $account->type }}
        </div>
        <div x-show="isEdit">
            <select name="type" id="" class="input" wire:model="type">
                <option value="doctor" {{ $account->type == 'doctor' ? 'selected':'' }}>Doctor</option>
                <option value="staff" {{ $account->type == 'staff' ? 'selected':'' }}>Staff</option>
            </select>
        </div>
    </td>
    <td>
        <a href="#" x-show="!isEdit" x-on:click.prevent="isEdit = true">
            <img src="/img/icons/edit.svg" alt="" class="w-4">
        </a>
        <a href="#" wire:click="submit()" x-show="isEdit" x-on:click.prevent="isEdit = false" class="p-1 px-2 bg-blue-500 rounded text-white">
            Save
        </a>
    </td>
    <td>
        <button class="font-bold text-2xl" wire:click="delete()" x-on:click="isDeleted = true">
            &times;
        </button>
    </td>
</tr>