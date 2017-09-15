<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Libro;
use App\Autor;
use App\Categoria;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::orderBy('id','ASC')->paginate(5);
        $libros->each(function($libros){
            $libros->autores;
            $libros->categorias;
        });

        return view('libros.index')->with('libros',$libros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autor::all()->pluck('name','id');
        $categorias = Categoria::all()->pluck('name','id');
        return view('libros.create')->with('autores',$autores)
                                    ->with('categorias',$categorias);
                                    
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
            'name' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*[0-9 \W]*$/i|min:10|max:50',
        ]);


        $libro = new Libro();
        $libro->name = $request->name;
        $libro->autor_id = $request->autor_id;
        $libro->categoria_id = $request->categoria_id;
        $libro->save();
        flash('El libro'.$libro->name.'se ha registrado de forma exitosa.')->success();
        return redirect()->route('admin.libros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        $libro->autor;
        $libro->categoria;
        $autores = Autor::all()->pluck('name','id');
        $categorias = Categoria::all()->pluck('name','id');
        return view('libros.edit')->with('libro', $libro)
                                  ->with('autores',$autores)
                                  ->with('categorias',$categorias);
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
        $libro = Libro::find($id);
        $libro->fill($request->all());
        $libro->save();
        flash('El libro '.$libro->name.' ha sido editado de forma exitosa.')->warning();
        return redirect()->route('admin.libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        flash('El libro '.$libro->name.' se ha eliminado de forma exitosa.')->error();
        return redirect()->route('admin.libros.index');
    }
}
