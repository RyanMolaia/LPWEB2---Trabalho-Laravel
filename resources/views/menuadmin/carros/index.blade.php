@extends('template_menus.index')

@section('conteudo')
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK',
                confirmButtonColor: '#c9a227', // dourado
            });
        });
    </script>
@endif

<div class="card shadow mt-4 border-0">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background-color: #343a40; color: #c9a227;">
        <h5 class="mb-0 fw-bold">Lista de Veículos</h5>
        <a href="{{ url('/admin/carros/cadastrar') }}" class="btn btn-outline-light btn-sm"
           style="border-color: #c9a227; color: #c9a227;">
            <i class="fas fa-plus"></i> Novo Veículo
        </a>
    </div>

    <div class="card-body bg-light">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead style="background-color: #c9a227; color: #343a40;">
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cor</th>
                        <th>Ano</th>
                        <th>Status</th>
                        <th>Placa</th>
                        <th>Quilometragem</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carros as $linha)
                        <tr>
                            <td>{{ $linha->id }}</td>
                            <td>{{ $linha->marca->nome ?? '-' }}</td>
                            <td>{{ $linha->modelo->nome ?? '-' }}</td>
                            <td>{{ $linha->cor->nome ?? '-' }}</td>
                            <td>{{ $linha->ano }}</td>
                            <td>{{ $linha->status }}</td>
                            <td>{{ $linha->placa }}</td>
                            <td>{{ number_format($linha->quilometragem, 0, ',', '.') }} km</td>
                            <td>R$ {{ number_format($linha->valor, 2, ',', '.') }}</td>
                            <td>{{ Str::limit($linha->descricao, 50) }}</td>
                            <td>
                                @if($linha->imagem_principal)
                                    <img src="{{ $linha->imagem_principal }}" alt="Imagem" width="80" class="rounded shadow-sm border">
                                @else
                                    <span class="text-muted">Sem imagem</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('carros.editar', $linha->id) }}"
                                   class="btn btn-sm"
                                   style="background-color: #c9a227; color: #343a40;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                            <td>
                               <span data-value="{{ $linha->id }}" data-nome="{{ $linha->nome }}"
                                    class="btn btn-sm text-white excluir"
                                    style="background-color: #a62c2b;">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".excluir").click(function(){
                var id = $(this).attr("data-value")
                var rota = "/admin/carros/excluir/" + id;

                Swal.fire({
                    title: "Tem certeza que deseja excluir este veículo?",
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
@endsection
