<?php

namespace App\Http\Controllers;

use App\Service\Dashboard\Debitos;
use App\Service\Dashboard\Proventos;
use App\Service\DebitoService;
use App\Service\MesService;

class DashboardController extends Controller
{
    public function index()
    {
        $dados = MesService::getProventosDebitosGroupMesWithCount();

        $groupProventos = Proventos::getGroupByCategoriaWithCountProventos();
        $groupDebito = Debitos::getGroupByCategoriaWithCountDebitos();

        $groupProventoAnoAtual = Proventos::getGroupByCategoriaWithCountProventosAnoAtual();
        $groupDebitoAnoAtual = Debitos::getGroupByCategoriaWithCountDebitosAnoAtual();

        $dados = MesService::getProventosDebitosGroupMesWithCount();


        return view('dashboard.index',
            compact('groupProventos', 'groupDebito',
                'groupDebitoAnoAtual', 'groupProventoAnoAtual', 'dados'));
    }


}
