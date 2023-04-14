<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $user;

    protected $rules = [
        'user' => 'required'
    ];

    protected $messages = [
        'user.required' => 'O campo usuário não pode ser vázio.',
    ];

    public function render()
    {
        return view('livewire.login');
    }

    public function test()
    {
        $this->validate();
    }
}
