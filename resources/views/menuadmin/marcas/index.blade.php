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
@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Atenção!',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK',
                confirmButtonColor: '#c9a227', // dourado
            });
        });
    </script>
@endif

<div class="card shadow mt-4 border-0">
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background-color: #343a40; color: #c9a227;">
        <h5 class="mb-0 fw-bold">Lista de Marcas</h5>
        <a href="{{ url('/admin/marcas/cadastrar') }}" class="btn btn-outline-light btn-sm"
           style="border-color: #c9a227; color: #c9a227;">
            <i class="fas fa-plus"></i> Nova Marca
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
                    @foreach ($marcas as $linha)
                        <tr>
                            <td>{{ $linha->id }}</td>
                            <td>{{ $linha->nome }}</td>
                            <td>
                                <a href="{{ route('marcas.buscar', $linha->id) }}"
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
                var rota = "/admin/marcas/excluir/" + id;

                Swal.fire({
                    title: "Tem certeza que deseja excluir esta marca?",
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
