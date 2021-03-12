<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardTile extends Component
{
    public $title;
    public $description;
    public $icon;
    public $link;

    public function mount($title, $description, $icon, $link){
        $this->title = $title;
        $this->description = $description;
        $this->icon = $icon;
        $this->link = $link;
    }
    public function goto(){
        return redirect($this->link);
    }
    public function render()
    {
        return view('livewire.card-tile');
    }
}
