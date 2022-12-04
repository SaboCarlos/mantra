<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\configuracao;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function index()
    {
        $configuracao = configuracao::first();
        return view('admin.configuracao.index',compact('configuracao'));
    }

    public function store(Request $request)
    {
        $configuracao = configuracao::first();
        if($configuracao){
            $configuracao->update([
                'website_name'=> $request->website_name,
                'website_url'=> $request->website_url,
                'page_title'=> $request->page_title,
                'meta_keyword'=> $request->meta_keyword,
                'meta_description'=> $request->meta_description,
                'address'=> $request->address,
                'phone1' =>  $request->phone1, 
                'phone2'=> $request->phone2, 
                'email1'=> $request->email1,
                'email2'=> $request->email2,
                'facebook'=> $request->facebook,
                'twitter'=> $request->twitter,
                'instagram'=> $request->instagram,
                'youtube'=> $request->youtube,
            ]);
            return redirect()->back()->with('message','Configurações atualizadas');

        }else{
            configuracao::create([
                'website_name'=> $request->website_name,
                'website_url'=> $request->website_url,
                'page_title'=> $request->page_title,
                'meta_keyword'=> $request->meta_keyword,
                'meta_description'=> $request->meta_description,
                'address'=> $request->address,
                'phone1' =>  $request->phone1, 
                'phone2'=> $request->phone2, 
                'email1'=> $request->email1,
                'email2'=> $request->email2,
                'facebook'=> $request->facebook,
                'twitter'=> $request->twitter,
                'instagram'=> $request->instagram,
                'youtube'=> $request->youtube,
            ]);

            return redirect()->back()->with('message','Configurações criadas');
        }
    }
}
