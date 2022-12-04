<?php

namespace App\Http\Livewire\Frontend\Produto;

use Livewire\Component;

class Index extends Component
{
    public $produto, $categoria;

    public function mount($produto, $categoria)
    {
        $this->produto = $produto;
        $this->categoria = $categoria;
    }

    public function render()
    {
        return view('livewire.frontend.produto.index',[
            'produto' => $this->produto,
            'categoria' => $this->categoria,
        ]);
    }
}
