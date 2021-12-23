<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actualizar;
use App\Http\Requests\Crear;
use App\Models\Datos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosController extends Controller implements DatosInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::select('call get_users()'); 
        // return view('index');
        return $datos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Crear $request)
    {
        $values = [$request->Nombre,$request->Apellido,$request->email,$request->password] ;
        $dato = DB::insert('call post_users(?, ?, ?, ?)',$values);

        return $dato;

        // $dato->Nombre = $request->Nombre;
        // $dato->Apellido = $request->Apellido;
        // $dato->email = $request->email;
        // $dato->password = $request->password;

        // $dato->save();
        // return response()->json([
        //     "status" => true,
        //     "message"=> "done.Se Creo El Usuario", 
        //     "data"=> $dato
        // ]);
        // $url = "http://localhost/Proyectos/Nueva%20carpeta/Visualjs/index.html";
        // return redirect()->to($url)->with('succes', response()->json([
        //         "status" => true,
        //         "message"=> "done.Se Creo El Usuario", 
        //         "data"=> $dato
        // ])
        // );
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos = Datos::find($id);
        return response()->json($datos);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function edit(Datos $datos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function update(Actualizar $request, Datos $datos)
    {
        $values = [$request->id,$request->Nombre,$request->Apellido,$request->email,$request->password,$request->updated_at] ;
        $dato = DB::update('call post_users(?, ?, ?, ?, ?, ?)',$values);

        // DB::select("CALL update_product(:id,:Nombre, :Apellido, :email, :password, :now)", [
        //         "id" => ,
        //         "description" => "ashiasndf",
        //         "now" => "2021-12-15 11:11:11"
        //     ])

        return $dato;
        // $dato = Datos::findOrFail($request->id);
        //     $dato->Nombre = $request->Nombre;
        //     $dato->Apellido = $request->Apellido;
        //     $dato->email = $request->email;
        //     $dato->password = $request->password;

        //     $dato->save();
        //     return response()->json([
        //         "status" => true,
        //         "message"=> "done.Se Actualizo el usuario con id: $request->id", 
        //         "data"=> $dato
        //     ]);
        // try {
        //     $dato = Datos::findOrFail($request->id);
        //     $dato->Nombre = $request->Nombre;
        //     $dato->Apellido = $request->Apellido;
        //     $dato->email = $request->email;
        //     $dato->password = $request->password;

        //     $dato->save();
        //     return response()->json([
        //         "status" => true,
        //         "message"=> "done.Se Actualizo el usuario con id: $request->id", 
        //         "data"=> $dato
        //     ]);
        // } catch (ModelNotFoundException $exception) {
        //     return back()->withError($exception->getMessage())->withInput();
        // }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datos  $datos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato = DB::delete("call delete_users(?)",[$id]);
        return $dato;
        // if ($dato == 0) {
        //     return response()->json([
        //         "status" => false, 
        //         "message"=> "done.No existe el usuario con id: $request->id", 
        //         "data"=> $dato
        //     ]);
        // }
        // return response()->json([
        //     "status" => true, 
        //     "message"=> "done.Se Elimino el usuario con id: $request->id", 
        //     "data"=> $dato
        // ]);
    }
}
