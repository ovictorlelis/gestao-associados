<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $user;
    public $password;

    protected $rules = [
        'user' => 'required',
        'password' => 'required'
    ];

    protected $messages = [
        'user.required' => 'O campo usuário não pode ser vázio.',
        'password.required' => 'O campo senha não pode ser vázio.',
    ];

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'user' => $this->user,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('');
        }

        $this->password = '';
        $this->addError('error', 'E-mail e/ou senha inválido');
    }
}
