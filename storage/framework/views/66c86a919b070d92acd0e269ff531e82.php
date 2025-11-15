<?php $__env->startSection('login'); ?>
<?php if(session('success')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "<?php echo e(session('success')); ?>",
                confirmButtonText: 'OK',
                confirmButtonColor: '#c9a227',
            });
        });
    </script>
<?php endif; ?>

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

    <form class="login-form" method="POST" action="<?php echo e(Route('login.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <div class="input-wrapper">
                <input type="email" id="email" name="email" autocomplete="email">
                <label for="email">E-mail</label>
                <span class="focus-border"></span>
            </div>
            <span class="error-message" id="emailError"></span>
        </div>

        <div class="form-group mb-3">
            <div class="input-wrapper password-wrapper">
                <input type="password" id="password" name="password" autocomplete="current-password">
                <label for="password">Senha</label>
                <button type="button" class="password-toggle" id="passwordToggle" aria-label="Mostrar senha">
                    <i class="bi bi-eye"></i>
                </button>
                <span class="focus-border"></span>
            </div>
            <span class="error-message" id="passwordError"></span>
        </div>

        <div class="form-options">
            <label class="remember-wrapper">
                <input type="checkbox" id="remember" name="remember">
                <span class="checkbox-label text-white">
                    <span class="checkmark"></span>
                    Lembrar me
                </span>
            </label>
            <a href="<?php echo e(route('password.request')); ?>" class="forgot-password text-white">Esqueceu sua senha?</a>
        </div>

        <button type="submit" class="login-btn btn mb-1">
            <span class="btn-text">Entrar</span>
            <span class="btn-loader"></span>
        </button>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_autenticacao.login', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/autenticacao/login.blade.php ENDPATH**/ ?>