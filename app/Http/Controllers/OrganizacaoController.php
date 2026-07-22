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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizacao $organizacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organizacao $organizacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizacao $organizacao)
    {
        //
    }
}
