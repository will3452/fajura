<div class="m-2 shadow w-full rounded p-6">
    <div class="bg-green-300 text-green-900 rounded p-2" wire:loading wire:target="store">
        Creating ...
    </div>
    @if($errors->any())
                
        <div class="text-xs text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>

    @endif
    @if ($success)
        <div class="text-xs text-green-500">
            User Added
        </div>
    @endif
    <h1 class="px-2 text-left text-xl font-bold">Create new account</h1>
    <form action="{{route('accounts.store')}}" method="POST" class="p-2">
        @csrf
        <div class="mt-2">
            Type
            <select name="type" wire:model="type" id="" class="input">
                <option value="doctor">Doctor</option>
                <option value="staff">Staff</option>
            </select>
        </div>
         <div class="mt-2">
             Name:
             <input wire:model="name" type="text" class="input" name="name">
         </div>
         <div class="mt-2">
             Email:
             <input wire:model.lazy="email" type="email" class="input" name="email">
             @error('email')
                
                <div class="text-xs text-red-500">
                    {{$message}}
                </div>

             @enderror
         </div>
         <div class="mt-2">
             Password:
             <input wire:model="password" type="password" class="input" name="password">
         </div>
         <button class="btn btn-blue mt-2" wire:click.prevent="store">
             Create
         </button>
    </form>
</div>