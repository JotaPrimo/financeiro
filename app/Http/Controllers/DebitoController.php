<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebitoRequest;
use App\Models\CategoriaDebito;
use App\Models\Debito;
use App\Models\Mes;
use App\Service\DataService;
use App\Service\DebitoService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DebitoController extends Controller
{
    public function index(Request $request)
    {
        try {

            $filters = $request->except('_token');

            $debitos = Debito::when($request->has('mes_id'), function ($query) use ($request) {
                $query->where('mes_id', $request->mes_id);
            })->when($request->has('ano'), function ($query) use ($request) {
                $query->where('ano', $request->ano);
            })->when($request->has('categoria_debito_id'), function ($query) use ($request) {
                $query->where('categoria_debito_id', $request->categoria_debito_id);
            })->when(!$request->has('ano'), function ($query) use ($request) {
                $query->where('ano', DataService::retornaAnoAtualInteger());
            })->where('user_id', auth()->user()->id)
                ->get();

            $totalAnual = DebitoService::returnTotalDebitoPorAno($debitos, $request);

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

            return view('debitos.index',
                compact('debitos', 'debitosJaneiro', 'debitosFevereiro', 'debitosMarco', 'debitosAbril',
                    'debitosMaio', 'debitosJunho', 'debitosJulho', 'debitosAgosto', 'debitosSetembro', 'debitosOutubro',
                    'debitosNovembro', 'debitosDezembro', 'categoriasDebitos', 'meses', 'filters', 'totalAnual'));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function create()
    {
        $categoriasDebitos = CategoriaDebito::all();
        $meses = Mes::orderBy('id')->get();

        return view('debitos.create', compact('categoriasDebitos', 'meses'));
    }

    public function store(DebitoRequest $request)
    {
        try {

            Debito::create($request->validated());

            Alert::toast('Débito cadastrado com sucesso', 'success');
            return redirect()->route('debito.index');

        }catch (\Exception $exception) {
            Alert::toast('Ocorreu um erro', 'error');
            return back();
        }
    }

    public function edit(int $id)
    {
        try {
            $categoriasDebitos = CategoriaDebito::all();
            $debito = CategoriaDebito::findOrFail($id);
            $meses = Mes::orderBy('id')->get();

            return view('debitos.create', compact('categoriasDebitos', 'meses', 'debito'));
        }catch (ModelNotFoundException $exception){
            Alert::toast('Registro não encontrado', 'error');
            return back();
        }
    }

    public function update(DebitoRequest $request, $id)
    {
        try {

            Debito::findOrFail($id)->update($request->validated());

            Alert::toast('Débito atualizado com sucesso', 'success');
            return redirect()->route('debito.index');

        }catch (ModelNotFoundException $exception) {
            Alert::toast('Registro não encontrado', 'error');
            return back();
        }
    }

    public function show(int $id)
    {
        try {
            $debito = Debito::findOrFail($id);

            return view('debitos.show', compact('debito'));

        } catch (ModelNotFoundException $exception) {
            Alert::toast('Registro não encontrado', 'error');
            return back();
        }

    }


}
