<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ServiceSelectorItem extends Component
{
    public $service;
    public function mount($service){
        $this->service = $service;
    }
    public function onSelect(){
        $this->emit('onSelect', $this->service->id);
    }
    public function render()
    {
        return view('livewire.service-selector-item');
    }
}
