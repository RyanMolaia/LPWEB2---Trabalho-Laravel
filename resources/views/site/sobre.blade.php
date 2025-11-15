@extends('template_site.index')

@section('conteudo')

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #c9a227;">Sobre Nós</h2>
        <p class="text-muted">Conheça mais sobre a nossa história e propósito.</p>
    </div>

    <div class="row align-items-center mb-5">

        <div class="col-md-12">
            <h3 class="fw-bold mb-3 text-center" style="color: #c9a227;">Quem Somos</h3>
            <p class="text-muted" style="font-size: 1.05rem; line-height: 1.7;">
                Somos apaixonados por carros e comprometidos em oferecer a melhor experiência 
                para quem deseja comprar um veículo novo ou seminovo. 
                A <strong>MLCar</strong> nasceu com a visão de unir tecnologia, transparência 
                e atendimento personalizado, trazendo confiança para seus clientes em cada etapa da escolha.
            </p>

            <p class="text-muted" style="font-size: 1.05rem; line-height: 1.7;">
                Trabalhamos com veículos selecionados, revisados e com garantia de procedência,
                para que você saia satisfeito e seguro da sua compra.
            </p>
        </div>

    </div>

    <div class="row text-center g-4 mt-4">

        <div class="col-md-4">
            <div class="card shadow border-0 p-4 h-100" style="border-radius: 15px;">
                <i class="bi bi-shield-check" style="font-size: 2.5rem; color: #c9a227;"></i>
                <h5 class="fw-bold mt-3" style="color: #c9a227;">Confiança</h5>
                <p class="text-muted">Veículos com procedência garantida e transparência total.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 p-4 h-100" style="border-radius: 15px;">
                <i class="bi bi-people-fill" style="font-size: 2.5rem; color: #c9a227;"></i>
                <h5 class="fw-bold mt-3" style="color: #c9a227;">Atendimento Humano</h5>
                <p class="text-muted">Cada cliente é tratado como prioridade do começo ao fim.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 p-4 h-100" style="border-radius: 15px;">
                <i class="bi bi-lightning-fill" style="font-size: 2.5rem; color: #c9a227;"></i>
                <h5 class="fw-bold mt-3" style="color: #c9a227;">Agilidade</h5>
                <p class="text-muted">Processos simples, rápidos e sem burocracia desnecessária.</p>
            </div>
        </div>

    </div>

    <div class="mt-5 text-center">
        <h4 class="fw-bold mb-3" style="color: #c9a227;">Nosso Compromisso</h4>
        <p class="text-muted mx-auto" style="max-width: 700px; font-size: 1.05rem;">
            Trabalhamos todos os dias para oferecer veículos de qualidade e um atendimento 
            excepcional. Nosso maior objetivo é garantir que você tenha a melhor experiência 
            na hora de comprar seu carro.
        </p>
    </div>

</div>

@endsection