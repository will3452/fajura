<?php

namespace App\Http\Livewire\Accounts;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class CreateAccount extends Component
{
    public $name;
    public $password;
    public $email;
    public $type = 'doctor';
    public $success = false;

    protected $rules = [
        'name'=>'required',
        'password'=>'required',
        'email'=>'email|required|unique:users',
        'type'=>'required'
    ];

    public function fieldReset(){
        $this->name = '';
        $this->password = '';
        $this->email = '';
        $this->type = '';
    }
    public function updatedEmail(){
        $this->validateOnly('email');
    }

    public function store(){

        $this->validate();
        User::create(['name'=>$this->name, 'password'=>Hash::make($this->password), 'email'=>$this->email, 'type'=>$this->type]);
        $this->fieldReset();
        $this->success = true;
    }
    public function render()
    {
        return view('livewire.accounts.create-account');
    }
}
