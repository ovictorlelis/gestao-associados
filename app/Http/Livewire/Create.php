<?php

namespace App\Http\Livewire;

use App\Models\Associate;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use LivewireAlert;

    public $dependent;

    public $name;
    public $card;
    public $document;
    public $rg;
    public $image;

    public $zip;
    public $address;
    public $state;
    public $fu;
    public $number;
    public $complement;

    protected $rules = [
        'name' => 'required|string',
        'card' => 'required|numeric',
        'document' => 'required|numeric|unique:associates,document',
        'zip' => 'nullable|numeric',
        'address' => 'nullable|string',
        'state' => 'nullable|string',
        'fu' => 'nullable|string|min:2',
        'number' => 'nullable|numeric',
        'complement' => 'nullable|string',
    ];


    public function mount($dependent = '')
    {
        $this->dependent = Associate::find($dependent);
    }

    public function render()
    {
        return view('livewire.create');
    }

    public function create()
    {
        $associate = $this->validate();

        if ($this->dependent) {
            $associate['type'] = 'dependent';
            $associate['holder_id'] = $this->dependent->id;
        }

        $created = Associate::create($associate);

        $this->flash(
            'success',
            'Associado cadastrado',
            ['position' => 'top', 'timerProgressBar' => true],
            route('associate', $created->id)
        );
    }
}
