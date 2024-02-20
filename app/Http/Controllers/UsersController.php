<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //CRUD COMPLETO
    //Consultar todos los usuarios  (es un select * from usuarios) (el paginate hace algo parecido, pero indica la página con url)
    public function index(){
        return User::paginate();
    }

    //Consultar un usuario
    public function show($id){
        return User::find($id);
    }

    //Crear un usuarion (se envia el nombre, contraseña y el rol) 
    public function store(Request $request){
        return User::create($request->all());
    }

     //Actualizar un usuario
     public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
        return $user;
    }

     //Eliminar un usuario
     public function destroy(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
