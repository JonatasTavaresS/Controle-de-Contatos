@extends('layout')

@section('titulo')
Dados de {{ $contato->nome }}
@endsection

@section('cabecalho')
Dados de {{ $contato->nome }}
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success" role="alert">
    {{$mensagem}}
</div>
@endif

<form method="post" class="row g-3">
    @csrf
    <div class="col-md-8">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" pattern="[a-zA-ZÀ-ú ]+$" id="nome" name="nome" value="{{ $contato->nome }}" placeholder="Digite apenas números" required>
    </div>
    <div class="col-md-4">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control cel-sp-mask" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}$" id="telefone" name="telefone" value="{{ $contato->telefone }}" placeholder="Digite apenas números" required>
    </div>
    <div class="col-md-6">
        <label for="CPF" class="form-label">CPF</label>
        <input type="text" class="form-control cpf-mask" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" id="CPF" name="CPF" value="{{ $contato->CPF }}" placeholder="Digite apenas números" required>
    </div>
    <div class="col-md-6">
        <label for="RG" class="form-label">RG</label>
        <input type="text" class="form-control" pattern="[0-9]+$" id="RG" name="RG" value="{{ $contato->RG }}" placeholder="Digite apenas números" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
@endsection