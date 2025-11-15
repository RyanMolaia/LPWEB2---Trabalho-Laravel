<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class SiteController extends Controller
{
    public function index(Request $request) {

        $busca = $request->q;

        $carros = Carro::with(['marca', 'modelo', 'cor'])
        ->when($busca, function ($query) use ($busca) {
            $query->whereHas('modelo', function ($q) use ($busca) {
                $q->where('nome', 'LIKE', "%{$busca}%");
            })
            ->orWhereHas('marca', function ($q) use ($busca) {
                $q->where('nome', 'LIKE', "%{$busca}%");
            })
            ->orWhereHas('cor', function ($q) use ($busca) {
                $q->where('nome', 'LIKE', "%{$busca}%");
            });
        })
        ->get();

        return view('site.index', compact('carros', 'busca'));
    }

    public function detalhesCarros($id){

        $carros = Carro::with(['marca', 'modelo', 'cor'])->findOrFail($id);

        $raw = $carros->outras_imagens ?? '';

        $raw = $carros->outras_imagens ?? '';
        $raw = trim($raw, '"');
        $raw = str_replace('\\', '', $raw);
        $links = explode(',', $raw);

        $galeria = collect($links)
            ->map(fn($img) => trim($img))
            ->filter(fn($img) => preg_match('/^https?:\/\//i', $img))
            ->values()
            ->toArray();

        $main = $carros->imagem_principal ?? '';
        $main = trim($main, '"');
        $main = str_replace('\\', '', $main);

        return view('site.carro.detalhes', ['carros' => $carros,'galeria' => $galeria,'imagem_principal' => $main]);
    }

    public function exibirNovos(Request $request) {
         $busca = $request->q;

        $carros = Carro::with(['marca', 'modelo', 'cor'])
            ->where('status', 'novo')
            ->when($busca, function ($query) use ($busca) {
                $query->where(function ($q) use ($busca) {
                    $q->whereHas('modelo', fn($m) => $m->where('nome', 'LIKE', "%{$busca}%"))
                    ->orWhereHas('marca', fn($m) => $m->where('nome', 'LIKE', "%{$busca}%"))
                    ->orWhereHas('cor', fn($m) => $m->where('nome', 'LIKE', "%{$busca}%"));
                });
            })
            ->get();

        return view('site.novos', compact('carros', 'busca'));
    }

    public function exibirSeminovos(Request $request) {
        $busca = $request->q;

        $carros = Carro::with(['marca', 'modelo', 'cor'])
            ->where('status', 'seminovo')
            ->when($busca, function ($query) use ($busca) {
                $query->where(function ($q) use ($busca) {
                    $q->whereHas('modelo', fn($m) => $m->where('nome', 'LIKE', "%{$busca}%"))
                    ->orWhereHas('marca', fn($m) => $m->where('nome', 'LIKE', "%{$busca}%"))
                    ->orWhereHas('cor', fn($m) => $m->where('nome', 'LIKE', "%{$busca}%"));
                });
            })
            ->get();

        return view('site.seminovos', compact('carros', 'busca'));
    }
}
