

<?php $__env->startSection('conteudo'); ?>

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #c9a227;">Fale Conosco</h2>
        <p class="text-muted">Estamos sempre prontos para ajudar você.</p>
    </div>

    <div class="row g-4 justify-content-center">

        <div class="col-md-4">
            <div class="card shadow border-0 h-100 text-center p-4"
                 style="border-radius: 15px;">
                <div class="mb-3">
                    <i class="bi bi-envelope-fill" style="font-size: 2.2rem; color:#c9a227;"></i>
                </div>
                <h5 class="fw-bold" style="color: #c9a227;">E-mail</h5>
                <p class="text-muted mb-1">Entre em contato por e-mail</p>
                <p class="fw-semibold" style="color: #c9a227;">mlcar.laravel@gmail.com</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 h-100 text-center p-4"
                 style="border-radius: 15px;">
                <div class="mb-3">
                    <i class="bi bi-telephone-fill" style="font-size: 2.2rem; color:#c9a227;"></i>
                </div>
                <h5 class="fw-bold" style="color: #c9a227;">Telefone</h5>
                <p class="text-muted mb-1">Atendimento todos os dias</p>
                <p class="fw-semibold" style="color: #c9a227;">(14) 99637-0990</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 h-100 text-center p-4"
                 style="border-radius: 15px;">
                <div class="mb-3">
                    <i class="bi bi-geo-alt-fill" style="font-size: 2.2rem; color:#c9a227;"></i>
                </div>
                <h5 class="fw-bold" style="color: #c9a227;">Endereço</h5>
                <p class="text-muted mb-1">Venha nos visitar</p>
                <p class="fw-semibold" style="color: #c9a227;">Rua Luiz Amo Luna, 243 - Bauru/SP</p>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow border-0 p-4"
                 style="border-radius: 15px;">
                
                <h4 class="fw-bold text-center mb-4" style="color: #c9a227;">
                    Envie uma Mensagem
                </h4>

                <form id="form-contato">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #c9a227;">Seu Nome</label>
                        <input type="text" class="form-control" placeholder="Seu nome completo">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #c9a227;">E-mail</label>
                        <input type="email" class="form-control" placeholder="seuemail@exemplo.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #c9a227;">Mensagem</label>
                        <textarea class="form-control" rows="4" placeholder="Digite sua mensagem"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn px-4 py-2"
                            style="background: #c9a227; color:white; border-radius:8px;">
                            Enviar Mensagem
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 2000;">
    <div id="toastSuccess" class="toast align-items-center text-white bg-success border-0"
         role="alert" aria-live="polite" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Mensagem enviada com sucesso!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('form-contato').addEventListener('submit', function(e) {
    e.preventDefault();

    Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: 'Mensagem enviada com sucesso!',
        confirmButtonText: 'OK',
        confirmButtonColor: '#c9a227',
    });
});
</script>
<?php $__env->stopPush(); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_site.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/site/contato.blade.php ENDPATH**/ ?>