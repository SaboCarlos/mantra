<?php

namespace App\Models;

use App\Models\produto;
use App\Models\imobiliario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $fillable =[
        'nome',
        'discricao',
        'imagem',
        'estado',
    ];
    public function produto(){
        return $this->hasMany(produto::class, 'categoria_id','id');
    }
    public function imobiliario(){
        return $this->hasMany(imobiliario::class, 'categoria_id','id');
    }
}
