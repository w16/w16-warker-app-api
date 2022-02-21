<div class="sidebar">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">W16 WEB Crud</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ url('/cidades') }}" class="nav-link link-dark">
                    Todas as Cidades
                </a>
            </li>
            <li>
                <a href="{{ url('/cidades/cadastrar') }}" class="nav-link link-dark">
                    Cadastrar Cidades
                </a>
            </li>
            <li>&nbsp;</li>
            <li>
                <a href="{{ url('/postos') }}" class="nav-link link-dark">
                    Todos os Postos
                </a>
            </li>
            <li>
                <a href="{{ url('/postos/cadastrar') }}" class="nav-link link-dark">
                    Cadastar Posto
                </a>
            </li>
        </ul>
        <hr>
    </div>
</div>