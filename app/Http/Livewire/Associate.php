<?php

namespace App\Http\Livewire;

use App\Models\Associate as ModelsAssociate;
use Illuminate\Support\Facades\File;
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

    protected $listeners = ['deleteConfirm', 'holderConfirm', 'dependentConfirm', 'pendencyConfirm', 'refresh' => '$refresh'];

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'card' => 'required|string',
            'rg' => 'nullable|string',
            'document' => 'required|numeric|unique:associates,document,' . $this->associate->id,
            'zip' => 'nullable|numeric',
            'address' => 'nullable|string',
            'state' => 'nullable|string',
            'fu' => 'nullable|string|min:2',
            'number' => 'nullable|string',
            'complement' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return  [
            'name.required' => 'Campo nome obrigatório',
            'card.required' => 'Campo carteirinha obrigatório',
            'document.required' => 'Campo CPF obrigatório',
        ];
    }

    public function mount($associate)
    {
        $this->associate = ModelsAssociate::findOrFail($associate);

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

        if ($this->image) {
            $image = $this->image->store('associates');
            $associate['photo'] = $image;
        }

        ModelsAssociate::where('id', $this->associate->id)->update($associate);

        $this->emit('refresh');
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
        File::delete(public_path('storage/' . $this->associate->photo));
        ModelsAssociate::destroy($this->associate->id);

        $this->flash(
            'success',
            'Associado excluído',
            ['position' => 'top', 'timerProgressBar' => true],
            route('home')
        );
    }

    public function holder()
    {
        $this->alert('question', 'Virar títular?', [
            'position' => 'top',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Confirmar',
            'onConfirmed' => 'holderConfirm',
            'timer' => null,
        ]);
    }

    public function holderConfirm()
    {
        $associate = $this->validate();

        if ($this->associate->holder->pendency) {
            return  $this->alert(
                'error',
                'Títular com pendência',
                ['position' => 'top', 'timerProgressBar' => true]
            );
        }

        $associate['type'] = 'holder';
        $associate['holder_id'] = NULL;

        ModelsAssociate::where('id', $this->associate->id)->update($associate);

        $this->emit('refresh');
        $this->alert(
            'success',
            'Associado virou títular',
            ['position' => 'top', 'timerProgressBar' => true]
        );
    }

    public function dependent()
    {
        $this->alert('question', 'Virar títular?', [
            'position' => 'top',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Confirmar',
            'onConfirmed' => 'dependentConfirm',
            'timer' => null,
            'input' => 'text',
            'inputLabel' => 'CPF do Títular',
        ]);
    }

    public function dependentConfirm($data)
    {
        $associate = $this->validate();
        $holder = ModelsAssociate::where('document', $data['value'])->first();

        if (!$holder) {
            return $this->alert(
                'error',
                'CPF do títular não encontrado',
                ['position' => 'top', 'timerProgressBar' => true]
            );
        }

        $associate['type'] = 'dependent';
        $associate['holder_id'] = $holder->id;

        ModelsAssociate::where('id', $this->associate->id)->update($associate);

        $this->emit('refresh');
        $this->alert(
            'success',
            'Associado virou dependente',
            ['position' => 'top', 'timerProgressBar' => true]
        );
    }

    public function pendency()
    {
        $this->alert('question', 'Confirmar pendência?', [
            'position' => 'top',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Confirmar',
            'onConfirmed' => 'pendencyConfirm',
            'timer' => null,
        ]);
    }

    public function pendencyConfirm()
    {
        $associate = $this->validate();

        $associate['pendency'] = !$this->associate->pendency;

        ModelsAssociate::where('id', $this->associate->id)->update($associate);

        $this->emit('refresh');
        $this->alert(
            'success',
            'Pendência confirmada',
            ['position' => 'top', 'timerProgressBar' => true]
        );
    }
}
