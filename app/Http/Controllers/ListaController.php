<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function index(request $request)
    {
        $listas = Lista::query()->orderBy('item')->get();

        $mensagem = $request->session()->get('mensagem');

        return view('lista.index')->with('listas',$listas)->with('mensagem', $mensagem);
    }

    public function create(request $request)
    {
        return view('lista.create');
    }

    public function store(request $request, Lista $listas)
    {
        $item = $request->input('nome');
        $listas->item = $item;
        $listas->save();

        return redirect('/lista')->with('mensagem', 'Item adicionado com sucesso');
    }

    public function destroy(Lista $lista)
    {
        Lista::destroy($lista->id);
        return redirect('/lista')->with('mensagem', "Item '{$lista->item}' excluido.");
    }

    public function edit(request $request, Lista $lista)
    {
        return view('lista.edit')->with('lista', $lista);
    }

    public function update(Lista $lista, request $request)
    {
        $lista->item = $request->input('nome');
        $lista->save();

        return redirect('/lista')->with('mensagem', "Item atualizado.");
    }
}
