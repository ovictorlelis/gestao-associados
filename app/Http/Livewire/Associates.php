<?php

namespace App\Http\Livewire;

use App\Models\Associate;
use Livewire\Component;

class Associates extends Component
{
    public $search;
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        $associates = Associate::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('card', 'LIKE', "%{$this->search}%")
            ->orWhere('document', 'LIKE', "%{$this->search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('livewire.associates', compact('associates'));
    }
}
