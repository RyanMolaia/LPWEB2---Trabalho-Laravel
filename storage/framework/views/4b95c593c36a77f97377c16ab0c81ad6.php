

<?php $__env->startSection('conteudo'); ?>
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
                confirmButtonColor: '#c9a227',
            });
        });
    </script>
<?php endif; ?>

<?php if(session('success')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "<?php echo e(session('success')); ?>",
                confirmButtonColor: '#c9a227',
            });
        });
    </script>
<?php endif; ?>

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header text-center" 
             style="background-color: #2c2c2c; color: #c9a227; border-bottom: 2px solid #c9a227;">
            <h5 class="mb-0 fw-bold">Cadastro de Marcas</h5>
        </div>

       <div class="card-body" style="background-color: #343a40; color: #c9a227;">
            <form method="POST" action="<?php echo e(route('marcas.novo')); ?>">
                <?php echo csrf_field(); ?>

                <div class="d-flex justify-content-center">
                    <div class="mb-3 w-50 text-center">
                        <label for="nome" class="form-label fw-semibold">Nome da Marca</label>
                        <input type="text" class="form-control bg-dark text-light border-warning text-center"
                            id="nome" name="nome" placeholder="Ex: Fiat"
                            value="<?php echo e(old('nome')); ?>" />
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4 gap-2">
                    <button type="submit" class="btn px-4"
                            style="background-color: #c9a227; color: #2c2c2c; font-weight: bold; border: none;">
                        <i class="fas fa-save me-2"></i> Salvar
                    </button>
                    <a href="<?php echo e(route('marcas.index')); ?>" class="btn px-4 ml-1"
                    style="background-color: #2c2c2c; color: #c9a227; border: 1px solid #c9a227;">
                        <i class="fas fa-arrow-left me-2"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_menus.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/menuadmin/marcas/cadastrar.blade.php ENDPATH**/ ?>