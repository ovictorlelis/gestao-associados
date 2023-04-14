<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $home;
    public $search;

    protected $listeners = ['searchInput' => 'changeInput'];

    public function mount()
    {
        $this->search = request()->query->get('search');
    }

    public function render()
    {
        return view('livewire.navbar');
    }

    public function change()
    {
        if ($this->home) {
            return $this->emit('search', $this->search);
        }

        return redirect("/?search=$this->search");
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
