@extends('template_autenticacao.esqueceusenha')

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

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <p class="text-center mb-4 text-light" style="font-size: 0.95rem;">
        Informe seu e-mail para enviarmos o link de redefinição de senha.
    </p>

    <div class="input-wrapper">
        <input type="email" name="email" id="email" placeholder=" " required>
        <label for="email">E-mail</label>
    </div>

    <div class="d-grid mt-3">
        <button type="submit" class="login-btn mb-3">Enviar link</button>

        <a href="{{ route('login') }}" class="btn btn-back">
            <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
    </div>
</form>

@endsection
