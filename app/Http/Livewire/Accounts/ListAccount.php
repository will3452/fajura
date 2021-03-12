<?php

namespace App\Http\Livewire\Accounts;

use App\Models\User;
use Livewire\Component;

class ListAccount extends Component
{

    public $accounts;


    public function mount($accounts){
        $this->accounts = $accounts;
    }

   
    public function render()
    {
        return view('livewire.accounts.list-account');
    }
}
