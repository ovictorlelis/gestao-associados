<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-3 h3">
                    @if ($dependent)
                        Novo dependente de {{ $dependent->name }}
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
                        <p>Dados</p>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none " id="nome" name="first_name" placeholder="Nome"
                                type="text" value="">
                            <input class="form-control shadow-none " id="sobrenome" name="last_name"
                                placeholder="Sobrenome" type="text" value="">
                        </div>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none " id="cpf" maxlength="14" name="cpf"
                                placeholder="CPF" type="text" value="">
                            <input class="form-control shadow-none" id="rg" name="rg" placeholder="RG"
                                type="text" value="">
                        </div>
                        <p class="mt-5">Endereço</p>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none" id="cep" maxlength="9" name="zip"
                                placeholder="CEP" type="text" value="">
                            <input class="form-control shadow-none" id="logradouro" name="address"
                                placeholder="Logradouro" type="text" value="">
                        </div>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none" id="bairro" name="neigh" placeholder="Bairro"
                                type="text" value="">
                            <input class="form-control shadow-none" id="localidade" name="local"
                                placeholder="Localidade" type="text" value="">
                        </div>
                        <div class="mb-3 d-flex gap-3">
                            <input class="form-control shadow-none" id="uf" name="state" placeholder="Estado"
                                type="text" value="">
                            <input class="form-control shadow-none" id="complemento" name="complement"
                                placeholder="Complemento" type="text" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
