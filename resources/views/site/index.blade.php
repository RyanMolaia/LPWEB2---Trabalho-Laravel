@extends('template_site.index')

@section('conteudo')
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK',
                confirmButtonColor: '#c9a227',
            });
        });
    </script>
@endif

    <div class="container py-5">

        <h2 class="text-center mb-4" style="color: #c9a227; font: weight 700;">Carros Disponiveis</h2>

        <div class="container mb-4">
            <form method="GET" action="{{ route('site.index') }}" class="search-box">
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
        </div>
                            
        <div class="car-list-wrapper">
            <div class="row g-4">

                @forelse ($carros as $carro)
                    <div class="col-md-4">

                        
                        <div class="car-card">

                            <img src="{{ $carro->imagem_principal  }}" alt="{{ $carro->modelo->nome }}" >

                            <div class="car-card-body">

                                <h4 class="car-tittle">
                                    {{ $carro->modelo->nome }} • {{ $carro->marca->nome }}
                                </h4>

                                <p class="car-details">
                                    Ano: <strong>{{ $carro->ano }}</strong><br>
                                    Km: <strong>{{ number_format($carro->quilometragem, 0, ',', '.') }}</strong><br>
                                    Cor: <strong>{{ $carro->cor->nome }}</strong>
                                    Status: <strong>{{ $carro->status }}</strong>
                                </p>

                                <div class="car-price">
                                    R$ {{ number_format($carro->valor, 2, ',', '.') }}
                                </div>

                                <a href="{{ route('site.carro.detalhes', $carro->id) }}" class="btn-gold">
                                    Ver Detalhes
                                </a>

                            </div>
                        </div>
                    </div>

                    @empty
                     @if($busca)
                        <p class="text-center text-light mt-4">
                            Nenhum veículo encontrado para "<strong>{{ $busca }}</strong>".
                        </p>
                    @else
                        <p class="text-center text-light mt-4">
                            Nenhum carro novo disponível no momento.
                        </p>
                    @endif
                @endforelse
            </div>
        </div>
    </div>
@endsection