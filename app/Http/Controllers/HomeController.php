<?php

namespace App\Http\Controllers;

use App\Models\produto;
use App\Models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = slider::where('estado','0')->get();
        $novaImobiliario = produto::latest()->take(16)->get();
        $destaqueProduto = produto::where('destaque','0')->latest()->take(8)->get();
        return view('frontend.index', compact('sliders','destaqueProduto','novaImobiliario'));
    }
}
