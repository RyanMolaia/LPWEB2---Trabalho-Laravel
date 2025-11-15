<?php $__env->startSection('conteudo'); ?>

    <div class="car-details-container">

        <a href="
            <?php if(request('origem') === 'novos'): ?>
                <?php echo e(route('site.novos')); ?>

            <?php elseif(request('origem') === 'seminovos'): ?>
                <?php echo e(route('site.seminovos')); ?>

            <?php else: ?>
                <?php echo e(route('site.index')); ?>

            <?php endif; ?>
        " class="btn-back">
            <i class="fa fa-arrow-left"></i> Voltar
        </a>


        <div class="car-details-card mt-2">

            <div class="main-image">
                <img src="<?php echo e($carros->imagem_principal); ?>" alt="<?php echo e($carros->modelo->nome); ?>">
            </div>

            <div class="car-info">
                <h2 class="car-title">
                    <?php echo e($carros->marca->nome); ?> <?php echo e($carros->modelo->nome); ?>

                </h2>

                <h4 class="car-price">
                    R$ <?php echo e(number_format($carros->valor, 2, ',', '.')); ?>

                </h4>

                <p class="car-desc"><?php echo e($carros->descricao); ?></p>

                <ul class="spec-list">
                    <li><strong>Ano:</strong> <?php echo e($carros->ano); ?></li>
                    <li><strong>Quilometragem:</strong> <?php echo e(number_format($carros->quilometragem, 0, ',', '.')); ?></li>
                    <li><strong>Cor:</strong> <?php echo e($carros->cor->nome); ?></li>
                    <li><strong>Status:</strong> <?php echo e($carros->status); ?></li>
                </ul>

                <a href="https://wa.me/5514996370990?=Olá! Tenho interesse no <?php echo e($carros->modelo->nome); ?> (ID <?php echo e($carros->id); ?>)"
                    target="_blank"
                    class="btn-whatsapp">
                        <i class="fa fa-whatsapp"></i> Falar com vendedor
                </a>
            </div>
        </div>

        <?php if(count($galeria) > 0): ?>
        <h3 class="gallery-title mt-2">Galeria de Fotos</h3>

        <div class="gallery-container">
            <?php $__currentLoopData = $galeria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="<?php echo e(trim($img)); ?>" class="gallery-image"style="cursor: pointer;"alt="Fotos do Carro">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php endif; ?>

    </div>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.gallery-image').forEach(img => {

        img.addEventListener('click', function () {

            Swal.fire({
                html: `
                    <div class="mlcar-popup-wrapper">
                        <button class="mlcar-close-btn">&times;</button>
                        <img src="${this.src}" class="mlcar-popup-img" />
                    </div>
                `,
                showConfirmButton: false,
                background: 'transparent',
                width: 'auto',
                padding: 0,
                allowOutsideClick: false,
                backdrop: 'rgba(0,0,0,0.75)',
                customClass: {
                    popup: 'mlcar-image-popup'
                },
                didOpen: () => {
                    document.querySelector('.mlcar-close-btn')
                        .addEventListener('click', () => Swal.close());
                }
            });

        });
    });

});
</script>

<style>

/* ===== BACKDROP COM BLUR ===== */
.swal2-container.swal2-backdrop-show {
    backdrop-filter: blur(4px);
}

/* ===== CAIXA DO POPUP ===== */
.mlcar-image-popup {
    padding: 0 !important;
    background: transparent !important;
    border: none !important;
    box-shadow: none !important;
}

/* ===== WRAPPER DA IMAGEM ===== */
.mlcar-popup-wrapper {
    position: relative;
    display: inline-block;
    animation: zoomIn 0.25s ease-out;
}

/* ===== BOTÃO DE FECHAR (X) – NOVO DESIGN ===== */
.mlcar-close-btn {
    position: absolute;
    top: 10px;
    right: 10px;

    width: 38px;
    height: 38px;

    background: #c9a227;
    color: #000; /* Preto suave */
    border-radius: 50%;

    border: none; /* remove borda esquisita */
    outline: none;

    cursor: pointer;
    font-size: 24px;
    font-weight: bold;
    line-height: 34px; /* centraliza o X */

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow:
        0 0 10px rgba(201,162,39,0.6),
        0 0 4px rgba(0,0,0,0.5);

    transition: 0.2s ease-in-out;
    z-index: 9999;
}

/* HOVER – mais dourado */
.mlcar-close-btn:hover {
    background: #e5c14b;
    transform: scale(1.08);
}

/* ===== IMAGEM ===== */
.mlcar-popup-img {
    max-height: 90vh;
    border-radius: 12px;
    border: 4px solid #c9a227;
    box-shadow:
        0 0 25px rgba(201,162,39,0.4),
        0 0 10px rgba(0,0,0,0.7);
    display: block;
}

/* ===== ANIMAÇÃO ===== */
@keyframes zoomIn {
    from { transform: scale(0.7); opacity: 0; }
    to   { transform: scale(1);   opacity: 1; }
}

</style>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_site.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/site/carro/detalhes.blade.php ENDPATH**/ ?>