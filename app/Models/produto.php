<?php

namespace App\Models;

use App\Models\produtoImagem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $fillable =[
        'categoria_id',
        'nome',
        'pequena_discricao',
        'discricao',
        'localizacao',
        'preco',
        'quartos',
        'numero',
        'casaBanho',
        'estado',
        'destaque',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function produtoImages(){
        return $this->hasMany(produtoImagem::class, 'produto_id','id');
    }
}
