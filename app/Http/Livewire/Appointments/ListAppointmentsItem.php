<?php

namespace App\Http\Livewire\Appointments;

use Livewire\Component;
use App\Models\Appointment;

class ListAppointmentsItem extends Component
{
    public $appointment;
    public $datetime;
    public function done(){
        $appointment = Appointment::find($this->appointment->id);
        $appointment->status = $appointment->status == 'done' ? 'undone':'done';
        $appointment->save();
    }
    public function mount($appointment){
        $this->appointment = $appointment;
    }
    public function update(){
        $appointment = Appointment::find($this->appointment->id);
        $appointment->datetime = $this->datetime;
        $appointment->save();
        $this->appointment = $appointment;
        alert()->success('Done!');
    }
    public function delete(){
        Appointment::find($this->appointment->id)->delete();
    }
    public function render()
    {
        return view('livewire.appointments.list-appointments-item');
    }
}
