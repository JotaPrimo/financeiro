<?php

namespace App\Service;

use App\Models\Debito;
use App\Models\Mes;
use App\Models\Provento;
use App\Service\Dashboard\Proventos;

class MesService
{
    public static function getProventosDebitosGroupMesWithCount()
    {
        return Mes::all()->map(function ($mes) {
            return [
                'mes' => Mes::find($mes->id)->nome,
                'proventos' => Provento::where('mes_id', $mes->id)->where('ano', DataService::retornaAnoAtualInteger())
                    ->sum('valor'),
                'debitos' => Debito::where('mes_id', $mes->id)->where('ano', DataService::retornaAnoAtualInteger())
                    ->sum('valor'),
            ];
        })->toArray();
    }
}
