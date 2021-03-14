<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceSelector extends Component
{
    public $services;
    public $selected = [];
    public $selectedString = null;
    protected $listeners = ['onSelect'=>'onSelect'];

    public function onSelect($id){
        // array_push($this->selected);
        if(!in_array($id, $this->selected)){
            array_push($this->selected, $id);
        }else {
            $newArray = [];
            foreach($this->selected as $item){
                if($item != $id){
                    array_push($newArray, $item);
                }
            }
            $this->selected = $newArray;
        }
        $this->parseToString();
    }

    public function parseToString(){
        $this->selectedString = implode(',', $this->selected);
    }

    

    public function mount(){
        $this->services = Service::get();
    }

    public function render()
    {
        return view('livewire.service-selector');
    }
}
