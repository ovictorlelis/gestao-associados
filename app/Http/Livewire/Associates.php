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
        $associates = Associate::with('holder')
            ->whereRelation('holder', 'name', 'LIKE', "%{$this->search}%")
            ->orWhereRelation('holder', 'card', 'LIKE', "%{$this->search}%")
            ->orWhereRelation('holder', 'document', 'LIKE', "%{$this->search}%")
            ->orWhere('name', 'LIKE', "%{$this->search}%")
            ->orWhere('card', 'LIKE', "%{$this->search}%")
            ->orWhere('document', 'LIKE', "%{$this->search}%")
            ->orderBy('card', 'asc')
            ->paginate(8);

        return view('livewire.associates', compact('associates'));
    }
}
