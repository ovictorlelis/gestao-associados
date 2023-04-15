<?php

namespace App\Http\Livewire;

use App\Models\Associate;
use Livewire\Component;

class Create extends Component
{
    public $dependent;

    public function mount($dependent = '')
    {
        $this->dependent = Associate::find($dependent);
    }

    public function render()
    {
        return view('livewire.create');
    }
}
