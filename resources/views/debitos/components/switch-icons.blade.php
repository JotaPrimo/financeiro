@switch($debito->categoria_debito_id)
    @case(App\Models\CategoriaDebito::COMIDA)
        <i class="fas fa-shopping-cart fa-2x" title="{{ $debito->categoria->nome }}"></i>
        @break
    @case(App\Models\CategoriaDebito::UBER)
        <i class="fas fa-taxi fa-2x" title="{{ $debito->categoria->nome }}"></i>
        @break

    @case(App\Models\CategoriaDebito::LAZER)
        <i class="fas fa-plane fa-2x" title="{{ $debito->categoria->nome }}"></i>
        @break

    @case(App\Models\CategoriaDebito::EDUCACAO)
        <i class="fas fa-user-graduate fa-2x" title="{{ $debito->categoria->nome }}"></i>
        @break

    @case(App\Models\CategoriaDebito::CONTAS_DE_CASA)
        <i class="fas fa-home fa-2x" title="{{ $debito->categoria->nome }}"></i>
        @break
    @default

@endswitch
