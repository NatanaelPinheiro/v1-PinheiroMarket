<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(){
        $user = auth()->user();
        return view('/user/profile', ['user' => $user]);
    }

    public function update(Request $request){
        $user = auth()->user();
        $data = $request->all();
        $request->validate([
            'name' => 'string|min:10',
            'email' => 'email',
        ]);
        $user->update($data);
        return redirect('/user/profile')->with('msg', 'Perfil editado com sucesso!');
    }

    public function destroy(){
        $user = auth()->user();
        $user->products()->detach();
        $user->delete();
        return redirect('/register')->with('msg', 'Perfil deletado com sucesso!');
    }
}
