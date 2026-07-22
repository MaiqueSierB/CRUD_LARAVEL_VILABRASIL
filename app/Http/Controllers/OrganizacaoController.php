<?php

namespace App\Http\Controllers;

use App\Models\Organizacao;
use Illuminate\Http\Request;

class OrganizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $organizacoes = Organizacao::orderBy('nome')->get();

    return view('organizacoes.index', compact('organizacoes'));
}

    public function create()
{
    return view('organizacoes.create');
}

    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|unique:organizacoes|max:255'
    ]);

    Organizacao::create([
        'nome' => $request->nome
    ]);

    return redirect()
        ->route('organizacoes.index')
        ->with('success', 'Organização cadastrada com sucesso!');
}
    /**
     * Display the specified resource.
     */
    public function show(Organizacao $organizacao)
    {
        //
    }

    public function edit(Organizacao $organizacao)
{
    return view('organizacoes.edit', compact('organizacao'));
}

    public function update(Request $request, Organizacao $organizacao)
{
    $request->validate([
        'nome' => 'required|max:255|unique:organizacoes,nome,' . $organizacao->id,
    ]);

    $organizacao->update([
        'nome' => $request->nome,
    ]);

    return redirect()
        ->route('organizacoes.index')
        ->with('success', 'Organização atualizada com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizacao $organizacao)
    {
        //
    }
}
