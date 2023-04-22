<?php

namespace App\Http\Controllers\Reports\Debitos;

use App\Exports\DebitosExport;
use App\Http\Controllers\Controller;
use App\Models\CategoriaDebito;
use App\Models\Debito;
use App\Models\Mes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    public function index()
    {
        $debitos = Debito::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        $categoriasDebitos = CategoriaDebito::all();
        $meses = Mes::all();

        return view('reports.debitos.index', compact('debitos', 'meses', 'categoriasDebitos'));
    }

    public function export(Request $request)
    {
        return Excel::download(new DebitosExport($request), 'debitos.xlsx');
    }
}
