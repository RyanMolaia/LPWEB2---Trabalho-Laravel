

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

<form method="POST" action="<?php echo e(route('password.email')); ?>">
    <?php echo csrf_field(); ?>

    <p class="text-center mb-4 text-light" style="font-size: 0.95rem;">
        Informe seu e-mail para enviarmos o link de redefinição de senha.
    </p>

    <div class="input-wrapper">
        <input type="email" name="email" id="email" placeholder=" " required>
        <label for="email">E-mail</label>
    </div>

    <div class="d-grid mt-3">
        <button type="submit" class="login-btn mb-3">Enviar link</button>

        <a href="<?php echo e(route('login')); ?>" class="btn btn-back">
            <i class="bi bi-arrow-left-circle me-1"></i> Voltar
        </a>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_autenticacao.esqueceusenha', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/autenticacao/forgot-password.blade.php ENDPATH**/ ?>