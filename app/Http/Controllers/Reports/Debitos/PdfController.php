<?php

namespace App\Http\Controllers\Reports\Debitos;

use App\Http\Controllers\Controller;
use App\Models\Debito;
use App\Service\DataService;
use \PDF;

class PdfController extends Controller
{
    public function export()
    {
        try {
            $debitos = Debito::where('mes_id', DataService::retornaMesAtualInteger())
                ->where('ano', DataService::retornaAnoAtualInteger())
                ->where('user_id', auth()->id())
                ->get();



            return PDF::loadView('reports.debitos.pdf.index', compact('debitos'))
                ->download('nome-arquivo-pdf-gerado.pdf');
        }catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
