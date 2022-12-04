<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imobiliario extends Model
{
    use HasFactory;
    protected $table = 'imobiliario';

    protected $fillable =[
       
        'nome',
        'pequena_discricao',
        'discricao',
        'localizacao',
        'preco',
        'estado',
    ];

   

    public function imobiliarioImages(){
        return $this->hasMany(imobiliarioImagem::class, 'imobiliario_id','id');
    }
}
