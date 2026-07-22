<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Organizacao;
use Illuminate\Http\Request;


class ColaboradorController extends Controller
{


public function index()
{
    $colaboradores = Colaborador::with('organizacao')->get();

    return view('colaboradores.index', compact('colaboradores'));
}


    public function create()
{
    $organizacoes = Organizacao::orderBy('nome')->get();

    return view('colaboradores.create', compact('organizacoes'));
}
   public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|max:255',
        'cargo' => 'nullable|max:255',
        'tipo' => 'required|in:interno,externo',
        'organizacao_id' => 'nullable|required_if:tipo,externo|exists:organizacoes,id',
    ]);

    Colaborador::create([
        'nome' => $request->nome,
        'cargo' => $request->cargo,
        'tipo' => $request->tipo,
        'organizacao_id' => $request->organizacao_id,
    ]);

    return redirect()
        ->route('colaboradores.index')
        ->with('success', 'Colaborador cadastrado com sucesso!');
}
    /**
     * Display the specified resource.
     */
    public function show(Colaborador $colaborador)
    {
        //
    }

 public function edit(Colaborador $colaborador)
{
    $organizacoes = Organizacao::orderBy('nome')->get();

    return view(
        'colaboradores.edit',
        compact('colaborador', 'organizacoes')
    );
}

  public function update(Request $request, Colaborador $colaborador)
{
    $request->validate([
        'nome' => 'required|max:255',
        'cargo' => 'nullable|max:255',
        'tipo' => 'required|in:interno,externo',
        'organizacao_id' => 'nullable|required_if:tipo,externo|exists:organizacoes,id',
    ]);

    $colaborador->update([
        'nome' => $request->nome,
        'cargo' => $request->cargo,
        'tipo' => $request->tipo,
        'organizacao_id' => $request->organizacao_id,
    ]);

    return redirect()
        ->route('colaboradores.index')
        ->with('success', 'Colaborador atualizado com sucesso!');
}

 public function destroy(Colaborador $colaborador)
{
    $colaborador->delete();

    return redirect()
        ->route('colaboradores.index')
        ->with('success', 'Colaborador excluído com sucesso!');
}
}
