<?php

namespace App\Http\Controllers\Reports\Debitos;

use App\Exports\DebitosExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    public function export(Request $request)
    {
        return Excel::download(new DebitosExport($request), 'debitos.xlsx', true, ['X-Vapor-Base64-Encode' => 'True']);
    }
}
