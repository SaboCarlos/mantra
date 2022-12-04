<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.user.perfil');
    }

    public function updateUserDetails(Request $request)
    {

        $request->validate([
            'username' => ['required','string'],
            'phone' => ['required','digits:9'],
            'pin_code' => ['required','digits:4'],
            'adress' => ['required','string','max:200'],
            
            
        ]);

       $user = User::findOrFail(Auth::user()->id);
       $user->update([
            'name' => $request->username
       ]);

       $user->userDetail()->updateOrCreate(
        [
            'user_id' => $user->id,
        ],
        [
            'phone' =>$request->phone,
            'pin_code' =>$request->pin_code,
            'adress' =>$request->adress,
        ]

       );

       return redirect()->back()->with('message','perfil do usuario atualizado');
    }
}
