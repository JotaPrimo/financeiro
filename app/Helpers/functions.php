<?php


use App\Service\DataService;

if (!function_exists('verificarMesAtualShow')) {
    function verificarMesAtualShow($mes)
    {
        return DataService::retornaMesAtualInteger() == $mes ? 'show' : '';
    }
}

if (!function_exists('formatDecimalBRL')) {
    function formatDecimalBRL($valor)
    {
        return number_format($valor, 2, ',', '.');
    }
}

