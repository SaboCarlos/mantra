<?php

namespace App\Http\Livewire\Admin\Categoria;

use App\Models\Categoria;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categoria_id;

    public function deleteCategoria($categoria_id){
      
        $this->categoria_id = $categoria_id;
    }

    public function destroyCategoria(){
        $categoria = Categoria::find($this->categoria_id);
        $path = 'uploads/categoria/'.$categoria->imagem;
        if(File::exists($path)){
            File::delete($path);
        }
        $categoria->delete();
        session()->flash('message','Categoria Eliminada');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categoria = Categoria::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.categoria.index',['categoria' => $categoria]);
    }
}
