<?php

namespace App\Http\Livewire\Services;

use App\Models\Service;
use Livewire\Component;

class ServiceItem extends Component
{
    public $service;
    public $name;
    public $description;
    public $fee;

    public function mount($service){
        $this->service = $service;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->fee = $service->fee;
    }

    public function submit(){
        $service = Service::find($this->service->id);
        $service->name = $this->name;
        $service->description = $this->description;
        $service->fee = $this->fee;
        $service->save();
    }

    public function delete(){
        Service::find($this->service->id)->delete();
    }

    public function render()
    {
        return view('livewire.services.service-item');
    }
}
