@extends('template_menus.index')

@section('conteudo')
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Ops...',
                html: `
                    <ul style="text-align:left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonText: 'Entendi',
                confirmButtonColor: '#d4af37',
            });
        });
    </script>
@endif
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#d4af37',
            });
        });
    </script>
@endif

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header text-center" 
             style="background-color: #2c2c2c; color: #d4af37; border-bottom: 2px solid #d4af37;">
            <h5 class="mb-0 fw-bold">Cadastro de Veículos</h5>
        </div>

        <div class="card-body" style="background-color: #343a40; color: #d4af37;">
            <form method="POST" action="{{ route('carros.novo') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">

                    <div class="col-md-2">
                        <label for="marca_id" class="form-label">Marca</label>
                        <div class="d-flex">
                            <select id="marca_id" name="marca_id" class="form-select form-control bg-dark text-light border-warning me-2" >
                                <option value="">Selecione...</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                                        {{ $marca->nome }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="button" class="btn" 
                                    style="background-color:#d4af37; color:#2c2c2c;"
                                    data-bs-toggle="modal" data-bs-target="#modalMarca">
                                +
                            </button>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="modelo_id" class="form-label">Modelo</label>
                        <div class="d-flex">
                            <select id="modelo_id" name="modelo_id" 
                                    class="form-select form-control bg-dark text-light border-warning me-2">
                                <option value="">Selecione uma marca primeiro...</option>
                            </select>

                           <button type="button" class="btn"
                                    style="background-color:#d4af37; color:#2c2c2c;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalModelo"
                                    onclick="setMarcaIdNoModal()">
                                +
                            </button>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="cor_id" class="form-label">Cor</label>
                        <div class="d-flex">
                            <select id="cor_id" name="cor_id" class="form-select form-control bg-dark text-light border-warning me-2" >
                                <option value="">Selecione...</option>
                                @foreach ($cores as $cor)
                                    <option value="{{ $cor->id }}" {{ old('cor_id') == $cor->id ? 'selected' : '' }}>
                                        {{ $cor->nome }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="button" class="btn" 
                                    style="background-color:#d4af37; color:#2c2c2c;"
                                    data-bs-toggle="modal" data-bs-target="#modalCor">
                                +
                            </button>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" class="form-control bg-dark text-light border-warning" 
                               id="ano" name="ano" placeholder="2022" value="{{ old('ano') }}"  />
                    </div>

                    <div class="col-md-2">
                        <label for="quilometragem" class="form-label">Quilometragem</label>
                        <input type="number" class="form-control bg-dark text-light border-warning" 
                               id="quilometragem" name="quilometragem" placeholder="Ex: 45000" value="{{ old('quilometragem') }}"  />
                    </div>

                    <div class="col-md-2">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" 
                            class="form-control bg-dark text-light border-warning"
                            id="placa" name="placa" placeholder="ABC-1234"
                            value="{{ old('placa') }}" />
                    </div>

                </div>

                <div class="row mb-1">

                      <div class="col-md-2">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status"
                                class="form-select form-control bg-dark text-light border-warning me-2">
                            <option value="">Selecione...</option>
                            <option value="Novo" {{ old('status') == 'Novo' ? 'selected' : '' }}>Novo</option>
                            <option value="Seminovo" {{ old('status') == 'Seminovo' ? 'selected' : '' }}>Seminovo</option>
                        </select>
                    </div>
                        
                    
                    <div class="col-md-2">
                        <label for="valor" class="form-label">Valor (R$)</label>
                        <input type="text" class="form-control bg-dark text-light border-warning" 
                               id="valor" name="valor" placeholder="Ex: 95.000,00" value="{{ old('valor') }}"  />
                    </div>
                    <div class="col-md-3">
                        <label for="imagem_principal" class="form-label">Link da Imagem Principal</label>
                        <input type="url" class="form-control bg-dark text-light border-warning" 
                               id="imagem_principal" name="imagem_principal" placeholder="https://exemplo.com/imagem1.jpg"
                                value="{{ old('imagem_principal') }}" />
                    </div>
                    <div class="col-md-5">
                        <label for="outras_imagens" class="form-label">Outras Imagens (links separados por vírgula)</label>
                        <input type="url" class="form-control bg-dark text-light border-warning" 
                               id="outras_imagens" name="outras_imagens" placeholder="https://img1.com, https://img2.com, https://img3.com"
                                value="{{ old('outras_imagens') }}" />
                    </div>
                </div>

              



                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control bg-dark text-light border-warning" 
                              id="descricao" name="descricao" rows="2"
                              placeholder="Descrição detalhada do veículo...">{{ old('descricao') }}</textarea>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn px-4"
                            style="background-color: #d4af37; color: #2c2c2c; font-weight: bold; border: none;">
                        <i class="fas fa-save me-2"></i> Salvar
                    </button>
                    <a href="{{ route('carros.index') }}" class="btn ml-1 px-4 ms-2"
                       style="background-color: #2c2c2c; color: #d4af37; border: 1px solid #d4af37;">
                        <i class="fas fa-arrow-left me-2"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMarca" tabindex="-1" aria-labelledby="modalMarcaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('marcas.novo') }}">
            @csrf
            <input type="hidden" name="origem" value="carros">
            <div class="modal-content bg-dark text-light border-warning">
                <div class="modal-header border-warning">
                    <h5 class="modal-title text-warning">Nova Marca</h5>
                    <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nome_marca" class="form-label">Nome da Marca</label>
                    <input type="text" class="form-control bg-dark text-light border-warning" name="nome" id="nome_marca">
                </div>
                <div class="modal-footer border-warning">
                    <button type="submit" class="btn" style="background-color:#d4af37; color:#2c2c2c;">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalModelo" tabindex="-1" aria-labelledby="modalModeloLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('modelos.novo') }}">
            @csrf
            <input type="hidden" name="origem" value="carros">
            <input type="hidden" name="marca_id" id="marca_id_modal">
            <div class="modal-content bg-dark text-light border-warning">
                <div class="modal-header border-warning">
                    <h5 class="modal-title text-warning">Novo Modelo</h5>
                    <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nome_modelo" class="form-label">Nome do Modelo</label>
                    <input type="text" class="form-control bg-dark text-light border-warning" name="nome" id="nome_modelo">
                </div>
                <div class="modal-footer border-warning">
                    <button type="submit" class="btn" style="background-color:#d4af37; color:#2c2c2c;">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalCor" tabindex="-1" aria-labelledby="modalCorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('cores.novo') }}">
            @csrf
            <input type="hidden" name="origem" value="carros">
            <div class="modal-content bg-dark text-light border-warning">
                <div class="modal-header border-warning">
                    <h5 class="modal-title text-warning">Nova Cor</h5>
                    <button type="button" class="btn-close bg-warning" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="nome_cor" class="form-label">Nome da Cor</label>
                    <input type="text" class="form-control bg-dark text-light border-warning" name="nome" id="nome_cor">
                </div>
                <div class="modal-footer border-warning">
                    <button type="submit" class="btn" style="background-color:#d4af37; color:#2c2c2c;">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function setMarcaIdNoModal() {
        const marcaSelecionada = document.getElementById('marca_id').value;
        document.getElementById('marca_id_modal').value = marcaSelecionada;

        if (!marcaSelecionada) {
            Swal.fire({
                icon: 'warning',
                title: 'Atenção!',
                text: 'Selecione a marca do modelo antes de cadastrar.',
                confirmButtonColor: '#d4af37',
            });
        }
    }
</script>
<script>
document.getElementById('marca_id').addEventListener('change', function() {

    let marcaId = this.value;
    let selectModelos = document.getElementById('modelo_id');

    // Limpa o select
    selectModelos.innerHTML = '<option value="">Carregando...</option>';

    if (!marcaId) {
        selectModelos.innerHTML = '<option value="">Selecione uma marca primeiro...</option>';
        return;
    }

    // Faz a requisição AJAX para buscar os modelos
    fetch(`/modelos/por-marca/${marcaId}`)
        .then(response => response.json())
        .then(data => {

            selectModelos.innerHTML = '<option value="">Selecione...</option>';

            data.forEach(modelo => {
                let option = document.createElement('option');
                option.value = modelo.id;
                option.textContent = modelo.nome;
                selectModelos.appendChild(option);
            });

        })
        .catch(error => {
            console.error('Erro ao carregar modelos:', error);
            selectModelos.innerHTML = '<option value="">Erro ao carregar modelos</option>';
        });
});
</script>

@endsection
