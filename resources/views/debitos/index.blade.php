@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            @include('debitos.components.cards')

            @include('debitos.components.form-busca')

            @include('components.alert-resultados')

            @include('debitos.components.debitos-janeiro')

            @include('debitos.components.debitos-fevereiro')

            @include('debitos.components.debitos-marco')

            @include('debitos.components.debitos-abril')

            @include('debitos.components.debitos-maio')

            @include('debitos.components.debitos-junho')

            @include('debitos.components.debitos-julho')

            @include('debitos.components.debitos-agosto')

            @include('debitos.components.debitos-setembro')

            @include('debitos.components.debitos-outubro')

            @include('debitos.components.debitos-novembro')

            @include('debitos.components.debitos-dezembro')
        </div>
    </div>

@endsection

@section('scripts')
@endsection
