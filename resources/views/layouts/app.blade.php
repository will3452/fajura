<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="/css/app.css">
    @livewireStyles
</head>
<body>
    @include('sweetalert::alert')
    <div x-data="{menuShow:false}">
        <nav class="flex justify-between bg-white text-gray-900 items-center px-4 shadow">
            <a href="" class="w-1/2 py-4 font-bold text-xl">
                {{ config('app.name') }}
            </a>
            <button class="w-8 sm:hidden focus:outline-none" x-on:click="menuShow = !menuShow">
                <img x-show="!menuShow" src="/img/icons/menu.svg" alt="">
                <img x-show="menuShow" src="/img/icons/cancel.svg" alt="">
            </button>
            <ul class="w-1/2 justify-end hidden sm:flex">
                <li class="py-4 px-4 hover:bg-gray-100 @if(route('home') == url()->current()) active @endif" >
                    <a href="/home">Home</a>
                </li>
                <li class="py-4 px-4 hover:bg-gray-100 @if(route('services.index') == url()->current()) active @endif" >
                    <a href="{{route('services.index')}}">Services</a>
                </li>
                <li class="py-4 px-4 hover:bg-gray-100 ">
                    <a href="#">About</a>
                </li>
                <li class="py-4 px-4 hover:bg-gray-100">
                    <a href="#">Contact</a>
                </li>
                @guest
                <li class="py-4 px-4 hover:bg-gray-100">
                    <a href="/login">Login</a>
                </li>
                @endguest
                @auth
                <li class="py-4 px-4 hover:bg-gray-100">
                    <form action="/logout" method="POST">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <ul class="w-full text-left shadow" x-show.transition = "menuShow">
            <li><a href="/home" class="block  p-2 hover:bg-gray-100">Home</a></li>
            <li><a href="" class="block  p-2 hover:bg-gray-100">About</a></li>
            <li><a href="" class="block  p-2 hover:bg-gray-100">Contact</a></li>
            @guest <li><a href="/login" class="block  p-2 hover:bg-gray-100">Login</a></li> @endguest
            @auth 
            <li>
                <form action="/logout" method="POST" class="w-full">
                    @csrf
                    <button class="block  p-2 hover:bg-gray-100 w-full text-left">Logout</button>
                </form>
            </li>
            @endauth
        </ul>
        <div>
            @yield('content')
        </div>
    </div>
    @livewireScripts
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>