



<?php $__env->startSection('conteudo'); ?>

<style>
select option:hover {
    background-color: #e9ecef;
    color: #000;
}
</style>
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
            <h5 class="mb-0 fw-bold">Cadastro de Modelos</h5>
        </div>

       <div class="card-body" style="background-color: #343a40; color: #c9a227;">
            <form method="POST" action="<?php echo e(route('modelos.novo')); ?>">
                <?php echo csrf_field(); ?>

                <div class="d-flex justify-content-center gap-4 flex-wrap">
                    <div class="mb-3 text-center">
                        <label for="nome" class="form-label fw-semibold">Nome do Modelo</label>
                        <input type="text" class="form-control bg-dark text-light border-warning text-center"
                            id="nome" name="nome" placeholder="Ex: Gol G5"
                            value="<?php echo e(old('nome')); ?>" />
                    </div>
               

                    <div class="col-md-3 text-center">
                        <label for="marca_id" class="form-label">Marca</label>
                        <div class="d-flex">
                            <select id="marca_id" name="marca_id" class="form-select form-control bg-dark text-light border-warning me-2" >
                                <option value="">Selecione...</option>
                                <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($marca->id); ?>"><?php echo e($marca->nome); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <button type="button" class="btn" 
                                    style="background-color:#d4af37; color:#2c2c2c;"
                                    data-bs-toggle="modal" data-bs-target="#modalMarca">
                                +
                            </button>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4 gap-2">
                    <button type="submit" class="btn px-4"
                            style="background-color: #c9a227; color: #2c2c2c; font-weight: bold; border: none;">
                        <i class="fas fa-save me-2"></i> Salvar
                    </button>
                    <a href="<?php echo e(route('modelos.index')); ?>" class="btn px-4 ml-1"
                    style="background-color: #2c2c2c; color: #c9a227; border: 1px solid #c9a227;">
                        <i class="fas fa-arrow-left me-2"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMarca" tabindex="-1" aria-labelledby="modalMarcaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="<?php echo e(route('marcas.novo')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="origem" value="carros">
            <div class="modal-content bg-dark text-light border-warning">
                <div class="modal-header border-warning">
                    <h5 class="modal-title text-warning">Nova Marca</h5>
                    <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nome_marca" class="form-label">Nome da Marca</label>
                    <input type="text" class="form-control bg-dark text-light border-warning" name="nome" id="nome_marca">
                </div>
                <div class="modal-footer border-warning">
                    <button type="submit" class="btn" style="background-color:#d4af37; color:#2c2c2c;">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_menus.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/menuadmin/modelos/cadastrar.blade.php ENDPATH**/ ?>