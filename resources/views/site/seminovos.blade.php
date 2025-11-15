@extends('template_site.index')

@section('conteudo')
<div class="container py-5">

<h2 class="text-center mb-4" style="color: #c9a227;">Carros Seminovos</h2>

     <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <a href="{{ $busca ? route('site.seminovos') : route('site.index') }}" class="btn-back">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>

            <form method="GET" 
                action="{{ route('site.seminovos') }}" 
                class="search-box"
                style="margin-left: auto; margin-right: auto;">
                
                <input 
                    type="text" 
                    name="q" 
                    value="{{ $busca ?? '' }}" 
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

            @forelse ($carros as $carro)
                <div class="col-md-4">
                    <div class="car-card">
                        <img src="{{ $carro->imagem_principal }}" alt="{{ $carro->modelo->nome }}">
                        <div class="car-card-body">
                            <h4 class="car-title">{{ $carro->modelo->nome }} • {{ $carro->marca->nome }}</h4>

                            <p class="car-details">
                                Ano: <strong>{{ $carro->ano }}</strong><br>
                                Km: <strong>{{ number_format($carro->quilometragem, 0, ',', '.') }}</strong><br>
                                Cor: <strong>{{ $carro->cor->nome }}</strong><br>
                                Status: <strong>{{ $carro->status }}</strong>
                            </p>

                            <div class="car-price">R$ {{ number_format($carro->valor, 2, ',', '.') }}</div>

                            <a href="{{ route('site.carro.detalhes', ['id' => $carro->id, 'origem' => 'seminovos']) }}" class="btn-gold">Ver Detalhes</a>

                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-light">Nenhum carro seminovo disponível no momento.</p>
            @endforelse

        </div>
</div>

@endsection
