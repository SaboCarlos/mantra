<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\produto;
use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class DashboardController extends Controller
{
    public function index()
    {   
        $totalProduto = produto::count();
        $totalCategoria = Categoria::count();
        $totalAllUsers = User::count();

        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        return view('admin.dashboard', compact('totalProduto','totalCategoria','totalAllUsers','totalUser','totalAdmin'));
    }
}
