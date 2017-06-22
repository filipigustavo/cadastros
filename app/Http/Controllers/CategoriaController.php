<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use App\Categoria;

class CategoriaController extends Controller
{
    protected $user;

    public function __construct(){
      $this->middleware(function(Request $request, $next){
        $this->user = Auth::user();

        if($request->wantsJson()){
          $this->user = $request->user();
        }

        return $next($request);
      });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();

        $data = [
          'categorias' => $categorias
        ];

        return view('categoria.listar', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.criar');
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
          'name' => [
            'required',
            Rule::unique('categorias')->where(function($query){
              $query->where('user_id', $this->user->id);
            })
          ]
        ]);

        $categoria = new Categoria;
        $categoria->user_id = $this->user->id;
        $categoria->name = $request->name;
        $categoria->save();

        if($request->wantsJson()){
          return response()->json($categoria);
        }

        return redirect()->route('listar_categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        $data = [
          'categoria' => $categoria
        ];

        return view('categoria.detalhe', $data);
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

        $data = [
          'categoria' => $categoria
        ];

        return view('categoria.editar', $data);
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
        $categoria = Categoria::find($id);

        $this->validate($request, [
          'name' => [
            'required',
            Rule::unique('categorias')->where(function($query){
              $query->where('user_id', $this->user->id);
            })->ignore($categoria->id)
          ]
        ]);

        $categoria->name = $request->name;
        $categoria->save();
        return redirect()->route('listar_categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        if($request->wantsJson()){
          return response()->json(Categoria::all()->load('objetos'));
        }

        return redirect()->route('listar_categorias');
    }
}
