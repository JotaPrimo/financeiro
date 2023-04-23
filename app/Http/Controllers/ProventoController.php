<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProventoRequest;
use App\Models\CategoriaProvento;
use App\Models\Provento;
use App\Models\Mes;
use App\Service\DataService;
use App\Service\ProventoService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
                ->where('deletado', Provento::NAO_DELETADO)
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
        $categoriasProventos = CategoriaProvento::where('deletado', CategoriaProvento::NAO_DELETADO)->get();
        $meses = Mes::orderBy('id')->get();

        return view('proventos.create', compact('categoriasProventos', 'meses'));
    }

    public function store(ProventoRequest $request)
    {
        try {

            Provento::create($request->validated() +
                [
                    'user_id' => auth()->user()->id
                ]);

            Alert::toast('Débito cadastrado com sucesso', 'success');
            return redirect()->route('proventos.index');

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Alert::toast('Ocorreu um erro', 'error');
            return back();
        }
    }

    public function edit(int $id)
    {
        try {
            $categoriasProventos = CategoriaProvento::all();
            $debito = CategoriaProvento::findOrFail($id);
            $meses = Mes::orderBy('id')->get();

            return view('proventos.create', compact('categoriasProventos', 'meses', 'debito'));
        } catch (ModelNotFoundException $exception) {
            Alert::toast('Registro não encontrado', 'error');
            return back();
        }
    }

    public function update(ProventoRequest $request, $id)
    {
        try {

            Provento::findOrFail($id)->update(
                $request->validated() +
                [
                    'user_id' => auth()->user()->id
                ]
            );

            Alert::toast('Débito atualizado com sucesso', 'success');
            return redirect()->route('debito.index');

        } catch (ModelNotFoundException $exception) {
            Alert::toast('Registro não encontrado', 'error');
            return back();
        }
    }

    public function show(int $id)
    {
        try {
            $debito = Provento::findOrFail($id);

            return view('proventos.show', compact('debito'));

        } catch (ModelNotFoundException $exception) {
            Alert::toast('Registro não encontrado', 'error');
            return back();
        }

    }

    public function destroy(int $id)
    {
        try {
            Provento::findOrFail($id)->update([
                'deletado' => Provento::DELETADO
            ]);

            Alert::toast('Registro deletado com sucesso', 'success');
            return view('proventos.index');

        } catch (ModelNotFoundException $exception) {
            Alert::toast('Registro não encontrado', 'error');
            return back();
        }
    }

}
