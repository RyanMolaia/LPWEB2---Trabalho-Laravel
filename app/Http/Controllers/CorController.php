<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseAdminController;
use Illuminate\Http\Request;
use App\Models\Cor;

class CorController extends BaseAdminController
{
    
    public function cores(){
        $cores = cor::all();
        return view('menuadmin.cores.index', compact('cores'));
    }

    public function salvarCores(Request $request){

        $validador = $request->validate(
            [
                'nome' => 'required|min:3|unique:cores,nome',
            ],
            [
                'nome.required' => "O campo nome é obrigatório",
                'nome.min' => "O campo nome precisa ter no mínimo 3 caracteres",
                'nome.unique' => "Cor já cadastrada no sistema",
            ]
        );

        $cores = new Cor();
        $cores->nome = $request->nome;
        $cores->save();

        if ($request->input('origem') === 'carros') {
            return back()->with('success', 'Cor cadastrada com sucesso!')->withInput();
        }

        return redirect()->route('cores.index')->with('success', 'Cor cadastrada com sucesso!');
        }

    public function buscarCores($id){
        $cores = Cor::find($id);

        if(!$cores)
            echo "Cor não encontrada";

        return view('menuadmin.cores.alterar', compact('cores'));

    }

    public function alterarCores(Request $request){

        $validador = $request->validate(
            [
                'nome' => 'required|min:3|unique:cores,nome',
            ],
            [
                'nome.required' => "O campo nome é obrigatório",
                'nome.min' => "O campo nome precisa ter no mínimo 3 caracteres",
                'nome.unique' => "Cor já cadastrada no sistema, por favor selecione voltar",
            ]
        );

        $cor = Cor::find($request->id);
        $cor->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('cores.index')->with('success', 'Cor alterada com sucesso!');
    }

    public function excluirCores($id){
       $carrosComCor = \App\Models\Carro::where('cor_id', $id)->exists();

        if ($carrosComCor) {
            return redirect()->route('cores.index')
                ->with('error', 'Não é possível excluir esta cor, pois há veículos cadastrados utilizando ela.');
        }

        Cor::find($id)->delete();

        return redirect()->route('cores.index')
            ->with('success', 'Cor excluída com sucesso!');
    }
}
