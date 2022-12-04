<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaFromRequest;
use App\Models\Categoria;
use Illuminate\Support\Facades\File;

class CategoriaController extends Controller
{
    public function index(){
        return view('admin.categoria.index');
    }
    public function criar(){
        return view('admin.categoria.criar');
    }
    public function store(CategoriaFromRequest $request){

        $validatedData = $request->validated();
    
        $categoria = new Categoria;
        $categoria->nome = $validatedData['nome'];
        $categoria->discricao = $validatedData['discricao'];

        $uploadPath ='uploads/categoria/';
        if($request->hasfile('imagem')){
            $file = $request->file('imagem');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
    
            $file->move('uploads/categoria/',$filename);
            $categoria->imagem = $uploadPath.$filename;
    
        }
        
        $categoria->estado = $request->estado ==true ? '1':'0';
        $categoria->save();
    
        return redirect('admin/categoria')->with('message','Categoria adicionada com sucesso');
    }

    public function edit(Categoria $categoria){
	
        return view('admin.categoria.edit', compact('categoria'));
    }

    public function update(CategoriaFromRequest $request, $categoria){

        $validatedData = $request->validated();
        
        $categoria = Categoria::findOrFail($categoria);
    
        $categoria->nome = $validatedData['nome'];
        $categoria->discricao = $validatedData['discricao'];
    
        if($request->hasfile('imagem')){
            
            $uploadPath ='uploads/categoria/';

            $path =''.'uploads/categoria/'.$categoria->imagem;
            if(File::exists($path)){
               File::delete($path);
            }
            $file = $request->file('imagem');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
    
            $file->move('uploads/categoria/',$filename);
            $categoria->imagem = $uploadPath.$filename;
    
        }
        
        $categoria->estado = $request->estado ==true ? '1':'0';
        $categoria->update();
    
        return redirect('admin/categoria')->with('message','Categoria atualizada com sucesso');
    
    
    }
}
