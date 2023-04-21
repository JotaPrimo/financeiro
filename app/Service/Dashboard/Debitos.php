<?php

namespace App\Service\Dashboard;

use App\Models\CategoriaDebito;
use App\Models\Debito;
use App\Service\DataService;

class Debitos
{
    public static function getGroupByCategoriaWithCountDebitos()
    {
        return Debito::all()
            ->groupBy('categoria_debito_id')
            ->map(function ($provento) {
                return $provento->count();
            })->map(function ($row, $key) {
                return [
                    'categoria' => CategoriaDebito::find($key)->nome,
                    'qtd' => $row,
                ];
            })->toArray();
    }

    public static function getGroupByCategoriaWithCountDebitosAnoAtual()
    {
        return Debito::where('ano', DataService::retornaAnoAtualInteger())
            ->get()
            ->groupBy('categoria_debito_id')
            ->map(function ($provento) {
                return $provento->count();
            })->map(function ($row, $key) {
                return [
                    'categoria' => CategoriaDebito::find($key)->nome,
                    'qtd' => $row,
                ];
            })->toArray();
    }

}
