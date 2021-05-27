<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Services\CriadorDeContato;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecosController extends Controller
{
    public function index(Request $request)
    {
        $endereco = Endereco::find($request->enderecoId);
        $foreignKey = $endereco->contato_id;
        $contato = Contato::find($foreignKey);
        $mensagem = $request->session()->get(key: 'mensagem');
        return view('enderecos.index', ['contato' => $contato], ['endereco' => $endereco], ['mensagem' => $mensagem]);
    }

    public function adiciona(Request $request)
    {
        $contato = Contato::find($request->contatoId);
        return view('enderecos.create', ['contato' => $contato]);
    }

    public function adicionar(Request $request, CriadorDeContato $criadorDeContato)
    {
        $contato = Contato::find($request->contatoId);
        $criadorDeContato->criarEndereco(
            $contato,
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
                "Endereço removido com sucesso."
            );
        return redirect()->route('listar_dados', ['contatoId' => $request->contatoId]);
    }

    public function remover(Request $request) {
        $endereco = Endereco::find($request->enderecoId);
        $endereco->delete();
        Endereco::destroy($request->enderecoId);
        $request->session()
            ->flash(
                'mensagem',
                "Endereço removido com sucesso."
            );
        return redirect()->route('listar_dados', ['contatoId' => $endereco->contato_id]);
    }
}
