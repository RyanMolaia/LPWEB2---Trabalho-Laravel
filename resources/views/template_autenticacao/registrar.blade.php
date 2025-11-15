<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - MLCAR</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('menuadmin/css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="card shadow-lg border-0 rounded-4 login-card">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h4 class="login-title">Registar - MLCAR</h4>
                </div>

                @yield("login")

            </div>
        </div>
    </div>


    <script src="{{ asset('menuadmin/js/form-utils.js') }}"></script>
    <script src="{{ asset('menuadmin/js/scriptlogin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('passwordToggle');
            const passwordInput = document.getElementById('password');

            toggle.addEventListener('click', () => {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                toggle.innerHTML = isPassword
                    ? '<i class="bi bi-eye-slash"></i>'
                    : '<i class="bi bi-eye"></i>';
            });
        });
    </script>

</body>
</html>
