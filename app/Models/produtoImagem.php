<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtoImagem extends Model
{
    use HasFactory;

    protected $table = 'produto_imagem';

    protected $fillable =[
        'Produto_id',
        'imagem',
    ];
}
