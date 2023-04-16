<div>
    <section class="container">
        <div class="row">
            <div class="col">
            </div>
            <div class="col text-end">
                <button class="btn btn-dark">Novo Documento</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-3 h3">
                    @if ($associate->type == 'holder')
                        Títular
                    @else
                        <a class="text-decoration-none " href="{{ route('associate', $associate->holder->id) }}">
                            Dependente de {{ $associate->holder->name }}
                        </a>
                    @endif
                </h1>

                <form wire:submit.prevent="update">
                    <div class="bg-white shadow rounded p-4 mb-5">
                        <x-form-associate :image="$image" :associate="$associate" />

                        <div class="text-end">

                            @if ($associate->type == 'holder')
                                <button class="btn btn-warning" type="button" wire:click.prevent="pendency">
                                    @if ($associate->pendency)
                                        Desbloquear
                                    @else
                                        Bloquear
                                    @endif
                                </button>

                                @if ($associate->dependents->isEmpty())
                                    <button class="btn btn-info" type="button" wire:click.prevent="dependent">
                                        Virar dependente
                                    </button>
                                @endif
                            @endif

                            @if ($associate->type == 'dependent')
                                <button class="btn btn-info" type="button" wire:click.prevent="holder">
                                    Virar títular
                                </button>
                            @endif

                            <button class="btn btn-danger" type="button" wire:click.prevent="delete">Excluir</button>
                            <button class="btn btn-success" type="submit">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <h1 class="mb-3 h3">Documentos</h1>
                <p class="text-center">Nenhum documento cadastrado</p>
                <table class="table bg-white shadow rounded table-responsive">
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
        @if ($associate->type == 'holder')
            <div class="row">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col">
                            <h1 class="h3">Dependentes</h1>
                        </div>
                        <div class="col text-end">
                            <a class="btn btn-dark" href="{{ route('create', $associate->id) }}">Novo dependente</a>
                        </div>
                    </div>

                    <table class="table bg-white shadow rounded table-responsive">
                        <thead>
                            <tr>
                                <th class="px-3 py-4">Associado</th>
                                <th class="px-3 py-4">Carteirinha</th>
                                <th class="px-3 py-4">CPF</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($associate->dependents as $dependent)
                                <tr>
                                    <td class="p-0">
                                        <a class="d-flex align-items-center px-3 py-4 text-decoration-none text-dark"
                                            href="{{ route('associate', $dependent->id) }}">
                                            {{ $dependent->name }}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <a class="d-flex align-items-center px-3 py-4 text-decoration-none text-dark"
                                            href="{{ route('associate', $dependent->id) }}">
                                            {{ $dependent->card }}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <a class="d-flex align-items-center px-3 py-4 text-decoration-none text-dark"
                                            href="{{ route('associate', $dependent->id) }}">
                                            {{ $dependent->document }}
                                        </a>
                                    </td>
                                    <td class="p-0">
                                        <a class="d-flex align-items-center justify-content-end px-3 py-4"
                                            href="{{ route('associate', $dependent->id) }}">
                                            <svg fill="#9ca3af" height="24" viewBox="0 0 256 256" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z">
                                                </path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </section>
</div>
