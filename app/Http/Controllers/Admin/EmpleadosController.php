<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('catalogos.empleados.index', [
            'empleados' => $empleados
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'edad' => 'required|integer|max:255',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser un texto.',
            'integer' => 'El campo :attribute debe ser un número.',
            'max' => 'El campo :attribute debe tener un máximo de :max caracteres.',
        ], [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'direccion' => 'Direccion',
            'sexo' => 'Sexo',
            'edad' => 'Edad',
        ]);
        if($validator->fails()){
            return redirect()->route('empleados.create')->withErrors($validator)->withInput();
        }


        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->edad = $request->edad;
        $empleado->direccion = $request->direccion;
        $empleado->sexo = $request->sexo;
        try{
            $empleado->save();
            return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente');
        }
        catch(\Exception $e){
            return redirect()->route('empleados.index')->withErrors('Error al crear la empleado');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('catalogos.empleados.edit', [
            'empleado' => $empleado
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'edad' => 'required|integer|max:255',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser un texto.',
            'integer' => 'El campo :attribute debe ser un número.',
            'max' => 'El campo :attribute debe tener un máximo de :max caracteres.',
        ], [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'direccion' => 'Direccion',
            'sexo' => 'Sexo',
            'edad' => 'Edad',
        ]);

        if($validator->fails()){
            return redirect()->route('empleados.edit', ['empleado' => $empleado])->withErrors($validator)->withInput();
        }

        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->edad = $request->edad;
        $empleado->direccion = $request->direccion;
        $empleado->sexo = $request->sexo;
        try{
            $empleado->save();
            return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
        }
        catch(\Exception $e){
            return redirect()->route('empleados.index')->withErrors('Error al actualizar empleado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        try{
            $empleado->delete();
            return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
        }
        catch(\Exception $e){
            return redirect()->route('empleados.index')->withErrors('Error al eliminar empleado');
        }
    }
}
