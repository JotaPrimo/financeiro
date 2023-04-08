
<form method="POST">
    @csrf
    @method('POST')
    <div class="row mt-5">
      <div class="col">
        <input type="text" class="form-control" name="nome" placeholder="First name">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="valor" placeholder="Last name">
      </div>
    </div>
    <div class="row mt-5">
        <div class="col">
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
        <div class="col">
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

      <div class="mt-5 justify-start">
        <button type="submit" class="btn btn-sm btn-primary">Buscar</button>
      </div>

  </form>
