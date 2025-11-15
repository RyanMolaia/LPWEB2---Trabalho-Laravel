<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseAdminController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Modelo;
use App\Models\Marca;

class ModeloController extends BaseAdminController
{
      public function modelos(){
        $modelos = Modelo::all();
        return view('menuadmin.modelos.index', compact('modelos'));
    }

    public function cadastrarModelos(){
        
        $marcas  = Marca::orderBy('nome')->get();

        return view('menuadmin.modelos.cadastrar', compact('marcas'));
    }


    public function salvarModelos(Request $request){

        $validador = $request->validate(
            [
                'nome' => ['required','min:3','unique:modelos,nome,NULL,id,marca_id,' . $request->marca_id],
                'marca_id' => ['required','exists:marcas,id'],
            ],
            [
                'nome.required' => "O campo nome é obrigatório",
                'nome.min' => "O campo nome precisa ter no mínimo 3 caracteres",
                'nome.unique' => "Este modelo já está cadastrado para essa marca",
                'marca_id.required' => 'Selecione a marca do modelo antes de cadastrar',
                'marca_id.exists' => 'A marca selecionada não é válida',

            ]
        );

        $modelos = new Modelo();
        $modelos->fill($request->all());
        $modelos->save();

        
        if ($request->input('origem') === 'carros') {
            return back()->with('success', 'Modelo cadastrado com sucesso!');
        }

        return redirect()->route('modelos.index')->with('success', 'Modelo cadastrado com sucesso!');
    }


    public function editarModelos($id)
        {

            
            $modelos = Modelo::findOrFail($id);
            $marcas = Marca::all();

            return view('menuadmin.modelos.alterar', compact('modelos', 'marcas'));
        }

    public function alterarModelos(Request $request){

        $validador = $request->validate(
            [
                'nome' => ['required','min:3',
                    Rule::unique('modelos')
                    ->where('marca_id', $request->marca_id)
                    ->ignore($request->input('id'))],
                'marca_id' => 'required|exists:marcas,id',
        ], [
            'nome.required' => "O campo nome é obrigatório",
            'nome.min' => "O campo nome precisa ter no mínimo 3 caracteres",
            'nome.unique' => "Este modelo já está cadastrado para esta marca",
            'marca_id.required' => 'Selecione uma marca válida',
        ]);

        $modelos = Modelo::find($request->id);
 
        $modelos->update($request->only(['nome', 'marca_id']));

        return redirect()
            ->route('modelos.index')
            ->with('success', 'Modelo alterado com sucesso!');
    }

    public function excluirModelos($id){
        $carrosComModelo = \App\Models\Carro::where('modelo_id', $id)->exists();

        if ($carrosComModelo) {
            return redirect()->route('modelos.index')
                ->with('error', 'Não é possível excluir este modelo, pois há veículos cadastrados utilizando ele.');
        }

        Modelo::find($id)->delete();

        return redirect()->route('modelos.index')
            ->with('success', 'Modelo excluído com sucesso!');
    }

    public function modelosPorMarca($marcaId)
    {
        return response()->json(
            \App\Models\Modelo::where('marca_id', $marcaId)->get()
        );
    }

}
