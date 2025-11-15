@extends('template_menus.index')

@section('conteudo')
    <div class="container-fluid py-5">
    <div class="text-center text-light">

        <h1 class="mb-3" style="color: #c9a227; font-weight: 600;">
            Painel Administrativo • MLCar
        </h1>

        <p style="color: #c9a227; font-size: 1.1rem; max-width: 650px; margin: auto; line-height: 1.6;">
            Bem-vindo ao painel administrativo da MLCar!  
            Utilize o menu lateral à esquerda para navegar entre as opções disponíveis,
            como Carros, Marcas, Modelos, Cores e muito mais.
        </p>

        <hr class="mt-4" style="width: 60%; margin: auto; border-color: #c9a227;">

        <p class="mt-4" style="color: #c9a227; opacity: 0.85;">
            Selecione uma função no menu e comece a administrar o sistema.
        </p>

    </div>
</div>
@endsection