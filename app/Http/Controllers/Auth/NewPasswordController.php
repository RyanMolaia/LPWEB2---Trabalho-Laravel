<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('autenticacao.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       $request->validate([
        'token' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ], [
        'token.required' => 'O token de redefinição é inválido ou está faltando.',
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'Informe um e-mail válido.',
        'password.required' => 'A nova senha é obrigatória.',
        'password.confirmed' => 'As senhas não coincidem.',
        'password.min' => 'A nova senha deve conter no mínimo :min caracteres.',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user) use ($request) {
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        }
    );

    if ($status === Password::PASSWORD_RESET) {
        return redirect()
            ->route('login')
            ->with('success', 'Senha redefinida com sucesso! Você já pode fazer login.');
    }

    return back()
        ->withInput($request->only('email'))
        ->withErrors([
            'email' => $this->translateError($status),
        ]);
    }

    private function translateError($status)
    {
        return match ($status) {
            Password::INVALID_TOKEN      => 'O link de redefinição é inválido ou expirou.',
            Password::INVALID_USER       => 'Não encontramos um usuário com este e-mail.',
            Password::RESET_THROTTLED    => 'Aguarde um pouco antes de tentar novamente.',
            default                      => 'Não foi possível redefinir a senha. Tente novamente.',
        };
    }
}
