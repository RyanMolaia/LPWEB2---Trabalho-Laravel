@extends('template_site.index')

@section('conteudo')

    <div class="car-details-container">

        <a href="
            @if(request('origem') === 'novos')
                {{ route('site.novos') }}
            @elseif(request('origem') === 'seminovos')
                {{ route('site.seminovos') }}
            @else
                {{ route('site.index') }}
            @endif
        " class="btn-back">
            <i class="fa fa-arrow-left"></i> Voltar
        </a>


        <div class="car-details-card mt-2">

            <div class="main-image">
                <img src="{{ $carros->imagem_principal }}" alt="{{ $carros->modelo->nome }}">
            </div>

            <div class="car-info">
                <h2 class="car-title">
                    {{ $carros->marca->nome }} {{ $carros->modelo->nome }}
                </h2>

                <h4 class="car-price">
                    R$ {{ number_format($carros->valor, 2, ',', '.') }}
                </h4>

                <p class="car-desc">{{ $carros->descricao }}</p>

                <ul class="spec-list">
                    <li><strong>Ano:</strong> {{ $carros->ano }}</li>
                    <li><strong>Quilometragem:</strong> {{ number_format($carros->quilometragem, 0, ',', '.') }}</li>
                    <li><strong>Cor:</strong> {{ $carros->cor->nome }}</li>
                    <li><strong>Status:</strong> {{ $carros->status }}</li>
                </ul>

                <a href="https://wa.me/5514996370990?=Olá! Tenho interesse no {{ $carros->modelo->nome }} (ID {{ $carros->id }})"
                    target="_blank"
                    class="btn-whatsapp">
                        <i class="fa fa-whatsapp"></i> Falar com vendedor
                </a>
            </div>
        </div>

        @if (count($galeria) > 0)
        <h3 class="gallery-title mt-2">Galeria de Fotos</h3>

        <div class="gallery-container">
            @foreach ($galeria as $img)
                <img src="{{ trim($img) }}" class="gallery-image" alt="Fotos do Carro">
            @endforeach
        </div>

        @endif

    </div>
@endsection