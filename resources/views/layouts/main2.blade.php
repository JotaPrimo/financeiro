<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Instituto Mirim</title>
    <link rel="shortcut icon" type="svg" href="{{ asset('imagens/favicon.ico') }}" style="color: #4a88eb">

    {{-- Styles --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5.15.4/css/all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/ligth.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{asset('select2-4.1.0/dist/css/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('select2-bootstrap/dist/select2-bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}"/>
</head>

<div class="wrapper" id="app">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('dashboard.index') }}">
                <img src="{{asset('imagens/logo.png')}}" alt="" width="30px" height="30px">
                <span class="align-middle mr-3" style="font-size: .999rem;">Instituto Mirim</span>
            </a>

            <ul class="sidebar-nav">
                {{-- <li class="sidebar-header">
                    Páginas
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders align-middle"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg><span></span> Dashboards
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#paginas" data-toggle="collapse" class="sidebar-link collapsed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout align-middle"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg> <span class="align-middle">Menu</span>
                    </a>
                    <ul id="paginas" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#atendimentos" data-toggle="collapse" class="sidebar-link collapsed">
                                Atendimentos NTIC
                            </a>
                            <ul id="atendimentos" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('nti.usuario.index') }}">Listagem</a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('nti.usuario.create') }}">Cadastrar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#controle" data-toggle="collapse" class="sidebar-link collapsed">
                                Controles
                            </a>
                            <ul id="controle" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#acesso_secretaria" data-toggle="collapse" class="sidebar-link collapsed">
                                        Acesso Secretaria
                                    </a>
                                    <ul id="acesso_secretaria" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#controle_crachas" data-toggle="collapse" class="sidebar-link collapsed">
                                        Crachás
                                    </a>
                                    <ul id="controle_crachas" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#controle_estoque" data-toggle="collapse" class="sidebar-link collapsed">
                                        Estoque
                                    </a>
                                    <ul id="controle_estoque" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#entradas" class="sidebar-link">
                                                Entradas
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#saidas" class="sidebar-link">
                                                Saídas
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#categorias" class="sidebar-link">
                                                Categorias
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#produtos" class="sidebar-link">
                                                Produtos
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#controle_oficios" data-toggle="collapse" class="sidebar-link collapsed">
                                        Ofícios
                                    </a>
                                    <ul id="controle_oficios" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#controle_patrimonio" data-toggle="collapse" class="sidebar-link collapsed">
                                        Patrimônio
                                    </a>
                                    <ul id="controle_patrimonio" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#bens_moveis" class="sidebar-link">
                                                Bens Móveis
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#bens_nao_duraveis" class="sidebar-link">
                                                Bens Não duráveis
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#frotas" class="sidebar-link">
                                                Frotas
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#instrumentos_musicais" class="sidebar-link">
                                                Instrumentos Musicais
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#entradas" class="sidebar-link">
                                                Ativos
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#controle_refeitorio" data-toggle="collapse" class="sidebar-link collapsed">
                                        Refeitório
                                    </a>
                                    <ul id="controle_refeitorio" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#almocos" class="sidebar-link">
                                                Almoços
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#lanches" class="sidebar-link">
                                                Lanches
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#marmitas" class="sidebar-link">
                                                Marmitas
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#controle_utilizacao_material" data-toggle="collapse" class="sidebar-link collapsed">
                                        Utilização de Material
                                    </a>
                                    <ul id="controle_utilizacao_material" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.index') }}" --}}>Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item">
                            <a href="#programas" data-toggle="collapse" class="sidebar-link collapsed">
                                Programas
                            </a>
                            <ul id="programas" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#programa_vinculos" data-toggle="collapse" class="sidebar-link collapsed">
                                        Vínculos
                                    </a>
                                    <ul id="programa_vinculos" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="">Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#programa_voluntariado" data-toggle="collapse" class="sidebar-link collapsed">
                                        Voluntariado
                                    </a>
                                    <ul id="programa_voluntariado" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="">Listagem</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" {{-- href="{{ route('produto.create') }}" --}}>Relatórios</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- NTIC --}}
                <li class="sidebar-item {{ explode('.',\Request::route()->getName())[0] == 'nti' ? 'active' : ''}}">
                    <a href="#ntic" data-toggle="collapse" class="sidebar-link collapsed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay align-middle me-2"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg> <span class="align-middle">NTIC</span>
                    </a>
                    <ul id="ntic" class="sidebar-dropdown list-unstyled collapse {{ explode('.',\Request::route()->getName())[0] == 'nti' ? 'show' : ''}}" data-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#usuarios" data-toggle="collapse" class="sidebar-link collapsed">
                                Usuários
                            </a>
                            <ul id="usuarios" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('nti.usuario.index') }}">Listagem</a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('nti.usuario.create') }}">Cadastrar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#perfil" data-toggle="collapse" class="sidebar-link collapsed">
                                Perfil
                            </a>
                            <ul id="perfil" class="sidebar-dropdown list-unstyled collapse {{ explode('.',\Request::route()->getName())[1] == 'perfil' ? 'show' : ''}}">
                                <li class="sidebar-item {{ request()->routeIs('nti.perfil.index') ? 'active' : ''}}">
                                    <a class="sidebar-link" href="{{ route('nti.perfil.index') }}">Listagem</a>
                                </li>
                                <li class="sidebar-item {{ request()->routeIs('nti.perfil.create') ? 'active' : ''}}">
                                    <a class="sidebar-link" href="{{ route('nti.perfil.create') }}">Cadastrar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#cadastros" data-toggle="collapse" class="sidebar-link collapsed">
                                Cadastros
                            </a>
                            <ul id="cadastros" class="sidebar-dropdown list-unstyled collapse {{ explode('.',\Request::route()->getName())[1] == 'cadastro' ? 'show' : ''}}">
                                <li class="sidebar-item {{ request()->routeIs('nti.cadastro.grupo.index') ? 'active' : ''}}">
                                    <a href="{{route('nti.cadastro.grupo.index')}}" class="sidebar-link">
                                        Grupos
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#setores" class="sidebar-link">
                                        Setores
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#status" class="sidebar-link">
                                        Status
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#tecnicos" class="sidebar-link">
                                        Técnicos
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Ambiente Virtual de Documentos
                </li>
                <li class="sidebar-item">
                    {{-- Mirins --}}
                    <a href="#avd_mirins" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="fas fa-user-graduate" style="font-size: 18px"></i> <span class="align-middle">Mirins</span>
                    </a>
                    <ul id="avd_mirins" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#mirins_cursantes" data-toggle="collapse" class="sidebar-link collapsed">
                                Cursantes
                            </a>
                            <ul id="mirins_cursantes" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="">Listagem</a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="">Relatórios</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#mirins_executivos" data-toggle="collapse" class="sidebar-link collapsed">
                                Executivos/Aprendizes
                            </a>
                            <ul id="mirins_executivos" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="">Listagem</a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="">Relatórios</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- Colaboradores --}}
                <li class="sidebar-item">
                    <a href="#avd_colaboradores" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="fas fa-user-tie" style="font-size: 18px;"></i> <span class="align-middle">Colaboradores</span>
                    </a>
                    <ul id="avd_colaboradores" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('nti.usuario.index') }}">Listagem</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('nti.usuario.create') }}">Cadastrar</a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Empresas --}}
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Empresas
                </li>
                <li class="sidebar-item">
                    {{-- Controle de Folhas de Frequência --}}
                    <a href="#controle_folha_frequencia" data-toggle="collapse" class="sidebar-link collapsed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open align-middle me-2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> <span class="align-middle">Folhas de Frequência</span>
                    </a>
                    <ul id="controle_folha_frequencia" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="">Listagem</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="">Relatórios</a>
                        </li>
                    </ul>
                </li>
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
                    {{-- Profile --}}
                    <a href="#">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                    @if (Auth::guest())
                        <li>
                            <a class="btn btn-primary" style="color: white" {{-- href="{{ route('login') }}" --}}
                                id="messagesDropdown" data-bs-toggle="dropdown">
                                <span>Login</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                <span class="text-dark"></span>
                            </a>
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-toggle="dropdown">
                                <span class="avatar"> {{ auth()->user()->nome }}</span>
                                <span class="text-dark"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                    {{-- Fim Profile --}}
                </ul>
            </div>
        </nav>

        {{-- Main --}}
        <main class="content">
            <div class="container-fluid p-0">
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
                    <div class="col-6 text-right">
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
{{-- <script src="{{ url('js/jquery.js') }}"></script> --}}
<script src="{{ url('js/jquery.js')}}"></script>
<script src="{{ url('fontawesome-5.15.4/js/all.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{ url('js/function.js') }}"></script>
<script src="{{asset('select2-4.1.0/dist/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dataTables/datatables.min.js')}}"></script>
@yield('scripts')

</html>