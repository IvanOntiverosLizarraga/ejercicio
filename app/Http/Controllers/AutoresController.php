<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Autor;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::orderBy('id','ASC')->paginate(5);
        return view('autores.index')->with('autores', $autores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autores.create');
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
        
        $autor = new Autor($request->all());
        $autor->save();
        flash('El autor '.$autor->name.' se ha registrado de forma exitosa.')->success();
        return redirect()->route('admin.autores.index');
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
        $autor = Autor::find($id);
        return view('autores.edit')->with('autor', $autor);
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
        $autor = Autor::find($id);
        $autor->fill($request->all());
        $autor->save();
        flash('El autor '.$autor->name.' se ha editato de forma exitosa.');
        return redirect()->route('admin.autores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autor::find($id);
        $autor->delete();
        flash('El autor '.$autor->name.' ha sido eliminado de forma exitosa.')->error();
        return redirect()->route('admin.autores.index');
    }
}
