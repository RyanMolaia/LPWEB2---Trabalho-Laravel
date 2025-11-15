@extends('template_menus.index')

@section('conteudo')
    <div class="card-header d-flex justify-content-between align-items-center"
         style="background-color: #343a40; color: #c9a227;">
        <h5 class="mb-0 fw-bold">Lista de Usuário - Em Desenvolvimento</h5>
         <a href="{{ url('/admin/modelos/cadastrar') }}" class="btn btn-outline-light btn-sm"
           style="border-color: #c9a227; color: #c9a227;">
            <i class="fas fa-plus"></i> Novo Usuário
        </a>
    </div>
@endsection