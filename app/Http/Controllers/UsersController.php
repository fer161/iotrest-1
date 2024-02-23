<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //CRUD COMPLETO
    //Consultar todos los usuarios  (es un select * from usuarios) (el paginate hace algo parecido, pero indica la página con url)
    public function index()
    {
        return User::paginate();
    }

    //Consultar un usuario
    public function show($id)
    {
        return User::find($id);
    }

    //Crear un usuarion (se envia el nombre, contraseña y el rol) 
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',  //le agregamos reglas o las validaciones (para que los datos de usuario sean obligatorios)
            'password' => 'required',
            'rol' => 'required',
        ]);  //si quieremos agregarle los mensajes personalizados le agregamos otros corchetes con la misma estructura de arriba solo que reemplazando el texto a la derecha de la flecha //pero los mensajes personalizados los realizaremos desde la app
        $user = new User; //realizamos lo siguiente para ocultar la contraseña de consultas //esto es solo necesario en los usuarios
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }

    //Actualizar un usuario
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'filled|unique:users', //es para validar que ya existe un usuario con el mismo nombre//filled es opcional si hay cambio lo hace si no pues no pasa nada 
        ]);
        $user = User::find($id);  //busca el usuario y guarda el usuario con los cambios.
        if (!$user) return response('', 404); //si no hay usuario termina la función. envia un codigo de respuesta http//pues no existe el usuario a actualizar
        $user->update($request->all());
        if ($request->password) $user->password = Hash::make($request->password); //si en este request viene el password entonces la encripta y la guarda en el usuario 
        $user->save();
        return $user;
    }

    //Eliminar un usuario
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) return response('', 404); //si no hay usuario termina la funcion //pues no hay nada que eliminar
        $user->delete();
        return $user;
    }
}
