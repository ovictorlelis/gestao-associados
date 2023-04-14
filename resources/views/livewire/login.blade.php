<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="text-center py-5"></div>
                @error('error')
                    <p class="alert alert-danger border-0 text-center">
                        {{ $message }}
                    </p>
                @enderror
                <div class="card shadow">
                    <div class="card-header">Faça login no sistema</div>
                    <div class="card-body rounded">
                        <div class="form-floating mb-4">
                            <input class="form-control text" id="user" input="text" label="Usuário" name="user"
                                placeholder="Usuário" type="text" wire:model="user">
                            <label for="user">Usuário</label>
                            @error('user')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control" id="password" input="password" label="Senha" name="password"
                                placeholder="Senha" type="password" wire:model="password">
                            <label for="password">Senha</label>
                            @error('password')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="w-100 btn btn-primary py-3" wire:click="login">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
