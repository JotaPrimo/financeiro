<?php

namespace App\Http\Controllers;

use App\Models\Ano;
use App\Models\CategoriaDebito;
use App\Models\Debito;
use App\Models\Mes;
use Illuminate\Http\Request;

class DebitoController extends Controller
{
    public function index(Request $request)
    {
        $debitos = Debito::groupBy(['ano_id', 'mes_id'])->where('ano_id', 2)->get();

        dd($debitos);

        return view('debitos.index', compact('debitos'));
    }

    public function create()
    {
        $categoriasDebitos = CategoriaDebito::all();
        $meses = Mes::orderBy('id')->get();
        $anos = Ano::orderBy('id')->get();

        return view('debitos.create', compact('categoriasDebitos', 'meses', 'anos'));
    }

}
