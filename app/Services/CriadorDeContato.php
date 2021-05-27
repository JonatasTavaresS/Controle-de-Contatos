<?php

namespace App\Services;

use App\Contato;
use Illuminate\Support\Facades\DB;

class CriadorDeContato
{
    public function criarContato(
        string $nome,
        string $telefone,
        string $CPF,
        string $RG,
        string $rua,
        string $numero,
        string $complemento,
        string $bairro,
        string $CEP,
        string $cidade,
        string $estado
    ): Contato {
        DB::beginTransaction();
        $contato = Contato::create(['nome' => $nome, 'telefone' => $telefone, 'CPF' => $CPF, 'RG' => $RG]);
        $this->criarEndereco($contato, $rua, $numero, $complemento, $bairro, $CEP, $cidade, $estado);
        DB::commit();
        return $contato;
    }

    public function criarEndereco(
        Contato $contato,
        string $rua,
        string $numero,
        string $complemento,
        string $bairro,
        string $CEP,
        string $cidade,
        string $estado
    ): void {
        $contato->enderecos()->create(['rua' => $rua, 'numero' => $numero, 'complemento' => $complemento, 'bairro' => $bairro, 'CEP' => $CEP, 'cidade' => $cidade, 'estado' => $estado]);
    }
}
