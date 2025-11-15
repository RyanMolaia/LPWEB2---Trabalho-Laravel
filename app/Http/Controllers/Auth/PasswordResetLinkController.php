<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('autenticacao.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.exists' => 'Este e-mail não está cadastrado em nossa base.',
        ]);

         $status = Password::sendResetLink(
        $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {

            return redirect()
                ->route('login')
                ->with('success', 'Enviamos um link para redefinir sua senha! Verifique seu e-mail.');
        }

        return back()
            ->withInput()
            ->withErrors([
                'email' => 'Não foi possível enviar o link. Tente novamente mais tarde.',
            ]);
        }
}
