@extends('template_autenticacao.novasenha')

@section('login')

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'error',
            title: 'Ops...',
            html: `
                <ul style="text-align:left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonText: 'Entendi',
            confirmButtonColor: '#d4af37',
        });
    });
</script>
@endif

<form method="POST" action="{{ route('password.store') }}">
    @csrf


    <input type="hidden" name="token" value="{{ $request->route('token') }}">


    <p class="text-center mb-4 text-light" style="font-size: 0.95rem;">
        Defina sua nova senha para acessar sua conta.
    </p>

    <div class="input-wrapper">
        <input type="email"
            name="email"
            id="email"
            value="{{ old('email', $request->email) }}"
            placeholder=" "
            required >
        <label for="email">E-mail</label>
    </div>

    <div class="input-wrapper password-wrapper">
        <input type="password" name="password" id="password" placeholder=" ">
        <label for="password">Nova senha</label>

        <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>

    <div class="input-wrapper password-wrapper">
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder=" " >
        <label for="password_confirmation">Confirmar nova senha</label>

        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)">
            <i class="bi bi-eye"></i>
        </button>
    </div>

    <div class="d-grid mt-3">
        <button type="submit" class="login-btn mb-3">Redefinir senha</button>

        <a href="{{ route('login') }}" class="btn btn-back">
            <i class="bi bi-arrow-left-circle me-1"></i> Voltar ao login
        </a>
    </div>
</form>

<script>
    function togglePassword(id, btn) {
        const input = document.getElementById(id);
        const icon = btn.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>

@endsection
