<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseAdminController;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Carro;

class MarcaController extends BaseAdminController
{
    public function marcas(){
        $marcas = Marca::all();
        return view('menuadmin.marcas.index', compact('marcas'));
    }

    public function salvarMarcas(Request $request){

        $validador = $request->validate(
            [
                'nome' => 'required|min:3|unique:marcas,nome',
            ],
            [
                'nome.required' => "O campo nome é obrigatório",
                'nome.min' => "O campo nome precisa ter no mínimo 3 caracteres",
                'nome.unique' => "Marca já cadastrada no sistema",
            ]
        );

        $marcas = new Marca();
        $marcas->fill($request->all());
        $marcas->save();

        if ($request->input('origem') === 'carros') {
            return back()->with('success', 'Marca cadastrada com sucesso!');
        }

        return redirect()->route('marcas.index')->with('success', 'Marca cadastrada com sucesso!');
    }

    public function buscarMarcas($id){
        $marcas = Marca::find($id);

        if(!$marcas)
            echo "Marca não encontrada";

        return view('menuadmin.marcas.alterar', compact('marcas'));

    }

    public function alterarMarcas(Request $request){

        $validador = $request->validate(
            [
                'nome' => 'required|min:3|unique:marcas,nome',
            ],
            [
                'nome.required' => "O campo nome é obrigatório",
                'nome.min' => "O campo nome precisa ter no mínimo 3 caracteres",
                'nome.unique' => "Marca já cadastrada no sistema, por favor selecione voltar",
            ]
        );

        $marcas = Marca::find($request->input('id'));
        $marcas->update($request->all());

        return redirect()->route('marcas.index')->with('success', 'Marca alterada com sucesso!');
    }

    public function excluirMarcas($id){
        $marcas = Marca::findOrFail($id);

        $modelos = Modelo::where('marca_id', $id)->count();
        $carros = Carro::where('marca_id', $id)->count();

        if ($modelos > 0 && $carros > 0) {
            return redirect()->back()->with(
                'error',
                'Não é possível excluir esta marca, pois existem modelos e veículos vinculados a ela.'
            );
        }

        if ($modelos > 0) {
            return redirect()->back()->with('error', 'Não é possível excluir esta marca, pois existem modelos vinculados a ela.');
        }

        if ($carros > 0) {
            return redirect()->back()->with('error', 'Não é possível excluir esta marca, pois existem carros cadastrados com ela.');
        }

        $marcas->delete();

        return redirect()->route('marcas.index')->with('success', 'Marca excluída com sucesso!');
    }
}
