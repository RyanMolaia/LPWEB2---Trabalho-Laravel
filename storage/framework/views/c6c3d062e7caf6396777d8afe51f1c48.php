

<?php $__env->startSection('conteudo'); ?>
<?php if(session('success')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "<?php echo e(session('success')); ?>",
                confirmButtonText: 'OK',
                confirmButtonColor: '#c9a227', // dourado
            });
        });
    </script>
<?php endif; ?>
<?php if(session('error')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Atenção!',
                text: "<?php echo e(session('error')); ?>",
                confirmButtonText: 'OK',
                confirmButtonColor: '#c9a227', // dourado
            });
        });
    </script>
<?php endif; ?>

<div class="card shadow mt-4 border-0">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background-color: #343a40; color: #c9a227;">
        <h5 class="mb-0 fw-bold">Lista de Modelos</h5>
        <a href="<?php echo e(url('/admin/modelos/cadastrar')); ?>" class="btn btn-outline-light btn-sm"
           style="border-color: #c9a227; color: #c9a227;">
            <i class="fas fa-plus"></i> Novo Modelo
        </a>
    </div>

    <div class="card-body bg-light">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead style="background-color: #c9a227; color: #343a40;">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $modelos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($linha->id); ?></td>
                            <td><?php echo e($linha->nome); ?></td>
                            <td>
                                <a href="<?php echo e(route('modelos.editar', $linha->id)); ?>"
                                   class="btn btn-sm"
                                   style="background-color: #c9a227; color: #343a40;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                            <td>
                                <span data-value="<?php echo e($linha->id); ?>" data-nome="<?php echo e($linha->nome); ?>"
                                      class="btn btn-sm text-white excluir"
                                      style="background-color: #a62c2b;">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function(){
            $(".excluir").click(function(){
                var id = $(this).attr("data-value")
                var rota = "/admin/modelos/excluir/" + id;

                Swal.fire({
                    title: "Tem certeza que deseja excluir este modelo?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sim",
                    cancelButtonText: "Cancelar",
                    confirmButtonColor: "#a62c2b", 
                    cancelButtonColor: "#c9a227"  
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = rota;
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "Operação cancelada",
                            icon: "info",
                            confirmButtonText: "OK",
                            confirmButtonColor: "#c9a227"
                        });
                    }
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_menus.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/menuadmin/modelos/index.blade.php ENDPATH**/ ?>