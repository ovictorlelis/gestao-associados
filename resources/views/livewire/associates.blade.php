<div>
    <section class="container">
        <div class="row">
            <div class="col-4 col-md-6 col-lg-8">
                <h1 class="mb-3 h3">Associados</h1>
            </div>
            <div class="col text-end">
                <input aria-label="Pesquisar" class="form-control me-2 shadow-none" name="search"
                    placeholder="Pesquisar associado" type="search" wire:model="search">
            </div>
        </div>

        <table class="table bg-white shadow rounded table-responsive">
            <thead>
                <tr>
                    <th class="px-3 py-4">Associado</th>
                    <th class="px-3 py-4">Títular</th>
                    <th class="px-3 py-4">Carteirinha</th>
                    <th class="px-3 py-4">CPF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($associates as $associate)
                    <tr>
                        <td class="p-0">
                            <a class="d-flex align-items-center px-3 py-4 text-decoration-none text-dark"
                                href="{{ route('associate', $associate->id) }}">
                                {{ $associate->name }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a class="d-flex align-items-center px-3 py-4 text-decoration-none text-dark"
                                href="{{ route('associate', $associate->id) }}">
                                @if ($associate->holder)
                                    {{ $associate->holder->name }}
                                @endif
                            </a>
                        </td>
                        <td class="p-0">
                            <a class="d-flex align-items-center px-3 py-4 text-decoration-none text-dark"
                                href="{{ route('associate', $associate->id) }}">
                                {{ $associate->card }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a class="d-flex align-items-center px-3 py-4 text-decoration-none text-dark"
                                href="{{ route('associate', $associate->id) }}">
                                {{ $associate->document }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a class="d-flex align-items-center justify-content-end px-3 py-4"
                                href="{{ route('associate', $associate->id) }}">
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

        {{ $associates->links() }}
    </section>
</div>
