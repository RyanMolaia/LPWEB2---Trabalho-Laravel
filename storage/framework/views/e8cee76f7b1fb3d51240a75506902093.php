

<?php $__env->startSection('conteudo'); ?>
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

    <div class="container py-5">

        <h2 class="text-center mb-4" style="color: #c9a227; font: weight 700;">Carros Disponiveis</h2>

        <div class="container mb-4">
            <form method="GET" action="<?php echo e(route('site.index')); ?>" class="search-box">
                <input 
                    type="text" 
                    name="q" 
                    value="<?php echo e($busca ?? ''); ?>" 
                    placeholder="Buscar por modelo, marca ou cor..."
                >
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
                            
        <div class="car-list-wrapper">
            <div class="row g-4">

                <?php $__empty_1 = true; $__currentLoopData = $carros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4">

                        
                        <div class="car-card">

                            <img src="<?php echo e($carro->imagem_principal); ?>" alt="<?php echo e($carro->modelo->nome); ?>" >

                            <div class="car-card-body">

                                <h4 class="car-tittle">
                                    <?php echo e($carro->modelo->nome); ?> • <?php echo e($carro->marca->nome); ?>

                                </h4>

                                <p class="car-details">
                                    Ano: <strong><?php echo e($carro->ano); ?></strong><br>
                                    Km: <strong><?php echo e(number_format($carro->quilometragem, 0, ',', '.')); ?></strong><br>
                                    Cor: <strong><?php echo e($carro->cor->nome); ?></strong>
                                    Status: <strong><?php echo e($carro->status); ?></strong>
                                </p>

                                <div class="car-price">
                                    R$ <?php echo e(number_format($carro->valor, 2, ',', '.')); ?>

                                </div>

                                <a href="<?php echo e(route('site.carro.detalhes', $carro->id)); ?>" class="btn-gold">
                                    Ver Detalhes
                                </a>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                     <?php if($busca): ?>
                        <p class="text-center text-light mt-4">
                            Nenhum veículo encontrado para "<strong><?php echo e($busca); ?></strong>".
                        </p>
                    <?php else: ?>
                        <p class="text-center text-light mt-4">
                            Nenhum carro novo disponível no momento.
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_site.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/site/index.blade.php ENDPATH**/ ?>