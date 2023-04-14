<div>
    <nav class="navbar navbar-expand-lg bg-white shadow mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Logo Marca</a>

            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item dropdown">
                        <a aria-expanded="false" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                            href="#" role="button">
                            Menu
                        </a>
                        <ul class="dropdown-menu border-0 shadow" style="right: 0; left: initial;">

                            <li><a class="dropdown-item" href="{{ route('home') }}/perfil">Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('home') }}/usuarios">Usuários</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><button class="dropdown-item" wire:click="logout">Sair</button></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" wire:submit.prevent="change">
                    <input aria-label="Pesquisar" class="form-control me-2 shadow-none" name="pesquisa"
                        placeholder="Pesquisar" type="search" wire:model="search">
                    <button class="btn btn-dark" type="submit">Pesquisar</button>
                </form>

            </div>
        </div>
    </nav>

</div>
