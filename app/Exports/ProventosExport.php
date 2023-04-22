<?php

namespace App\Exports;

use App\Models\Provento;
use App\Service\DataService;
use App\Service\ProventoService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProventosExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        return Provento::when($this->request->get('nome') !== null, function ($q) {
            $q->where('nome', $this->request['nome']);
        })->when($this->request->get('valor') !== null, function ($q) {
            $q->where('valor', $this->request['valor']);
        })->when($this->request->get('ano') !== null, function ($q) {
            $q->where('ano', $this->request['ano']);
        })->when($this->request->get('mes_id') !== null, function ($q) {
            $q->where('mes_id', $this->request['mes_id']);
        })->when($this->request->get('categoria_provento_id') !== null, function ($q) {
            $q->where('categoria_provento_id', $this->request['categoria_provento_id']);
        })->when($this->request->get('ano') == null, function ($q) {
            $q->where('ano', DataService::retornaAnoAtualInteger()) ;
        })->when($this->request->get('mes') == null, function ($q) {
            $q->where('mes_id', DataService::retornaMesAtualInteger());
        })->where('user_id', auth()->id())
            ->get();
    }

    public function headings(): array
    {
        return [
            'Débito',
            'Valor',
            'Usuário',
            'Ano',
            'Mês',
            'Categoria',
            'Data Cadastro',
        ];
    }

    public function map($row): array
    {
        return [
            $row->nome ?? '',
            ProventoService::returnValorFormatadoDinheiro($row->valor ?? 0.00),
            $row->user->name ?? '',
            $row->ano ?? '',
            $row->mes->nome ?? '',
            $row->categoria->nome ?? '',
            DataService::formatarData($row->created_at)
        ];
    }
}
