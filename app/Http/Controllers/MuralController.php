<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guitar;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGuitarRequest;

class MuralController extends Controller
{
    //1. carrega as guitarras gravadas no banco de dados
    public function index(Request $request){
        $query = Guitar::with('user');
          //para pegar o que o usuário digitou em um campo chamado 'search'
        $search = $request->input('search');
        /* $query->where(function ($q) ...): Cria um grupo de condições entre parênteses no SQL: WHERE (brand LIKE ... OR model LIKE ... OR color LIKE ...).
        use ($search): É a forma do PHP de "passar" a variável $search que tá fora pra dentro dessa função.
        $q->orWhere(...): Dentro do grupo $q, você pode encadear quantos orWhere quiser (para modelo, cor, etc)!
        */
        if(!empty($search)){
            $query->where(function ($q) use ($search){
                $q->where('brand', 'LIKE', '%'.$search.'%')
                  ->orWhere('color', 'LIKE', '%'.$search.'%')
                  ->orWhere('model', 'LIKE', '%'.$search.'%');
            });
        }

        $guitars = $query->latest()->get();
        return view('mural', compact('guitars'));
    }
    //2. salva uma nova guitarra vinculada ao usuario logado
    public function store(StoreGuitarRequest $request){
        //valida os campos recebidos do formulario
        $data = $request->validated();
        // Se o usuário enviou uma imagem, faz o upload
        if($request->hasFile('image')){
            // Salva o arquivo na pasta 'storage/app/public/guitars' e retorna o caminho
            $data['image'] = $request->file('image')->store('guitarra', 'public');
        }

        //cria a guitarra automaticamente no id do usuario logado
        $request->user()->guitars()->create($data);

        return redirect()->route('mural.index')->with('success', 'Equipamento adicionado à sua garagem!');
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
