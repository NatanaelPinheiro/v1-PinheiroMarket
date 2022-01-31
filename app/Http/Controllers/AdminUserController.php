<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function users(){
        $users = User::all();
        return view('admin.dashboard.users', [
            'users' => $users,
        ]);
    }

    public function destroy($id){ 
        $user = User::findOrFail($id);
        $user->products()->detach();
        $user->delete();
        return redirect('/admin/dashboard/users')->with('msg', 'Usuário deletado com sucesso!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.editUser', ['user' => $user]);
    }

    public function update($id){
        $user = User::findOrFail($id);

        if($user->getPermissionNames()[0] == 'user'){
            $user->givePermissionTo('admin');
            $user->revokePermissionTo('user');
        }else{
            $user->revokePermissionTo('admin');
            $user->givePermissionTo('user');
        }

        return redirect('/admin/dashboard/users')->with('msg', 'User editado com sucesso!');
    }
}
