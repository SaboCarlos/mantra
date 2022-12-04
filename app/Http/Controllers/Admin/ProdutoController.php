<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoFromRequest;
use App\Models\produto;
use App\Models\produtoImagem;
use Illuminate\Support\Facades\File;

class ProdutoController extends Controller
{
    public function index(){
        $produto = produto::all();
        return view('admin.produto.index', compact('produto'));
    }

    public function criar(){
        $categoria = Categoria::all(); 
        return view('admin.produto.criar',compact('categoria'));
    }

    public function store(ProdutoFromRequest $request){
        $validatedData = $request->validated();
    
        $categoria = Categoria::findOrFail($validatedData['categoria_id']);
        $produto = $categoria->produto()->create([
            'categoria_id' => $validatedData['categoria_id'],
            'nome' => $validatedData['nome'],
            'pequena_discricao' => $validatedData['pequena_discricao'],
            'discricao' => $validatedData['discricao'],
            'localizacao' => $validatedData['localizacao'],
            'preco' => $validatedData['preco'],
            'quartos' => $validatedData['quartos'],
            'numero' => $validatedData['numero'],
            'casaBanho' => $validatedData['casaBanho'],
            'estado' => $request->estado ==true ? '1':'0',
            'destaque' => $request->destaque ==true ? '0':'1',
        ]);
    
        if($request->hasfile('imagem')){
            $uploadPath ='uploads/produto/';
    
            $i = 1;
            foreach($request->file('imagem') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;
    
                $produto->produtoImages()->create([
                    'produto_id'=>$produto->id,
                    'imagem'=>$finalImagePathName,
                ]);
    
            }
            
        }
        return redirect('/admin/produto')->with('message','Produto adicionado com sucesso');
        
    }

    public function edit(int $produto_id){
        $categoria = Categoria::all(); 
        $produto = produto::findOrFail($produto_id);
        return view('admin.produto.edit',compact('categoria','produto'));
    }

    public function update(ProdutoFromRequest $request, int $produto_id){
       
        $validatedData = $request->validated();
        $produto = Categoria::findOrFail($validatedData['categoria_id'])
                            ->produto()->where('id',$produto_id)->first();
        if($produto){
            $produto->update([
                'categoria_id' => $validatedData['categoria_id'],
                'nome' => $validatedData['nome'],
                'pequena_discricao' => $validatedData['pequena_discricao'],
                'discricao' => $validatedData['discricao'],
                'localizacao' => $validatedData['localizacao'],
                'preco' => $validatedData['preco'],
                'quartos' => $validatedData['quartos'],
                'numero' => $validatedData['numero'],
                'casaBanho' => $validatedData['casaBanho'],
                'estado' => $request->estado ==true ? '1':'0',
                'destaque' => $request->destaque ==true ? '0':'1',
            ]);

            if($request->hasfile('imagem')){
                $uploadPath ='uploads/produto/';
        
                $i = 1;
                foreach($request->file('imagem') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
        
                    $produto->produtoImages()->create([
                        'produto_id'=>$produto->id,
                        'imagem'=>$finalImagePathName,
                    ]);
        
                }
                
            }
            return redirect('/admin/produto')->with('message','Produto atualizado com sucesso');
        }
        else{
            return redirect('admin/produto')-> with('message','Produto nao encontrado');
        }
    }
    
    public function destroyImagem(int $produto_imagem_id)
    {
        $produtoImagem = produtoImagem::findOrFail($produto_imagem_id);
        if (File::exists($produtoImagem->imagem)) {
            File::delete($produtoImagem->imagem);
        }
        $produtoImagem->delete();
        return redirect()->back()->with('message','Imagem eliminada');
    }

    public function destroy(int $produto_id)
    {
        $produto = produto::findOrFail($produto_id);
        if ($produto->produtoImages) {
            foreach($produto->produtoImages as $imagem){
                if(File::exists($imagem->imagem)){
                    File::delete($imagem->imagem);
                }
            }
        }
        $produto->delete();
        return redirect()->back()->with('message','Produto eliminado');

    }
}
