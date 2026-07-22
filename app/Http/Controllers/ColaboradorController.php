<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Organizacao;
use Illuminate\Http\Request;


class ColaboradorController extends Controller
{


    public function index(Request $request)
    {
        $pesquisa = $request->pesquisa;

        $colaboradores = Colaborador::with('organizacao')
            ->when($pesquisa, function ($query) use ($pesquisa) {

                $query->where('nome', 'like', "%{$pesquisa}%")
                    ->orWhere('cargo', 'like', "%{$pesquisa}%")
                    ->orWhereHas('organizacao', function ($q) use ($pesquisa) {

                        $q->where('nome', 'like', "%{$pesquisa}%");

                    });

            })
            ->orderBy('nome')
            ->get();

        return view('colaboradores.index', compact(
            'colaboradores',
            'pesquisa'
        ));
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

        // se for colaborador interno, remove a organizacao. servir como segunda validacao pra caso altere pelo url
        if ($request->tipo === 'interno') {
            $request->merge([
                'organizacao_id' => null
            ]);
        }

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
