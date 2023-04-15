<div>
    <nav class="navbar navbar-expand-lg bg-white shadow mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Logo Marca</a>

            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Associados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create') }}">Novo associado</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" wire:click="logout">Sair</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
