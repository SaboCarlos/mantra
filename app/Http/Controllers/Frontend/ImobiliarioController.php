<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ImobiliarioFromRequest;
use App\Models\imobiliario;
use App\Models\imobiliarioImagem ;
use App\Models\produto;
use Illuminate\Support\Facades\File;

class ImobiliarioController extends Controller
{
    public function index()
    {
        $novaImobiliario = produto::latest()->take(16)->get();
        return view('frontend.imobiliario.index',compact('novaImobiliario'));
    }

    public function create()
    {
        $categoria = Categoria::all();
        $novaImobiliario = produto::latest()->take(16)->get();
        return view('frontend.imobiliario.criar',compact('categoria','novaImobiliario'));

    }

    public function guardar(ImobiliarioFromRequest $request)
    {

        $validatedData = $request->validated();

        $imobiliario = new imobiliario;
        $imobiliario -> nome = $validatedData['nome'];
        $imobiliario -> p_discricao = $validatedData['p_discricao'];
        $imobiliario -> disc = $validatedData['disc'];
        $imobiliario -> local = $validatedData['local'];
        $imobiliario -> montante = $validatedData['montante'];
        $imobiliario ->estado = $request->estado ==true ? '1':'0'; 
              
        ;
       
         if($request->hasfile('image')){
            $uploadPath ='uploads/imobiliario/';
    
            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;
    
                $imobiliario->imobiliarioImages()->create([
                    'imobiliario_id'=>$imobiliario->id,
                    'image'=>$finalImagePathName,
                ]);
    
            }
            
        }
        return redirect('/imobiliario')->with('message','Produto adicionado com sucesso');
    
    }
    
}
