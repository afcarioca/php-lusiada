<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index(){
      return Noticia::all();
    }

    public function show($id){
      return Noticia::find($id);
    }

    public function store(Request $request){
      $noticia = Noticia::create($request->all());

      return response()->json($noticia, 201);
    }

    public function update(Request $request, $id){
      $noticia = Noticia::findOrFail($id);
      $noticia->update($request->all());

      return $noticia;
    }

    public function delete(Request $request, $id){
      $noticia = Noticia::findOrFail($id);
      $noticia->delete();

      return 204;
    }
}
