<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\produto;
use App\Models\slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = slider::where('estado','0')->get();
        $novaImobiliario = produto::latest()->take(16)->get();
        $destaqueProduto = produto::where('destaque','0')->latest()->take(8)->get();
        return view('frontend.index', compact('sliders','destaqueProduto','novaImobiliario'));
    }

    public function categoria()
    {
        $categoria = Categoria::where('estado','0')->get();
        $novaImobiliario = produto::latest()->take(16)->get();
        return view('frontend.colecao.categorias.index', compact('categoria','novaImobiliario'));
    }

    public function produto($categoria_nome)
    {
       $categoria = Categoria::where('nome',$categoria_nome)->first();
       $novaImobiliario = produto::latest()->take(16)->get();
       if($categoria){
            $produto = $categoria->produto()->get();
            return view('frontend.colecao.produtos.index', compact('produto','categoria','novaImobiliario'));
       }else{
        return redirect()-back();
       }
    }

    public function produtoView(string $categoria_nome, string $produto_nome)
    {
        $categoria = Categoria::where('nome',$categoria_nome)->first();
        $novaImobiliario = produto::latest()->take(16)->get();
        if($categoria){

             $produto = $categoria->produto()->where('nome',$produto_nome)->where('estado','0')->first();
             if($produto){
                return view('frontend.colecao.produtos.view', compact('produto','categoria','novaImobiliario'));
             }else{
                return redirect()-back();
             }
 
        }else{
         return redirect()-back();
        } 
    }

    public function novidade()
    {
        $sliders = slider::where('estado','0')->get();
        $categoria = Categoria::where('estado','0')->get();
        $novaImobiliario = produto::latest()->paginate(16);
        return view('frontend.pages.novidade', compact('sliders','novaImobiliario','categoria'));
        
    }


    public function sobre()
    {
        $sliders = slider::where('estado','0')->get();
        $novaImobiliario = produto::latest()->take(16)->get();
        return view('frontend.pages.sobre', compact('sliders','novaImobiliario'));
    }

    public function searchProduto(Request $request)
    {
        if($request->search){
            $sliders = slider::where('estado','0')->get();
            $searchProduto = produto::where('nome','LIKE','%'.$request->search.'%')->latest()->paginate(6);
            $searchproduto = produto::where('localizacao','LIKE','%'.$request->search.'%')->latest()->paginate(6);
            $novaImobiliario = produto::latest()->take(16)->get();
            return view('frontend.pages.search',compact('sliders','searchProduto','searchproduto','novaImobiliario'));
        }else{
            return redirect()->back()->with('message','Não Encontrado');
        }
    }




}
