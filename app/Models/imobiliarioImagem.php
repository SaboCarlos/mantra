<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imobiliarioImagem extends Model
{
    use HasFactory;

    
    protected $table = 'imobiliario_imagem';

    protected $fillable =[
        'imobiliario_id',
        'image',
    ];
}
