

<?php $__env->startSection('login'); ?>
<?php if($errors->any()): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Ops...',
                html: `
                    <ul style="text-align:left;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                `,
                confirmButtonText: 'Entendi',
                confirmButtonColor: '#d4af37',
            });
        });
    </script>
<?php endif; ?>

    <form method="POST" action="<?php echo e(route('registrar.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="input-wrapper">
            <input type="text" name="name" id="name" placeholder=" " >
            <label for="name">Nome completo</label>
        </div>

        <div class="input-wrapper">
            <input type="email" name="email" id="email" placeholder=" " >
            <label for="email">E-mail</label>
        </div>

        <div class="input-wrapper password-wrapper">
            <input type="password" name="password" id="password" placeholder=" " >
            <label for="password">Senha</label>
            <button type="button" class="password-toggle" onclick="togglePassword('password', this)">
                <i class="bi bi-eye"></i>
            </button>
        </div>

        <div class="input-wrapper password-wrapper">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder=" " >
            <label for="password_confirmation">Confirmar senha</label>
            <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)">
                <i class="bi bi-eye"></i>
            </button>
        </div>

        <div class="d-grid">
            <button type="submit" class="login-btn mb-3">Criar conta</button>

            <a href="<?php echo e(route('login')); ?>" class="btn btn-back">
                <i class="bi bi-arrow-left-circle me-1"></i> Voltar
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_autenticacao.registrar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/autenticacao/registrar.blade.php ENDPATH**/ ?>