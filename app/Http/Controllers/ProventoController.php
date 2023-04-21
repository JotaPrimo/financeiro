<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProvento;
use App\Models\Mes;
use App\Models\Provento;
use App\Service\DataService;
use App\Service\ProventoService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProventoController extends Controller
{
    public function index(Request $request)
    {
        try {
            $filters = $request->except('_token');

            $proventos = Provento::when($request->has('mes_id'), function($query) use ($request) {
                $query->where('mes_id', $request->mes_id);
            })->when($request->has('ano'), function($query) use ($request) {
                $query->where('ano', $request->ano);
            })->when($request->has('categoria_provento_id'), function($query) use ($request) {
                $query->where('categoria_provento_id', $request->categoria_provento_id);
            })->when(!$request->has('ano'), function($query) use ($request) {
                $query->where('ano', DataService::retornaAnoAtualInteger());
            })->where('user_id', auth()->user()->id)
                ->get();

            $totalAnual = ProventoService::returnTotalProventoPorAno($proventos, $request);

            $proventosJaneiro = ProventoService::returnProventoJaneiro($proventos);

            $proventosFevereiro = ProventoService::returnProventoFevereiro($proventos);

            $proventosMarco = ProventoService::returnProventoMarco($proventos);

            $proventosAbril = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::ABRIL;
            });

            $proventosMaio = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::MAIO;
            });

            $proventosJunho = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::JUNHO;
            });

            $proventosJulho = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::JULHO;
            });

            $proventosAgosto = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::AGOSTO;
            });

            $proventosSetembro = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::SETEMBRO;
            });

            $proventosOutubro = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::OUTUBRO;
            });

            $proventosNovembro = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::NOVEMBRO;
            });

            $proventosDezembro = $proventos->filter(function (Provento $provento) {
                return $provento->mes_id == Mes::DEZEMBRO;
            });


            $categoriasProventos = CategoriaProvento::orderBy('nome')->get(['id', 'nome']);
            $meses = Mes::orderBy('id')->get(['id', 'nome']);

            return view('proventos.index',
                compact('totalAnual','proventos', 'proventosJaneiro', 'proventosFevereiro', 'proventosMarco', 'proventosAbril',
                    'proventosMaio', 'proventosJunho', 'proventosJulho', 'proventosAgosto', 'proventosSetembro', 'proventosOutubro',
                    'proventosNovembro', 'proventosDezembro', 'categoriasProventos', 'meses', 'filters'));
        }catch (\Exception $exception) {
            Alert::toast('Ocorreu um erro');
            return back();
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Provento $provento)
    {
        //
    }

    public function edit(Provento $provento)
    {
        //
    }

    public function update(Request $request, Provento $provento)
    {
        //
    }


    public function destroy(Provento $provento)
    {
        //
    }

}
