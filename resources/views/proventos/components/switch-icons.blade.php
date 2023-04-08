@switch($provento->categoria_provento_id)
    @case(App\Models\CategoriaProvento::SALARIO_MENSAL)
        <i class="fas fa-wallet fa-2x" title="{{ $provento->categoria->nome }}"></i>
        @break
    @case(App\Models\CategoriaProvento::ALUGUEL)
        <i class="fas fa-home fa-2x" title="{{ $provento->categoria->nome }}"></i>
        @break

    @case(App\Models\CategoriaProvento::FREELA)
        <i class="fas fa-unlock fa-2x" title="{{ $provento->categoria->nome }}"></i>
        @break

    @case(App\Models\CategoriaProvento::PIS)
        <i class="fas fa-user-graduate fa-2x" title="{{ $provento->categoria->nome }}"></i>
        @break

    @case(App\Models\CategoriaProvento::VALE_ALIMENTENCAO)
        <i class="fas fa-home fa-2x" title="{{ $provento->categoria->nome }}"></i>
        @break
    @default

@endswitch
