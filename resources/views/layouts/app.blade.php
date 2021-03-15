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
                    <a href="/home"><img src="/img/icons/home.svg" alt="" class="w-6 h-6 inline-block"> Home</a>
                </li>
                <li class="py-4 px-4 hover:bg-gray-100 @if(route('services.index') == url()->current()) active @endif" >
                    <a href="{{route('services.index')}}"><img src="/img/icons/healthcare.svg" alt="" class="w-6 h-6 inline-block"> Services</a>
                </li>
                <li class="py-4 px-4 hover:bg-gray-100 ">
                    <a href="#"><img src="/img/icons/about.svg" alt="" class="w-6 h-6 inline-block"> About</a>
                </li>
                <li class="py-4 px-4 hover:bg-gray-100">
                    <a href="#"><img src="/img/icons/call.svg" alt="" class="w-6 h-6 inline-block"> Contact</a>
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
                        <button><img src="/img/icons/logout.svg" alt="" class="w-6 h-6 inline-block"> Logout</button>
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
        {{-- <div class="w-full mx-auto h-16 bg-white px-24">
            
        </div> --}}
        <div class="mb-16">
            @yield('content')
        </div>
        @auth
            <div class="md:hidden w-full h-16 fixed bg-gray-100 bottom-0 flex justify-between items-center">
                <a href="/calendar" class="mx-4"><img src="/img/icons/appointment.svg" alt="" class="w-8 h-8"></a>
                <a href="/home" class="mx-4"><img src="/img/icons/home.svg" alt="" class="w-8 h-8"></a>
                <a href="{{ url()->previous() }}" class="mx-4"><img src="/img/icons/back-button.svg" alt="" class="w-7 h-7"></a>
            </div>
        @endauth
    </div>
    @livewireScripts
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>