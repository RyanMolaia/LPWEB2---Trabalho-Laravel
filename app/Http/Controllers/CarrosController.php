<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseAdminController;
use Illuminate\Http\Request;
use App\Models\Carro;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Modelo;

class CarrosController extends BaseAdminController
{

    public function carros(){
        $carros = Carro::with(['marca', 'modelo', 'cor'])->get();
        return view('menuadmin.carros.index', compact('carros'));
    }

    public function cadastrarCarros(){
        
        $marcas  = Marca::orderBy('nome')->get();
        $modelos = Modelo::orderBy('nome')->get();
        $cores   = Cor::orderBy('nome')->get();

        return view('menuadmin.carros.cadastrar', compact('marcas', 'modelos', 'cores'));
    }

    public function salvarCarros(Request $request){
        
        $validador = $request->validate(
            [
                'marca_id' => ['required', 'exists:marcas,id'],
                'modelo_id' => ['required', 'exists:modelos,id'],
                'cor_id' => ['required', 'exists:cores,id'],
                'ano' => ['required', 'digits:4', 'integer', 'max:' . date('Y')],
                'placa' => ['required','unique:carros,placa'],
                'status' => ['required', 'string'],
                'quilometragem' => ['required', 'numeric', 'min:0'],
                'valor' => ['required', 'numeric', 'min:0'],
                'descricao' => ['required', 'string', 'max:1000'],
                'imagem_principal' => ['required', 'url', 'max:1000'],
                'outras_imagens' => ['required', 'min:2', 'string'],
            ],
            [
                            
                'marca_id.required' => 'Selecione a marca do veículo.',
                'marca_id.exists' => 'A marca selecionada não é válida.',
                'modelo_id.required' => 'Selecione o modelo do veículo.',
                'modelo_id.exists' => 'O modelo selecionado não é válido.',
                'cor_id.required' => 'Selecione a cor do veículo.',
                'cor_id.exists' => 'A cor selecionada não é válida.',

                'ano.required' => 'Informe o ano do veículo.',
                'ano.digits' => 'O ano deve ter exatamente 4 dígitos.',
                'ano.integer' => 'O ano informado é inválido.',
                'ano.max' => 'O ano não pode ser maior que o atual.',
                'placa.required' => 'Informe a placa do veículo.',
                'placa.unique' => 'Placa já cadastrada no sistema.',
                'status.required' => 'Informe o status do veículo.',
                'quilometragem.required' => 'Informe a quilometragem do veículo.',
                'quilometragem.numeric' => 'A quilometragem deve ser um número.',
                'valor.required' => 'Informe o valor do veículo.',
                'valor.numeric' => 'O valor deve ser um número.',

                'descricao.required' => 'Informe a descrição do veículo.',
                'descricao.max' => 'A descrição pode conter no máximo 1000 caracteres.',

                'imagem_principal.required' => 'Informe o link da imagem principal.',
                'imagem_principal.url' => 'O link da imagem principal deve ser uma URL válida.',
                'outras_imagens.required' => 'Informe o link das imagens adicionais.',
                'outras_imagens.min' => 'É necessário enviar pelo menos duas imagens adicionais.',
                'outras_imagens.string' => 'As imagens adicionais devem ser fornecidas como texto.',

            ]
            );

            $dados = $request->all();
            $dados['outras_imagens'] = $request->outras_imagens;

            $carros = new Carro();
            $carros->fill($dados);
            $carros->save();

            return redirect()->route('carros.index')->with('success', 'Veiculo cadastradado com sucesso!');
    }

    public function editarCarros($id)
        {

            
            $carros = Carro::findOrFail($id);
            $marcas = Marca::all();
            $modelos = Modelo::all();
            $cores = Cor::all();

            return view('menuadmin.carros.alterar', compact('carros', 'marcas', 'modelos', 'cores'));
        }

    public function alterarCarros(Request $request, $isUpdate = false){

        $carros = Carro::find($request->input('id'));

        $validador = $request->validate(
            [
                'marca_id' => ['required', 'exists:marcas,id'],
                'modelo_id' => ['required', 'exists:modelos,id'],
                'cor_id' => ['required', 'exists:cores,id'],
                'ano' => ['required', 'digits:4', 'integer', 'max:' . date('Y')],
                'placa' => ['required'],
                'status' => ['required', 'string'],
                'quilometragem' => ['required', 'numeric', 'min:0'],
                'valor' => ['required', 'numeric', 'min:0'],
                'descricao' => ['required', 'string', 'max:1000'],
                'imagem_principal' => ['required', 'url', 'max:1000'],
                'outras_imagens' => ['required', 'min:2', 'string'],
            ],
            [
                            
                'marca_id.required' => 'Selecione a marca do veículo.',
                'marca_id.exists' => 'A marca selecionada não é válida.',
                'modelo_id.required' => 'Selecione o modelo do veículo.',
                'modelo_id.exists' => 'O modelo selecionado não é válido.',
                'cor_id.required' => 'Selecione a cor do veículo.',
                'cor_id.exists' => 'A cor selecionada não é válida.',

                'ano.required' => 'Informe o ano do veículo.',
                'ano.digits' => 'O ano deve ter exatamente 4 dígitos.',
                'ano.integer' => 'O ano informado é inválido.',
                'ano.max' => 'O ano não pode ser maior que o atual.',
                'placa.required' => 'Informe a placa do veículo.',
                'status.required' => 'Informe o status do veículo.',
                'quilometragem.required' => 'Informe a quilometragem do veículo.',
                'quilometragem.numeric' => 'A quilometragem deve ser um número.',
                'valor.required' => 'Informe o valor do veículo.',
                'valor.numeric' => 'O valor deve ser um número.',

                'descricao.required' => 'Informe a descrição do veículo.',
                'descricao.max' => 'A descrição pode conter no máximo 1000 caracteres.',

                'imagem_principal.required' => 'Informe o link da imagem principal.',
                'imagem_principal.url' => 'O link da imagem principal deve ser uma URL válida.',
                'outras_imagens.required' => 'Informe o link das imagens adicionais.',
                'outras_imagens.min' => 'É necessário enviar pelo menos duas imagens adicionais.',
                'outras_imagens.string' => 'As imagens adicionais devem ser fornecidas como texto.',
            ]
            );

            $dados  = $request->all();
            $dados['outras_imagens'] = $request->outras_imagens;
            $carros->update($dados );

            return redirect()
                    ->route('carros.index')
                    ->with('success', 'Veículo atualizado com sucesso!');
    }

    public function buscarCarros($id){
        $carros = Carro::find($id);

        if(!$carros)
            return redirect()->route('carros.index')->with('error', 'Veículo não encontrado.');

        return view('menuadmin.carros.alterar', compact('carros'));
    }
    
    public function excluirCarros($id){
        $carro = Carro::findOrFail($id);

        $carro->delete();

        return redirect()
            ->route('carros.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }


}
