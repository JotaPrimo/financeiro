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
        $dados = DebitoService::getDebitosMesAtual();

        $groupProventos = Proventos::getGroupByCategoriaWithCountProventos();
        $groupDebito = Debitos::getGroupByCategoriaWithCountDebitos();

        $groupProventoAnoAtual = Proventos::getGroupByCategoriaWithCountProventosAnoAtual();
        $groupDebitoAnoAtual = Debitos::getGroupByCategoriaWithCountDebitosAnoAtual();


        return view('dashboard.index',
            compact('groupProventos', 'groupDebito',
                'groupDebitoAnoAtual', 'groupProventoAnoAtual'));
    }

    public function linhas()
    {

        $dados = MesService::getProventosDebitosGroupMesWithCount();

        // dd($dados);

        return view('dashboard.linhas',
            compact('dados'));
    }

}
