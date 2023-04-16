<?php

namespace App\Http\Livewire;

use App\Models\Associate;
use App\Models\Document as ModelsDocument;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Document extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $associate;
    public $name;
    public $document;
    public $documentUrl;
    public $documentId;
    public $data;

    protected $listeners = ['deleteConfirm', 'refresh' => '$refresh'];

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'document' => 'nullable|file|max:1024000000',
        ];
    }

    protected function messages()
    {
        return  [
            'name.required' => 'O nome do documento é obrigatório',
        ];
    }

    public function mount($associate, $documentId = '')
    {
        $this->associate = Associate::findOrFail($associate);
        $this->documentId;

        if ($documentId) {
            $this->data = ModelsDocument::findOrFail($documentId);
            $this->name = $this->data->name;
            $this->documentUrl = $this->data->document;
        }
    }

    public function render()
    {
        return view('livewire.document');
    }

    public function create()
    {
        $data = $this->validate();
        $data['associate_id'] = $this->associate->id;
        $data['document'] = $this->document->store("documents/{$this->associate->id}");

        $created = ModelsDocument::create($data);

        $this->flash(
            'success',
            'Documento cadastrado',
            ['position' => 'top', 'timerProgressBar' => true],
            route('document', [$this->associate->id, $created->id])
        );
    }

    public function update()
    {
        $data = $this->validate();
        $data['associate_id'] = $this->associate->id;
        $data['document'] =  $this->data->document;

        if ($this->document) {
            $data['document'] = $this->document->store("documents/{$this->associate->id}");
        }

        ModelsDocument::where('id', $this->documentId)->update($data);

        $this->emit('refresh');
        $this->flash(
            'success',
            'Documento alterada',
            ['position' => 'top', 'timerProgressBar' => true],
            route('document', [$this->associate->id, $this->documentId])
        );
    }

    public function delete()
    {
        $this->alert('question', 'Excluir documento?', [
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
        File::delete(public_path('storage/' . $this->data->document));
        ModelsDocument::destroy($this->documentId);

        $this->flash(
            'success',
            'Documento excluído',
            ['position' => 'top', 'timerProgressBar' => true],
            route('associate', $this->associate->id)
        );
    }
}
