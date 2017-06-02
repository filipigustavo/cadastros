<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objeto;

class ObjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetos = Objeto::all();

        $data = array(
          'objetos' => $objetos
        );

        return view('objeto.listar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \App\Categoria::all();

        $data = array(
          'categorias' => $categorias
        );

        return view('objeto.criar', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objeto = new Objeto;
        $objeto->name = $request->name;
        $objeto->categoria_id = $request->categoria_id;
        $objeto->save();
        return redirect()->route('listar_objetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('objeto.detalhe');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objeto = Objeto::find($id);
        $categorias = \App\Categoria::all();

        $data = array(
          'objeto' => $objeto,
          'categorias' => $categorias
        );

        return view('objeto.editar', $data);
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
        $objeto = Objeto::find($id);
        $objeto->name = $request->name;
        $objeto->categoria_id = $request->categoria_id;
        $objeto->save();
        return redirect()->route('listar_objetos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = Objeto::find($id);
        $objeto->delete();
        return redirect()->route('listar_objetos');
    }
}
