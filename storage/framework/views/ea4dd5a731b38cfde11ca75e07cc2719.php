

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

<form method="POST" action="<?php echo e(route('password.store')); ?>">
    <?php echo csrf_field(); ?>


    <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">


    <p class="text-center mb-4 text-light" style="font-size: 0.95rem;">
        Defina sua nova senha para acessar sua conta.
    </p>

    <div class="input-wrapper">
        <input type="email"
            name="email"
            id="email"
            value="<?php echo e(old('email', $request->email)); ?>"
            placeholder=" "
            readonly
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

        <a href="<?php echo e(route('login')); ?>" class="btn btn-back">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_autenticacao.novasenha', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/autenticacao/reset-password.blade.php ENDPATH**/ ?>