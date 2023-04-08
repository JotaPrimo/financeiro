<?php

namespace App\Service;

class DataService
{
    public static function formatarHoraHI($data)
    {
        return date('H:i', strtotime($data));
    }

    public static function formatarHoraHIS($data)
    {
        return date('H:i:s', strtotime($data));
    }

    public static function formatarData($data)
    {
        return date('d/m/Y', strtotime($data));
    }

    public static function formatarDataYMD($data)
    {
        return date('Y-m-d', strtotime($data));
    }

    public static function formatarDataY($data)
    {
        return date('Y', strtotime($data));
    }

    public static function formatarDataDMYHMS($data)
    {
        return date('d/m/Y h:i:s', strtotime($data));
    }

    public static function validarIntervaloDatas($data_inicio, $data_fim)
    {
        if ($data_inicio < $data_fim) {
            return true;
        }
        return false;
    }

    public static function formatarDataDeHojeDMY()
    {
        $date = date('Y-m-d');
        return strftime("d/m/Y", strtotime($date));
    }

    public static function formatarDataDeHojePorExtenso()
    {
        setlocale(LC_TIME, 'portuguese');
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d');
        return strftime("%A, %d de %B de %Y", strtotime($date));
    }
}
