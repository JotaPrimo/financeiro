<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Financeiro</title>
    <link rel="shortcut icon" type="svg" href="{{ asset('imagens/favicon.ico') }}" style="color: #4a88eb">

    {{-- Styles --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-5.15.4/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ligth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{asset('select2-4.1.0/dist/css/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('select2-bootstrap/dist/select2-bootstrap.css')}}"/>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"> --}}
</head>

<div class="wrapper" id="app">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar" data-simplebar="init">
            <a class="sidebar-brand" href="{{ route('dashboard.index') }}">
                <img src="{{asset('imagens/logo.png')}}" alt="" width="30px" height="30px" style="margin-right: 7px">
                <span class="align-middle me-3">Financeiro</span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Menu
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders align-middle"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg><span></span> Dashboards
                    </a>
                </li>
                <li class="sidebar-item {{ explode('.',\Request::route()->getName())[0] == 'pagina' ? 'active' : ''}}">
                    <a href="#paginas" data-toggle="collapse" class="sidebar-link collapsed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-layout align-middle">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg> <span class="align-middle">
                            Páginas
                        </span>
                    </a>
                    <ul id="paginas" class="sidebar-dropdown list-unstyled collapse {{ explode('.',\Request::route()->getName())[0] == 'pagina' ? 'show' : ''}}" data-parent="#sidebar">
                        {{-- Atendimentos --}}
                        @if (auth()->user()->usuarioTemPermissao('atendimentos', 'visualizar'))
                            <li class="sidebar-item {{ explode('.',\Request::route()->getName())[1] == 'atendimento' ? 'active' : ''}}">
                                <a class="sidebar-link" href="{{ route('pagina.atendimento.index') }}">Atendimentos</a>
                            </li>
                        @endif

                        {{-- Crachás --}}
                        @if (auth()->user()->usuarioTemPermissao('crachas', 'visualizar') == true)
                            <li class="sidebar-item {{ explode('.',\Request::route()->getName())[1] == 'cracha' ? 'active' : ''}}">
                                <a class="sidebar-link" href="{{route('pagina.cracha.index')}}">Crachás</a>
                            </li>
                        @endif

                        {{-- Estoque --}}
                        @if (auth()->user()->usuarioTemPermissao(['estoque_produtos', 'estoque_categorias', 'estoque_movimentacao'], 'visualizar'))
                            <li class="sidebar-item">
                                <a href="#controle_estoque" data-toggle="collapse" class="sidebar-link collapsed">
                                    Estoque
                                </a>
                                <ul id="controle_estoque" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Movimentações</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#categorias" class="sidebar-link">
                                            Categorias
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{route('pagina.estoque.produto.index')}}" class="sidebar-link">
                                            Produtos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        {{-- Material --}}
                        @if (auth()->user()->usuarioTemPermissao('material', 'visualizar'))
                            <li class="sidebar-item">
                                <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Material</a>
                            </li>
                        @endif

                        {{-- Oficios --}}
                        @if (auth()->user()->usuarioTemPermissao('oficios', 'visualizar'))
                            <li class="sidebar-item {{ (request()->is('paginas/oficios*')) ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('pagina.oficio.index') }}">Ofícios</a>
                            </li>
                        @endif

                        {{-- Patrimônio --}}
                        @if (auth()->user()->usuarioTemPermissao('patrimonios', 'visualizar'))
                            <li class="sidebar-item {{ (request()->is('paginas/patrimonios*')) ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{route('pagina.patrimonio.index')}}">Patrimônio</a>
                            </li>
                        @endif

                        {{-- Programas --}}
                        @if (auth()->user()->usuarioTemPermissao('beneficios-sociais', 'visualizar'))
                            <li class="sidebar-item">
                                <a href="#programas" data-toggle="collapse" class="sidebar-link collapsed">
                                    Programas
                                </a>
                                <ul id="programas" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a href="#programa_vinculos" class="sidebar-link">
                                            Vínculos
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#programa_voluntariado" class="sidebar-link">
                                            Voluntariado
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        {{-- Refeitório --}}
                        @if (auth()->user()->usuarioTemPermissao('refeitorio', 'visualizar'))
                            <li class="sidebar-item {{ (request()->is('paginas/refeitorio*')) ? 'active' : '' }}">
                                <a class="sidebar-link" href="{{ route('pagina.refeitorio.index') }}">Refeitório</a>
                            </li>
                        @endif

                        {{-- Secretaria --}}
                        @if (auth()->user()->usuarioTemPermissao(['secretaria_visitantes', 'secretaria_registro_acessos'], 'visualizar'))
                            <li class="sidebar-item">
                                <a href="#secretaria" data-toggle="collapse" class="sidebar-link collapsed">
                                    Secretaria
                                </a>
                                <ul id="secretaria" class="sidebar-dropdown list-unstyled collapse {{ (request()->is('paginas/secretaria*')) ? 'show' : '' }}">
                                    @if (auth()->user()->usuarioTemPermissao('secretaria_registro_acessos', 'visualizar'))
                                        <li class="sidebar-item {{ (request()->is('paginas/secretaria/registro-de-acessos')) ? 'active' : '' }}">
                                            <a href="{{route('pagina.secretaria.registro-acesso.index')}} " class="sidebar-link">
                                                Registro de Acessos
                                            </a>
                                        </li>
                                    @endif
                                    @if (auth()->user()->usuarioTemPermissao('secretaria_visitantes', 'visualizar'))
                                        <li class="sidebar-item {{ (request()->is('paginas/secretaria/visitantes')) ? 'active' : '' }}">
                                            <a href="{{route('pagina.secretaria.visitante.index')}} " class="sidebar-link">
                                                Visitantes
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>

                {{-- NTIC --}}
                @if (auth()->user()->id_setor == 6)
                    <li class="sidebar-item {{ explode('.',\Request::route()->getName())[0] == 'nti' ? 'active' : ''}}">
                        <a href="#ntic" data-toggle="collapse" class="sidebar-link collapsed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay align-middle me-2"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg> <span class="align-middle">NTIC</span>
                        </a>
                        <ul id="ntic" class="sidebar-dropdown list-unstyled collapse {{ explode('.',\Request::route()->getName())[0] == 'nti' ? 'show' : ''}}" data-parent="#sidebar">
                            {{-- Categoria Patrimônio --}}
                            @if (auth()->user()->usuarioTemPermissao('categoria_patrimonio', 'visualizar'))
                                <li class="sidebar-item {{ (request()->is('nti/categoria-patrimonio*')) ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{route('nti.categoria-patrimonio.index')}}">Categoria Patrimônio</a>
                                </li>
                            @endif

                            {{-- Estado Patrimônio --}}
                            @if (auth()->user()->usuarioTemPermissao('estado_patrimonio', 'visualizar'))
                                <li class="sidebar-item {{ (request()->is('nti/estado-conservacao-patrimonio*')) ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{route('nti.estado-conservacao-patrimonio.index')}}">Estado Patrimônio</a>
                                </li>
                            @endif

                            {{-- Local Patrimônio --}}
                            @if (auth()->user()->usuarioTemPermissao('local_patrimonio', 'visualizar'))
                                <li class="sidebar-item {{ (request()->is('nti/local-patrimonio*')) ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{route('nti.local-patrimonio.index')}}">Local Patrimônio</a>
                                </li>
                            @endif

                            {{-- Origem Patrimônio --}}
                            @if (auth()->user()->usuarioTemPermissao('origem_patrimonio', 'visualizar'))
                                <li class="sidebar-item {{ (request()->is('nti/origem-patrimonio*')) ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{route('nti.origem-patrimonio.index')}}">Origem Patrimônio</a>
                                </li>
                            @endif

                            {{-- Perfil --}}
                            @if (auth()->user()->usuarioTemPermissao('perfil', 'visualizar'))
                                <li class="sidebar-item {{ explode('.',\Request::route()->getName())[1] == 'perfil' ? 'active' : ''}}">
                                    <a class="sidebar-link" href="{{ route('nti.perfil.index') }}">
                                        Perfil
                                    </a>
                                </li>
                            @endif

                            {{-- Setores --}}
                            @if (auth()->user()->usuarioTemPermissao('setores', 'visualizar'))
                                <li class="sidebar-item {{ explode('.',\Request::route()->getName())[1] == 'setor' ? 'active' : ''}}">
                                    <a href="{{ route('nti.setor.index') }}" class="sidebar-link">
                                        Setores
                                    </a>
                                </li>
                            @endif

                            {{-- Status --}}
                            @if (auth()->user()->usuarioTemPermissao('status', 'visualizar'))
                                <li class="sidebar-item {{ explode('.',\Request::route()->getName())[1] == 'status' ? 'active' : ''}}">
                                    <a href="{{route('nti.status.index')}} " class="sidebar-link">
                                        Status
                                    </a>
                                </li>
                            @endif

                            {{-- Status Patrimônio --}}
                            @if (auth()->user()->usuarioTemPermissao('status_patrimonio', 'visualizar'))
                                <li class="sidebar-item {{ (request()->is('nti/status-patrimonio*')) ? 'active' : '' }}">
                                    <a class="sidebar-link" href="{{route('nti.status-patrimonio.index')}}">Status Patrimônio</a>
                                </li>
                            @endif

                            {{-- Técnicos --}}
                            @if (auth()->user()->usuarioTemPermissao('regiaos', 'visualizar'))
                                <li class="sidebar-item">
                                    <a href="#tecnicos" class="sidebar-link">
                                        Técnicos
                                    </a>
                                </li>
                            @endif

                            {{-- Usuários --}}
                            @if (auth()->user()->usuarioTemPermissao('usuarios', 'visualizar'))
                                <li class="sidebar-item {{ explode('.',\Request::route()->getName())[1] == 'usuario' ? 'active' : ''}}">
                                    <a class="sidebar-link" href="{{ route('nti.usuario.index') }}">Usuários</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            @if (Auth::check())
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
            @endif
            {{-- Menu direito --}}
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </a>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" data-toggle="dropdown">
                            {{-- <div class="avatar bg-avatar">
                                <div class="avatar-content">{{ substr(auth()->user()->nome, 0, 1) }}</div>
                            </div> --}}
                            <img src="{{ Avatar::create(auth()->user()->nome) }}" class="avatar img-fluid rounded-circle me-1" style="height: 38px;width:38px;">
                            <span class="text-dark">{{auth()->user()->nome}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                            <a class="dropdown-item" href="pages-profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user align-middle me-1">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out align-middle me-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Main --}}
        <main class="content">
            <div class="container-fluid p-0">
                @include('alerts.alerts')
                @include('sweetalert::alert')
                @yield('content')
            </div>
        </main>
        {{-- Fim Main --}}

        {{-- Footer --}}
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-left">
                        {{-- <ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Suporte</a>
								</li>
							</ul> --}}
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-0">
                            &copy; 2021 - <a href="" class="text-muted">Instituto Mirim</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        {{-- Fim Footer --}}

    </div>{{-- Fim Div Main --}}
</div> {{-- Fim Div Wrapper --}}
</body>


{{-- Scripts --}}
<script src="{{ url('js/jquery.js')}}"></script>
<script src="{{ url('fontawesome-5.15.4/js/all.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{ url('js/function.js') }}"></script>
<script src="{{asset('select2-4.1.0/dist/js/select2.min.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('.select2').select2({
            language: {
                noResults: function() {
                    return "Nenhum resultado encontrado";
                }
            },
            theme: 'bootstrap',
            closeOnSelect: false,
            width: '100%',
        });
    });
</script>
@yield('scripts')

</html>
