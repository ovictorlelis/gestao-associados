<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-3 h3">
                    @if ($dependent)
                        <a class="text-decoration-none " href="{{ route('associate', $dependent->id) }}">
                            Novo dependente de {{ $dependent->name }}
                        </a>
                    @else
                        Novo associado
                    @endif
                </h1>
            </div>
            <div class="col text-end">
            </div>
        </div>
        <div class="card shadow border-0">
            <div class="card-body">
                <form wire:submit.prevent='create'>
                    <input name="_token" type="hidden" value="oaogR35twXwci96UFMhq8CkUsyRpfXWzEnYliRXU">
                    <div class="modal-body">
                        <x-form-associate :image="$image" />
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
