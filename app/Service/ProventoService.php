<?php

namespace App\Service;

use App\Models\Mes;
use App\Models\Provento;
use Illuminate\Database\Eloquent\Collection;

class ProventoService
{
    public static function returnTotalProventoPorAno(Collection $proventosAnual, $ano = null)
    {
        if (is_null($ano)) {
            $ano = DataService::retornaAnoAtualInteger();
        }

        return $proventosAnual->filter(function ($provento) use ($ano) {
            return $provento->ano == $ano;
        })->sum(function ($valor) {
            return $valor->valor;
        });
    }

    public static function returnProventoJaneiro(Collection $proventos)
    {
        return $proventos->filter(function (Provento $provento) {
            return $provento->mes_id == Mes::JANEIRO;
        });
    }

    public static function returnTotalProventos(Collection $proventos)
    {
        return $proventos->map(function ($d) {
            return $d->valor;
        })->sum();
    }

    public static function returnTotalProventoFormatado(Collection $proventos)
    {
        return "R$ " . number_format(self::returnTotalProventos($proventos), 2, ',', '.');
    }

    public static function returnProventoFevereiro(Collection $proventos)
    {
        return $proventos->filter(function (Provento $provento) {
            return $provento->mes_id == Mes::FEVEREIRO;
        });
    }

    public static function returnProventoMarco(Collection $proventos)
    {
        return $proventos->filter(function (Provento $provento) {
            return $provento->mes_id == Mes::MARCO;
        });
    }
}
