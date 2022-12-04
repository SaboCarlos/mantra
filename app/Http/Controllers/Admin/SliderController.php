<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    public function criar()
    {
        return view('admin.slider.criar');
    }

    public function store(SliderFormRequest $request)
    {
        $validateData = $request->validated();

        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->move('uploads/slider/',$filename);
            $validateData['imagem'] = "uploads/slider/$filename";
        }

        $validateData['estado'] = $request->estado == true ? '1':'0';

        slider::create([
            'titulo' =>$validateData['titulo'],
            'discricao' =>$validateData['discricao'],
            'imagem' =>$validateData['imagem'],
            'estado' =>$validateData['estado'],
        ]);

        return redirect('admin/sliders')->with('message','Slider adicionado com sucesso');
    }

    public function edit(slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, slider $slider )
    {
        $validateData = $request->validated();

        if ($request->hasFile('imagem')) {

            $destination = $slider->imagem;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('imagem');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'. $ext;
            $file->move('uploads/slider/',$filename);
            $validateData['imagem'] = "uploads/slider/$filename";
        }

        $validateData['estado'] = $request->estado == true ? '1':'0';

        slider::where('id',$slider->id)->update([
            'titulo' =>$validateData['titulo'],
            'discricao' =>$validateData['discricao'],
            'imagem' =>$validateData['imagem'] ?? $slider->imagem,
            'estado' =>$validateData['estado'],
        ]);

        return redirect('admin/sliders')->with('message','Slider atualizado com sucesso');
    }


    public function destroy(slider $slider)
    {
        if ($slider->count()>0) {
            $destination = $slider->imagem;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete(); 
            return redirect('admin/sliders')->with('message','Slider Eliminado com sucesso'); 
        }
        return redirect('admin/sliders')->with('message','Alguma coisa correu mal'); 
       
    }
}
