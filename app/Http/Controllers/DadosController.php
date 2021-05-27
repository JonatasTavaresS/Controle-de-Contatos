<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class DadosController extends Controller
{
    public function index(Request $request){
        $contato = Contato::find($request->contatoId);
        $enderecos = $contato->enderecos;
        $mensagem = $request->session()->get(key: 'mensagem');
        return view('dados.index', ['contato' => $contato], ['enderecos' => $enderecos], ['mensagem' => $mensagem]);
    }

    public function edit(int $contatoId){
        $contato = Contato::find($contatoId);
        return view('dados.edit', ['contato' => $contato]);
    }

    public function editar(Request $request){
        $contato = Contato::find($request->contatoId);
        $novoNome = $request->nome;
        $novoTelefone = $request->telefone;
        $novoCPF = $request->CPF;
        $novoRG = $request->RG;
        $contato->nome = $novoNome;
        $contato->telefone = $novoTelefone;
        $contato->CPF = $novoCPF;
        $contato->RG = $novoRG;
        $contato->save();
        return redirect()->route('listar_contatos');
    }
}
