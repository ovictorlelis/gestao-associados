<?php

namespace App\Http\Livewire;

use App\Models\Associate;
use Livewire\Component;
use Livewire\WithPagination;

class Associates extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = ['search' => 'changeSearch'];

    public function render()
    {
        $associates = Associate::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('card', 'LIKE', "%{$this->search}%")
            ->orWhere('document', 'LIKE', "%{$this->search}%")
            ->orderBy('name')->paginate(8);

        return view('livewire.associates', compact('associates'));
    }

    public function changeSearch($value)
    {
        $this->search = $value;
    }
}
