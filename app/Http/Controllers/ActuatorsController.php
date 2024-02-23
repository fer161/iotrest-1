<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actuator;

class ActuatorsController extends Controller
{
     //CRUD COMPLETO
    public function index()
    {
        return Actuator::paginate();
    }

    //Consultar un actuator
    public function show($id)
    {
        return Actuator::find($id);
    }

    //Crear un actuator
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:actuators', 
            'type' => 'required',
            'value' => 'required',  
            // 'date' => 'required',
            //'user_id' => 'required',
        ]);  
        $actuator = new Actuator;
        $actuator->fill($request->all());
        $actuator->user_id = 1; 
        $actuator->date = date('Y-m-d H:i:s'); //toma estos datos
        $actuator->save();
        return $actuator;
    }

    //Actualizar 
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'filled|unique:actuators',
        ]);
        $actuator = Actuator::find($id);  
        if (!$actuator) return response('', 404); 
        $actuator->update($request->all());
        $actuator->save();
        return $actuator;
    }

    //Eliminar un actuator
    public function destroy(Request $request, $id)
    {
        $actuator = Actuator::find($id);
        if (!$actuator) return response('', 404); 
        $actuator->delete();
        return $actuator;
    }
}
