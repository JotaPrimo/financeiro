<?php

namespace App\Http\Controllers;

use App\Models\Ano;
use App\Models\CategoriaDebito;
use App\Models\Debito;
use App\Models\Mes;
use App\Service\DebitoService;
use Illuminate\Http\Request;

class DebitoController extends Controller
{
    public function index(Request $request)
    {
        try {
            $filters = $request->except('_token');
            // dd($filters);

            $debitos = Debito::when($request->has('mes_id'), function($query) use ($request) {
                $query->where('mes_id', $request->mes_id);
            })->when($request->has('ano_id'), function($query) use ($request) {
                $query->where('ano_id', $request->ano_id);
            })->when($request->has('categoria_debito_id'), function($query) use ($request) {
                $query->where('categoria_debito_id', $request->categoria_debito_id);
            })->when(!$request->has('ano_id'), function($query) use ($request) {
                $query->where('ano_id', Ano::ANO_2023);
            })->where('user_id', auth()->user()->id)
                ->get();

            $debitosJaneiro = DebitoService::returnDebitoJaneiro($debitos);

            $debitosFevereiro = DebitoService::returnDebitoFevereiro($debitos);

            $debitosMarco = DebitoService::returnDebitoMarco($debitos);

            $debitosAbril = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::ABRIL;
            });

            $debitosMaio = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::MAIO;
            });

            $debitosJunho = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::JUNHO;
            });

            $debitosJulho = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::JULHO;
            });

            $debitosAgosto = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::AGOSTO;
            });

            $debitosSetembro = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::SETEMBRO;
            });

            $debitosOutubro = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::OUTUBRO;
            });

            $debitosNovembro = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::NOVEMBRO;
            });

            $debitosDezembro = $debitos->filter(function (Debito $debito) {
                return $debito->mes_id == Mes::DEZEMBRO;
            });


            $categoriasDebitos = CategoriaDebito::orderBy('nome')->get(['id', 'nome']);
            $meses = Mes::orderBy('id')->get(['id', 'nome']);
            $anos = Ano::orderBy('id')->get(['id', 'nome']);

            return view('debitos.index',
                compact('debitos', 'debitosJaneiro', 'debitosFevereiro', 'debitosMarco', 'debitosAbril',
                    'debitosMaio', 'debitosJunho', 'debitosJulho', 'debitosAgosto', 'debitosSetembro', 'debitosOutubro',
                    'debitosNovembro', 'debitosDezembro', 'categoriasDebitos', 'meses', 'anos', 'filters'));
        }catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function create()
    {
        $categoriasDebitos = CategoriaDebito::all();
        $meses = Mes::orderBy('id')->get();
        $anos = Ano::orderBy('id')->get();

        return view('debitos.create', compact('categoriasDebitos', 'meses', 'anos'));
    }

}
