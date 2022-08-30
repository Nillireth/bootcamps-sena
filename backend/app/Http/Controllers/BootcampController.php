<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // echo "Aqui se va a mostrar proximamente todos los bootcamps";
       //return Bootcamp::all();
       return response()->json(["Success" => true, 
                                 "data" => Bootcamp::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verificar que llego aqui el payload
        //return $request->all();
        //Registrar el bootcamp a partir del payload
       $b = Bootcamp::create([
                            "name"=>$request->name,
                            "description"=> $request->description,
                            "website"=>$request->website,
                            "phone"=>$request->phone,
                            "user_id"=>$request->user_id
                        ]);
        return response([ "Sucess" => true,
                         "data" => $b], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "Mostrar un bootcamp cuyo id es: $id";

        //return Bootcamp::find($id); 
        return response()->json(["Success" => true, 
                                  "data" => Bootcamp::find($id)
                                ], 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo "Aqui se va a actualizar el bootcamp con id $id";

        //1. Seleccionar el bottcamp por id
        $bootcamp = Bootcamp::find($id);
        //2. Actualizarlo
        $bootcamp -> update($request->all());
        //3. Hacer el Response respesctivo
        //return $bootcamp;
        return response()->json(["Success" => true,
                                 "data" =>  $bootcamp], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "Aqui se va a eliminar el bootcamp cuyo id es: $id";

        //1. Seleccionas el bootcamp 
        $bootcamp = Bootcamp::find($id);
        //2. Eliminar bootcamp
        $bootcamp->delete();
        //3. Response:
        return response()->json(["Success" => true,
                                 "message" => "El bootcamp eliminado",
                                 "data" => $bootcamp->id], 200);
    }
}
