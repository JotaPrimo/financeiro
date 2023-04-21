<?php


use App\Service\DataService;

if (!function_exists('verificarMesAtualShow')) {
    function verificarMesAtualShow($mes)
    {
        return DataService::retornaMesAtualInteger() == $mes ? 'show' : '';
    }
}
