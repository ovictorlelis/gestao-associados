<div>
    <section class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-3 h3">
                    <a class="text-decoration-none" href="{{ route('associate', $associate->id) }}">
                        @if (!$data)
                            Novo
                        @endif Documento de {{ $associate->name }}
                    </a>
                </h1>
            </div>
            <div class="col text-end">
            </div>
        </div>

        <div class="card shadow border-0">
            <div class="card-body">
                <form
                    @if (!$data) wire:submit.prevent='create' @else wire:submit.prevent='update' @endif
                    class="mb-3">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <x-input input="name" label="Nome" type="text" wire:model="name" />
                            </div>
                            <div class="col-6">
                                <x-input input="document" label="Documento" type="file" wire:model="document" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if ($data)
                            <button class="btn btn-danger me-3" type="button" wire:click.prevent="delete">
                                Deletar
                            </button>
                        @endif
                        <button class="btn btn-dark" type="submit">
                            @if (!$data)
                                Cadastrar
                            @else
                                Atualizar
                            @endif
                        </button>
                    </div>
                </form>

                @if ($data)
                    <object class="w-100" data="{{ asset('storage/' . $documentUrl) }}"
                        style="min-height: 700px"></object>
                @endif
            </div>
        </div>
    </section>
</div>
