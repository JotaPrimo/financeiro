<form method="POST">
    @csrf
    @method('POST')
    <div class="row mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Provento">
                    </div>
                    <div class="col">
                        <label for="">Valor</label>
                        <input type="text" class="form-control money2" name="valor" placeholder="Valor">
                    </div>
                    <div class="col">
                        <label for="">Ano</label>
                        <select id="inputState" name="ano" class="form-control">
                            <option disabled selected>Escolha</option>
                            @forelse (\App\Service\DataService::ANOS as $ano)
                                <option value="{{ $ano }}"
                                    @isset($filters['ano'])
                                        {{ $filters['ano'] == $ano ? 'selected' : '' }}
                                    @endisset>
                                    {{ $ano }}
                                </option>
                            @empty
                                <option selected disabled>Sem registros</option>
                            @endforelse
                        </select>
                        @isset($filters['categoria_provento_id'])
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
                       @isset($filters['categoria_provento_id'])
                           @include('debitos.components.filtro-aplicado')
                       @endisset
                   </div>
                   <div class="col">
                       <label for="">Categoria Provento</label>
                       <select id="inputState" name="categoria_provento_id" class="form-control">
                           <option disabled selected>Escolha</option>
                           @forelse ($categoriasProventos as $categoria)
                               <option value="{{ $categoria->id }}"
                               @isset($filters['categoria_provento_id'])
                                   {{ $filters['categoria_provento_id'] == $categoria->id ? 'selected' : '' }}
                                   @endisset
                               > {{ $categoria->nome }}</option>
                           @empty
                               <option selected disabled>Sem registros</option>
                           @endforelse
                       </select>
                       @isset($filters['categoria_provento_id'])
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
