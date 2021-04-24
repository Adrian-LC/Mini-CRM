<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate(10);

        return view('empleado.index')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();

        return view('empleado.create')->with('empresas', $empresas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresa_id' => 'required|integer',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|integer',
        ];
        $this->validate($request, $validaciones);

        $datos = request()->except('_token');

        Empleado::create($datos);

        return redirect()->route('empleado.index')->with('mensaje', 'Empleado agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleado.show')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $empresas = Empresa::where('id', '!=', $empleado->empresa->id)->get();

        return view('empleado.edit')->with(['empleado' => $empleado, 'empresas' => $empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $validaciones = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'empresa_id' => 'required|integer',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|integer',
        ];
        $this->validate($request, $validaciones);

        $datos = request()->except(['_token', '_method']);

        Empleado::where('id', '=', $empleado->id)->update($datos);

        return redirect()->route('empleado.index')->with('mensaje', 'Empleado actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        Empleado::destroy($empleado->id);

        return redirect()->route('empleado.index')->with('mensaje', 'Empleado eliminado!');
    }
}
