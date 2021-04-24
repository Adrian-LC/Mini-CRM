<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate(10);
        
        return view('empresa.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
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
            'email' => 'nullable|email|max:255',
            'logotipo' => 'file|mimes:jpeg,jpg,png',
            'sitio_web' => 'nullable|string|max:255',
        ];
        $this->validate($request, $validaciones);

        $datos = request()->except('_token');
        if ($request->hasFile('logotipo')) {
            $datos['logotipo'] = $request->file('logotipo')->store('empresa', 'public');
        }

        Empresa::create($datos);

        return redirect()->route('empresa.index')->with('mensaje', 'Empresa agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresa.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $validaciones = [
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logotipo' => 'file|mimes:jpeg,jpg,png',
            'sitio_web' => 'nullable|string|max:255',
        ];
        $this->validate($request, $validaciones);

        $datos = request()->except(['_token', '_method']);
        if ($request->hasFile('logotipo')) {
            Storage::delete('public/' . $empresa->logotipo);
            $datos['logotipo'] = $request->file('logotipo')->store('empresa', 'public');
        }

        Empresa::where('id', '=', $empresa->id)->update($datos);

        return redirect()->route('empresa.index')->with('mensaje', 'Empresa actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        if (count($empresa->empleados) == 0) {
            Storage::delete('public/' . $empresa->logotipo);
            Empresa::destroy($empresa->id);
            
            return redirect()->route('empresa.index')->with('mensaje', 'Empresa eliminada!');
        } else {
            return redirect()->route('empresa.index')->with('error', 'Debe eliminar primero los empleados relacionados con la empresa');
        }
    }
}
