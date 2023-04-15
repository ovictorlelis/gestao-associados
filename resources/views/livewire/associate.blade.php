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
                <h1 class="mb-3 h3">Associado</h1>

                <form action="https://documentos.local/cliente" method="POST">
                    <input name="_token" type="hidden" value="LQc1KaYy8xSs80Zoo25nLcvnOZRrcGBFtCMtLlM9"> <input
                        name="id" type="hidden" value="3">
                    <div class="bg-white shadow rounded p-4 mb-5">
                        <p>Dados</p>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none " id="first_name" name="first_name" type="text"
                                value="Teste">
                            <input class="form-control shadow-none " id="last_name" name="last_name" type="text"
                                value="teste">
                        </div>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none " id="rg" name="rg" placeholder="RG"
                                type="text" value="">
                            <input class="form-control shadow-none " id="cpf" maxlength="14" name="cpf"
                                type="text" value="111.111.111-11">
                        </div>
                        <p class="mt-5">Endereço</p>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none " id="zip" maxlength="9" name="zip"
                                placeholder="CEP" type="text" value="">
                            <input class="form-control shadow-none " id="address" name="address"
                                placeholder="Endereço" type="text" value="">
                        </div>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none " id="neigh" name="neigh" placeholder="Bairro"
                                type="text" value="">
                            <input class="form-control shadow-none " id="local" name="local"
                                placeholder="Localidade" type="text" value="">
                        </div>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none " id="uf" name="state" placeholder="Estado"
                                type="text" value="">
                            <input class="form-control shadow-none " id="complement" name="complement"
                                placeholder="Complemento" type="text" value="">
                        </div>
                        <div class="text-end">
                            <a class="btn btn-danger" data-id="3" href="#" id="removeClient">Excluir</a>
                            <input class="btn btn-dark"
                                onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;"
                                type="submit" value="Salvar">
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
