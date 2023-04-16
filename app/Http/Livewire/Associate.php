<?php

namespace App\Http\Livewire;

use App\Models\Associate as ModelsAssociate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Associate extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $associateId;
    public $associate;

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

    protected $listeners = ['deleteConfirm'];

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'card' => 'required|numeric',
            'document' => 'required|numeric|unique:associates,document,' . $this->associate->id,
            'zip' => 'nullable|numeric',
            'address' => 'nullable|string',
            'state' => 'nullable|string',
            'fu' => 'nullable|string|min:2',
            'number' => 'nullable|numeric',
            'complement' => 'nullable|string',
        ];
    }

    public function mount($associate)
    {
        $this->associate = ModelsAssociate::find($associate);

        $this->name = $this->associate->name;
        $this->card = $this->associate->card;
        $this->document = $this->associate->document;
        $this->rg = $this->associate->rg;
        $this->zip = $this->associate->zip;
        $this->address = $this->associate->address;
        $this->state = $this->associate->state;
        $this->fu = $this->associate->fu;
        $this->number = $this->associate->number;
        $this->complement = $this->associate->complement;
    }

    public function render()
    {
        return view('livewire.associate');
    }

    public function update()
    {
        $associate = $this->validate();

        ModelsAssociate::where('id', $this->associate->id)->update($associate);
        $this->alert(
            'success',
            'Atualizado com sucesso',
            ['position' => 'top', 'timerProgressBar' => true]
        );
    }

    public function delete()
    {
        $this->alert('question', 'Excluir associado?', [
            'position' => 'top',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Confirmar',
            'onConfirmed' => 'deleteConfirm',
            'timer' => null,

        ]);
    }

    public function deleteConfirm()
    {
        ModelsAssociate::destroy($this->associate->id);

        $this->flash(
            'success',
            'Associado excluído',
            ['position' => 'top', 'timerProgressBar' => true],
            route('home')
        );
    }
}
