<form method="POST">
    @csrf
    @method('POST')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="">
                    </div>
                    <div class="col">
                        <label for="">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="Valor">
                    </div>
                    <div class="col">
                        <label for="">Ano</label>
                        <select id="inputState" name="ano_id" class="form-control">
                            <option disabled selected>Escolha</option>
                            @forelse ($anos as $ano)
                                <option value="{{ $ano->id }}"
                                @isset($filters['ano_id'])
                                    {{ $filters['ano_id'] == $ano->id ? 'selected' : '' }}
                                    @endisset>
                                    {{ $ano->nome }}</option>
                            @empty
                                <option selected disabled>Sem registros</option>
                            @endforelse
                        </select>
                        @isset($filters['categoria_debito_id'])
                            @include('debitos.components.filtro-aplicado')
                        @endisset
                    </div>
                </div>
               <div class="row mt-3">
                   <div class="col">
                       <label for="">Mês</label>
                       <select id="inputState" name="mes_id" class="form-control">
                           <option disabled selected>Escolha</option>
                           @forelse ($meses as $mes)
                               <option value="{{ $mes->id }}"
                               @isset($filters['mes_id'])
                                   {{ $filters['mes_id'] == $mes->id ? 'selected' : '' }}
                                   @endisset
                               > {{ $mes->nome }}</option>
                           @empty
                               <option selected disabled>Sem registros</option>
                           @endforelse
                       </select>
                       @isset($filters['categoria_debito_id'])
                           @include('debitos.components.filtro-aplicado')
                       @endisset
                   </div>
                   <div class="col">
                       <label for="">Categoria Débito</label>
                       <select id="inputState" name="categoria_debito_id" class="form-control">
                           <option disabled selected>Escolha</option>
                           @forelse ($categoriasDebitos as $categoria)
                               <option value="{{ $categoria->id }}"
                               @isset($filters['categoria_debito_id'])
                                   {{ $filters['categoria_debito_id'] == $categoria->id ? 'selected' : '' }}
                                   @endisset
                               > {{ $categoria->nome }}</option>
                           @empty
                               <option selected disabled>Sem registros</option>
                           @endforelse
                       </select>
                       @isset($filters['categoria_debito_id'])
                           @include('debitos.components.filtro-aplicado')
                       @endisset
                   </div>
               </div>
            </div>
        </div>
        <div class="justify-start">
            <button type="submit" title="Buscar" class="btn btn-sm btn-primary">
                <i class="fas fa-search"></i>
            </button>
            <a href="{{ route('debitos.index') }}" title="Limpar Filtros" class="btn btn-sm btn-secondary">
                <i class="fas fa-sync"></i>
            </a>
        </div>
    </div>
</form>
