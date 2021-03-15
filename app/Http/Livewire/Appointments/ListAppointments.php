<?php

namespace App\Http\Livewire\Appointments;

use Livewire\Component;
use App\Models\Appointment;

class ListAppointments extends Component
{
    public $appointments;
    public function mount($appointments){
        $this->appointments = $appointments;
    }

    
    public function render()
    {
        return view('livewire.appointments.list-appointments');
    }
}
