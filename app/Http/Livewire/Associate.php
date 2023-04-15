<?php

namespace App\Http\Livewire;

use App\Models\Associate as ModelsAssociate;
use Livewire\Component;

class Associate extends Component
{
    public $associate;

    public function mount($associate)
    {
        $this->associate = ModelsAssociate::find($associate);
    }

    public function render()
    {
        return view('livewire.associate', ['associate' => $this->associate]);
    }
}
