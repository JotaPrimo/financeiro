<?php

namespace App\Service;

use App\Models\Debito;
use App\Models\Mes;
use Illuminate\Database\Eloquent\Collection;

class DebitoService
{
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
