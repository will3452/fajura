@extends('layouts.app')

@section('content')
    
    <div class="p-2 flex justify-center flex-wrap flex-col mt-2 w-screen items-center" x-data="{showCreate:false}">
        <div class="flex w-full max-w-6xl bg-red justify-end">
            <button class=" bg-blue-500 p-1 text-sm rounded text-white px-2 hover:bg-blue-600" x-on:click="showCreate = !showCreate">
                <div x-show="!showCreate">
                    &plus; Create New
                </div>
                <div x-show="showCreate">
                    &times; Close
                </div>
            </button>
        </div>
        <div class="w-full max-w-6xl" x-show.transition="showCreate">
            @livewire('accounts.create-account')
        </div>
        @livewire('accounts.list-account', ['accounts'=>$accounts])

    </div>
@endsection