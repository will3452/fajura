<?php

namespace App\Http\Livewire\Accounts;

use App\Models\User;
use Livewire\Component;

class ListAccountItem extends Component
{
    public $account;
    public $name;
    public $email;
    public $type;

    public function mount($account){
        $this->account = $account;
        $this->name = $account->name;
        $this->email = $account->email;
        $this->type = $account->type;
    }

    public function submit(){
        $user = User::find($this->account->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->type = $this->type;
        $user->save();
        $this->account = $user;

    }

    public function delete(){
        User::find($this->account->id)->delete();
    }
    public function render()
    {
        return view('livewire.accounts.list-account-item');
    }
}
