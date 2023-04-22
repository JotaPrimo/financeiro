<?php

namespace App\Exports;

use App\Models\Provento;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProventosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Provento::all();
    }
}
