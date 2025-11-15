<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class BaseAdminController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect()->route('login')
                ->with('error', 'Faça login para acessar o painel administrativo.')
                ->send();
        }

        if (!Auth::user()->is_admin) {   // ← CORRIGIDO AQUI
            redirect()->route('login')
                ->with('error', 'Acesso permitido apenas para administradores.')
                ->send();
        }
    }
}

