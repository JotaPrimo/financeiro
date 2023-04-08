<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AutenticacaoController extends Controller
{
    const SENHA_NAO_ATUALIZADA = 0;
    const SENHA_ATUALIZADA = 1;

    public function autenticacao(Request $request) {

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password, 'deletado' => User::NAO_DELETADO])) {
            Alert::toast('Credenciais de acesso inválidas.', 'danger');
            return redirect()->back();
        }

        return redirect()->route('dashboard.index');
    }
}
