<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Models\Endereco;
use App\Services\CriadorDeContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatosController extends Controller
{
    public function index(Request $request)
    {
        $contatos = Contato::query()->orderBy(column: 'nome')->get();
        $mensagem = $request->session()->get(key: 'mensagem');
        return view('contatos.index', ['contatos' => $contatos], ['mensagem' => $mensagem]);
    }

    public function create()
    {
        return view('contatos.create');
    }

    public function store(Request $request, CriadorDeContato $criadorDeContato)
    {
        $contato = $criadorDeContato->criarContato(
            $request->nome,
            $request->telefone,
            $request->CPF,
            $request->RG,
            $request->rua,
            $request->numero,
            $request->complemento,
            $request->bairro,
            $request->CEP,
            $request->cidade,
            $request->estado
        );
        $request->session()
            ->flash(
                'mensagem',
                "Contato $contato->nome e suas informações foram adicionadas com sucesso."
            );
        return redirect()->route('listar_contatos');
    }

    public function removerContato(Request $request)
    {
        $contato = Contato::find($request->contatoId);
        $nome = $contato->nome;
        $contato->enderecos->each(function (Endereco $endereco) {
            $endereco->delete();
        });
        $contato->delete();
        Contato::destroy($request->contatoId);
        $request->session()
            ->flash(
                'mensagem',
                "Contato $nome removido com sucesso."
            );
        return redirect()->route('listar_contatos');
    }
}
