@extends('layouts.app')

@section('content')
    <div class="flex p-2 flex-wrap justify-center">
        @livewire('card-tile', ['title'=>'Accounts', 'description'=>'Manage accounts', 'icon'=>'/img/icons/user (1).svg','link'=>route('accounts.index')])
        @livewire('card-tile', ['title'=>'Appointments', 'description'=>'Manage appointments', 'icon'=>'/img/icons/appointment.svg','link'=>'#'])
        @livewire('card-tile', ['title'=>'Services', 'description'=>'Manage services you offer', 'icon'=>'/img/icons/healthcare.svg','link'=>route('services.index')])
        @livewire('card-tile', ['title'=>'Patients', 'description'=>'Manage records of your patients', 'icon'=>'/img/icons/patient.svg','link'=>'#'])
        @livewire('card-tile', ['title'=>'Reports', 'description'=>'Manage records of your patie', 'icon'=>'/img/icons/business-report.svg','link'=>'#'])
        @livewire('card-tile', ['title'=>'Settings', 'description'=>'Manage configurations', 'icon'=>'/img/icons/settings.svg','link'=>'#'])
    </div>
@endsection