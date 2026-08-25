<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;
use Illuminate\Support\Facades\Auth;

class MuralController extends Controller
{
    //1. carrega as guitarras gravadas no banco de dados
    public function index(){
        // o with('user') busca o nome do dono de cada guitarra
        $guitars = Guitar::with('user')->latest()->get();

        return view('mural', compact('guitars'));
    }
    //2. salva uma nova guitarra vinculada ao usuario logado
    public function store(Request $request){
        //valida os campos recebidos do formulario
        $validated = $request->validate([
            'brand'  => 'required|string|max:255',
            'model'  => 'required|string|max:255',
            'year'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'color'  => 'nullable|string|max:255',
            'description'  => 'nullable|string|max:1000',
        ]);

        //cria a guitarra automaticamente no id do usuario logado
        $request->user()->guitars()->create($validated);

        return redirect()->route('mural.index')->with('sucess', 'Equipamento adicionado à sua garagem!');
    }

    public function edit(Guitar $guitar){
    // 1. Segurança: Só o dono pode editar
    if (Auth::id() !== $guitar->user_id) {
        abort(403, 'Ação não autorizada.');
    }

    // 2. Retorna a view 'guitars.edit' enviando os dados da $guitar
    return view('edit', compact('guitar'));

    }

    public function update(Request $request, Guitar $guitar){
           
    if (Auth::id() !== $guitar->user_id) {
        abort(403, 'Ação não autorizada.');
    }

    $validated = $request->validate([
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255'
    ]);

    $guitar->update($validated);

    return redirect()->route('mural.index')->with('success', 'Atualizado com Sucesso');

    }

    public function destroy(Guitar $guitar){

    if(Auth::id() != $guitar->user_id){
        abort(403, 'Ação não autorizada');
    }

    $guitar->delete();

    return redirect()->route('mural.index')->with('success', 'Deletado com Sucesso');
    }
}
