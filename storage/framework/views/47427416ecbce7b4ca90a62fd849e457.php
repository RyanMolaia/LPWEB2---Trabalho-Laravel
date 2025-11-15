<?php $__env->startSection('conteudo'); ?>
<div class="container py-5">

<h2 class="text-center mb-4" style="color: #c9a227;">Carros Seminovos</h2>

     <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <a href="<?php echo e($busca ? route('site.seminovos') : route('site.index')); ?>" class="btn-back">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>

            <form method="GET" 
                action="<?php echo e(route('site.seminovos')); ?>" 
                class="search-box"
                style="margin-left: auto; margin-right: auto;">
                
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
            <div style="width:120px"></div>
        </div>

    </div>


    <div class="car-list-wrapper">
        <div class="row g-4">

            <?php $__empty_1 = true; $__currentLoopData = $carros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4">
                    <div class="car-card">
                        <img src="<?php echo e($carro->imagem_principal); ?>" alt="<?php echo e($carro->modelo->nome); ?>">
                        <div class="car-card-body">
                            <h4 class="car-title"><?php echo e($carro->modelo->nome); ?> • <?php echo e($carro->marca->nome); ?></h4>

                            <p class="car-details">
                                Ano: <strong><?php echo e($carro->ano); ?></strong><br>
                                Km: <strong><?php echo e(number_format($carro->quilometragem, 0, ',', '.')); ?></strong><br>
                                Cor: <strong><?php echo e($carro->cor->nome); ?></strong><br>
                                Status: <strong><?php echo e($carro->status); ?></strong>
                            </p>

                            <div class="car-price">R$ <?php echo e(number_format($carro->valor, 2, ',', '.')); ?></div>

                            <a href="<?php echo e(route('site.carro.detalhes', ['id' => $carro->id, 'origem' => 'seminovos'])); ?>" class="btn-gold">Ver Detalhes</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center text-light">Nenhum carro seminovo disponível no momento.</p>
            <?php endif; ?>

        </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_site.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/site/seminovos.blade.php ENDPATH**/ ?>