@extends('layouts.app')

@section('content')
    <div class="w-full flex p-6 justify-center" x-data="{showCreate:false}">
        <div class="rounded shadow w-full max-w-6xl p-6">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">
                    Services
                </h1>
                <button x-show="!showCreate" x-on:click="showCreate= !showCreate" class="p-1 px-2 text-sm bg-blue-500 text-white rounded">
                    &plus; Add New
                </button>
                <button x-show="showCreate" x-on:click="showCreate = !showCreate" class="p-1 px-2 text-sm bg-blue-500 text-white rounded">
                    &times; Close
                </button>
            </div>
            <p class="text-gray-600">Manage your services.</p>
            <div class="p-6 shadow w-full rounded mt-6" x-show.transition="showCreate">
                <h2 class="text-lg font-bold">Add Details</h2>
                <form action="#" class="mt-2">
                    <div>
                        <label for="">Name</label>
                        <input type="text" name="name" class="input">
                    </div>
                    <div class="mt-2">
                        <label for="">Description</label>
                        <textarea name="description" id="" class="input"></textarea>
                    </div>
                    <div class="mt-2">
                        <label for="">Fee</label>
                        <input type="number" name="fee" class="input">
                    </div>
                    <button class="btn btn-blue mt-4">Submit</button>
                </form>
            </div>
            <table class="w-full mt-6">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Fee
                    </th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </table>
        </div>
    </div>
@endsection