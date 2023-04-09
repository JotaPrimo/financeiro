<?php

namespace App\Service;


use App\Models\Debito;
use App\Models\Mes;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DebitoService
{
    public static function returnTotalDebitoPorAno(Collection $debitosAnual, Request $request)
    {
        if (!$request->has('ano'))
            $ano = DataService::retornaAnoAtualInteger();
        else
            $ano = $request->ano;

        return $debitosAnual->filter(function ($debito) use ($ano) {
            return $debito->ano == $ano;
        })->sum(function ($valor) {
            return $valor->valor;
        });
    }

    public static function returnDebitoJaneiro(Collection $debitos)
    {
        return $debitos->filter(function (Debito $debito) {
            return $debito->mes_id == Mes::JANEIRO;
        });
    }

    public static function returnTotalDebitos(Collection $debitos)
    {
        return $debitos->map(function ($d) {
            return $d->valor;
        })->sum();
    }

    public static function returnTotalDebitoFormatado(Collection $debitos)
    {
        return "R$ " . number_format(self::returnTotalDebitos($debitos), 2, ',', '.');
    }

    public static function returnValorFormatadoDinheiro(float $valor)
    {
        return number_format($valor, 2, ',', '.');
    }

    public static function returnDebitoFevereiro(Collection $debitos)
    {
        return $debitos->filter(function (Debito $debito) {
            return $debito->mes_id == Mes::FEVEREIRO;
        });
    }

    public static function returnDebitoMarco(Collection $debitos)
    {
        return $debitos->filter(function (Debito $debito) {
            return $debito->mes_id == Mes::MARCO;
        });
    }



}
