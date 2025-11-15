

<?php $__env->startSection('conteudo'); ?>
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background-color: #343a40; color: #c9a227;">
        <h5 class="mb-0 fw-bold">Lista de Usuário - Em Desenvolvimento</h5>
         <a href="<?php echo e(url('/admin/modelos/cadastrar')); ?>" class="btn btn-outline-light btn-sm"
           style="border-color: #c9a227; color: #c9a227;">
            <i class="fas fa-plus"></i> Novo Usuário
        </a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_menus.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/menuadmin/usuarios/index.blade.php ENDPATH**/ ?>