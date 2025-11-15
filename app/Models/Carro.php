<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;
    protected $table = 'carros';

    protected $fillable = ['marca_id', 'modelo_id', 'cor_id', 'ano', 'status', 'placa', 'quilometragem', 'valor', 'descricao', 'imagem_principal', 'outras_imagens'];

    public function marca(){
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }

    public function cor(){
        return $this->belongsTo(Cor::class, 'cor_id');
    }

}
