@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('reports.debitos.csv-export') }}" method="get">
                @csrf
                @include('debitos.components.form-busca')
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
