<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id','ASC')->paginate(5);
        return view('categorias.index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*$/i|min:10|max:50',
        ]);


        $categoria = new Categoria($request->all());
        $categoria->save();
        flash('La categoría '.$categoria->name.' se ha registrado de forma exitosa.');
        return redirect()->route('admin.categorias.index');
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
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.edit')->with('categoria', $categoria);
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
        $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*$/i|min:10|max:50',
        ]);
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        flash('La categoría '.$categoria->name.' se ha editado de forma exitosa.');
        return redirect()->route('admin.categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        flash('Se ha eliminado la categoría '.$categoria->name.' de forma exitosa.')->error();
        return redirect()->route('admin.categorias.index');
    }
}
