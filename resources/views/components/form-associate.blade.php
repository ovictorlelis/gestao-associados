<p>Dados</p>

<div class="row mb-3">
    <div class="col-6">
        <x-input input="name" label="Nome" type="text" wire:model="name" />
    </div>

    <div class="col-6">
        <x-input input="card" label="Carteirinha" type="text" wire:model="card" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-6">
        <x-input input="document" label="CPF" type="number" wire:model="document" />
    </div>

    <div class="col-6">
        <x-input input="rg" label="RG" type="number" wire:model="rg" />
    </div>
</div>

<p>Foto</p>

<div class="row mb-3">
    <div class="col-6">
        <x-input input="image" label="Enviar" type="text" type="file" wire:model="image" />
        <div wire:loading wire:target="image">Carregando...</div>
    </div>

    <div class="col-6 text-center" style="height: 200px;">
        @if ($image)
            <img alt="" class="img-fluid rounded" src="{{ $image->temporaryUrl() }}" style="max-height: 200px;">
        @elseif(isset($associate->photo))
            <img alt="" class="img-fluid rounded" src="{{ asset('storage/' . $associate->photo) }}"
                style="max-height: 200px;">
        @else
            <img alt="" class="img-fluid rounded" src="{{ url('images/exemplo.jpg') }}"
                style="max-height: 200px;">
        @endif
    </div>
</div>
<p>Endereço</p>

<div class="row mb-3">
    <div class="col-6">
        <x-input input="zip" label="CEP" type="number" wire:model="zip" />
    </div>

    <div class="col-6">
        <x-input input="address" label="Endereço" type="text" wire:model="address" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-6">
        <x-input input="number" label="Número" type="text" wire:model="number" />
    </div>

    <div class="col-6">
        <x-input input="complement" label="Complemento" type="text" wire:model="complement" />
    </div>
</div>

<div class="row mb-3">
    <div class="col-6">
        <x-input input="state" label="Estado" type="text" wire:model="state" />
    </div>

    <div class="col-6">
        <x-input input="fu" label="UF" type="text" wire:model="fu" />
    </div>
</div>
