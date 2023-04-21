<?php

namespace App\Service\Dashboard;

use App\Models\CategoriaProvento;
use App\Models\Provento;
use App\Service\DataService;

class Proventos
{
    public static function getGroupByCategoriaWithCountProventos()
    {
        return Provento::all()
            ->groupBy('categoria_provento_id')
            ->map(function ($provento) {
                return $provento->count();
            })->map(function ($row, $key) {
                return [
                    'categoria' => CategoriaProvento::find($key)->nome,
                    'qtd' => $row,
                ];
            })->toArray();
    }

    public static function getGroupByCategoriaWithCountProventosAnoAtual()
    {
        return Provento::where('ano', DataService::retornaAnoAtualInteger())
            ->get()
            ->groupBy('categoria_provento_id')
            ->map(function ($provento) {
                return $provento->count();
            })->map(function ($row, $key) {
                return [
                    'categoria' => CategoriaProvento::find($key)->nome,
                    'qtd' => $row,
                ];
            })->toArray();
    }

}
