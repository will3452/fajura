@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="rounded w-full max-w-6xl md:p-6 mt-6">
            <div class="flex flex-col md:flex-row justify-between justify-center items-center ">
                <div>
                    <h1 class="text-center md:text-left text-2xl font-bold uppercase">
                        Appointments
                    </h1>
                    <p class="text-center md:text-left">
                        Manage your appointments.
                    </p>
                </div>
                <a href="/calendar"><img src="/img/icons/appointment.svg" alt="" class="inline-block w-8 h-8"> Calendar</a>
            </div>
            
            @livewire('appointments.list-appointments', ['appointments'=>$appointments])
        </div>
    </div>
@endsection

