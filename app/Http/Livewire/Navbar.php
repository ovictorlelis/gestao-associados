<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar');
    }

    public function logout()
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect(request()->header('Referer'));
    }
}
