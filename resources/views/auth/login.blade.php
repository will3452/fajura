@extends('layouts.app')

@section('content')
    <div class="flex p-2">
        <div class="hidden w-1/2 md:flex items-center ">
            <div class="w-full h-auto px-4">
                <h1 class="font-black  text-gray-900  md:text-4xl lg:text-5xl">
                    FAJURA DENTAL MANAGEMENT SYSTEM
                </h1>
                <p class="text-xl text-gray-700">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad ex sequi, esse consectetur sunt quisquam inventore repellat ab officiis eius labore numquam sit unde, voluptatibus placeat illum architecto! Ullam, sapiente.
                </p>    
            </div>
        </div>
        <div class="w-full md:w-1/2 h-screen flex justify-center items-center">
            <div class=" w-full max-w-sm shadow p-4 ">
                <h1 class="font-bold text-2xl uppercase text-gray-700">Login</h1>
                @if($errors->any())
                    <div class="flex justify-between items-start bg-red-100 text-red-900 p-2 rounded"x-data="{isClosed:false}" x-show.transition="!isClosed" >
                        <div>
                            @foreach($errors->all() as $error)
                                <div>
                                    {{$error}}
                                </div>
                            @endforeach
                        </div>
                        <button class="focus:outline-none" x-on:click="isClosed = true">
                            &times;
                        </button>
                    </div>
                @endif
                <form action="/login" method="POST" class="uppercase">
                    @csrf
                    <div class="mt-4">
                        Login As : 
                        <div>
                            <select name="type" id="" class="input" required>
                                <option value="doctor">Doctor</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        Email :
                        <div>
                            <input type="email" name="email" required class="input">
                        </div>
                    </div>
                    <div class="mt-4">
                        Password : 
                        <div>
                            <input type="password" name="password" required class="input">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-blue">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection