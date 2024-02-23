<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorsController extends Controller
{
       //CRUD COMPLETO
    //Consultar todos los sensors  (es un select * from sensors) (el paginate hace algo parecido, pero indica la página con url)
    public function index()
    {
        return Sensor::paginate();
    }

    //Consultar un sensor
    public function show($id)
    {
        return Sensor::find($id);
    }

    //Crear un sensor
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sensors', 
            'type' => 'required',
            'value' => 'required',
           // 'date' => 'required',
            //'user_id' => 'required',
        ]);  
        $sensor = new Sensor;
        $sensor->fill($request->all());
        $sensor->user_id = 1; 
        $sensor->date = date('Y-m-d H:i:s'); //toma estos datos
        $sensor->save();
        return $sensor;
    }

    //Actualizar 
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'filled|unique:sensors',
        ]);
        $sensor = Sensor::find($id);  
        if (!$sensor) return response('', 404); 
        $sensor->update($request->all());
        $sensor->save();
        return $sensor;
    }

    //Eliminar un sensor
    public function destroy(Request $request, $id)
    {
        $sensor = Sensor::find($id);
        if (!$sensor) return response('', 404); 
        $sensor->delete();
        return $sensor;
    }
}
