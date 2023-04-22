<?php

namespace App\Exports;

use App\Models\Debito;
use App\Service\DataService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class DebitosExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        return Debito::when($this->request->get('nome'), function ($q) {
            $q->nome == $this->request['nome'];
        })->when($this->request->get('valor'), function ($q) {
            $q->valor == $this->request['valor'];
        })->when($this->request->get('ano'), function ($q) {
            $q->ano == $this->request['ano'];
        })->when($this->request->get('mes_id'), function ($q) {
            $q->mes_id == $this->request['mes_id'];
        })->when($this->request->get('categoria_debito_id'), function ($q) {
            $q->categoria_debito_id == $this->request['categoria_debito_id'];
        })->when(!$this->request->get('ano'), function ($q) {
            $q->ano == DataService::retornaAnoAtualInteger();
        })->when(!$this->request->get('mes'), function ($q) {
            $q->mes_id == DataService::retornaMesAtualInteger();
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
        ];
    }

    public function map($row): array
    {
        return [
            $row->nome ?? '',
            $row->valor ?? '',
            $row->user->name ?? '',
            $row->ano ?? '',
            $row->mes->nome ?? '',
            $row->categoria->nome ?? ''
        ];
    }

}
