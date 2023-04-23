@extends('layouts.main')
@section('content')
    <form action="{{ route('debitos.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="">Débito</label>
                        <input
                            type="text"
                            required
                            minlength="5"
                            value="{{ old('nome') }}"
                            class="form-control @error('nome') is-invalid @enderror"
                            name="nome"
                            placeholder="Descrição do débito">
                        @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="">Valor</label>
                        <input
                            type="text"
                            value="{{ old('valor') }}"
                            required class="form-control money2"
                            name="valor"
                            placeholder="Valor">
                        @error('valor')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="">Ano</label>
                        <select id="ano" required name="ano" class="form-control @error('ano') is-invalid @enderror">
                            <option disabled selected>Escolha</option>
                            @forelse (\App\Service\DataService::ANOS as $ano)
                                <option value="{{ $ano }}" {{ old('ano') == $ano ? 'selected' : '' }}>{{ $ano }}
                                </option>
                            @empty
                                <option selected disabled>Sem registros</option>
                            @endforelse
                        </select>
                        @error('ano')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Mês</label>
                        <select id="mes_id" name="mes_id" class="form-control @error('mes_id') is-invalid @enderror">
                            <option disabled selected>Escolha</option>
                            @forelse ($meses as $mes)
                                <option value="{{ $mes->id }}" {{ $mes->id == old('mes_id') ? 'selected' : '' }}> {{ $mes->nome }}</option>
                            @empty
                                <option selected disabled>Sem registros</option>
                            @endforelse
                        </select>
                        @error('mes_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="">Categoria Débito</label>
                        <select id="categoria_debito_id" required name="categoria_debito_id" class="form-control @error('categoria_debito_id') is-invalid @enderror">
                            <option selected disabled>Escolha</option>
                            @forelse ($categoriasDebitos as $categoria)
                                <option value="{{ $categoria->id }}" {{ $categoria->id == old('categoria_debito_id') ? 'selected' : '' }}> {{ $categoria->nome }}</option>
                            @empty
                                <option disabled>Sem registros</option>
                            @endforelse
                        </select>
                        @error('categoria_debito_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-start">
            <button type="submit" title="Buscar" class="btn btn-sm btn-primary">
                Salvar
            </button>
            <a href="{{ route('debitos.index') }}" class="btn btn-sm btn-secondary">
                Voltar
            </a>
        </div>
    </form>
@endsection
@section('scripts')
@endsection
