@extends('layout')

@section('titulo')
Endereço de {{ $contato->nome }}
@endsection

@section('cabecalho')
Endereço de {{ $contato->nome }}
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success" role="alert">
    {{$mensagem}}
</div>
@endif

<div class="row g-3">
    <div class="col-md-8">
        <label for="rua" class="form-label">Rua</label>
        <input type="text" class="form-control" id="rua" name="rua" disabled value="{{ $endereco->rua }}">
    </div>
    <div class="col-md-4">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" disabled value="{{ $endereco->numero }}">
    </div>
    <div class="col-md-6">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" disabled value="{{ $endereco->bairro }}">
    </div>
    <div class="col-md-4">
        <label for="complemento" class="form-label">Complemento</label>
        <input type="text" class="form-control" id="complemento" name="complemento" disabled value="{{ $endereco->complemento }}">
    </div>
    <div class="col-md-2">
        <label for="CEP" class="form-label">CEP</label>
        <input type="text" class="form-control" id="CEP" name="CEP" disabled value="{{ $endereco->CEP }}">
    </div>
    <div class="col-md-8">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" disabled value="{{ $endereco->cidade }}">
    </div>
    <div class="col-md-4">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-select" disabled>
            <option selected>{{ $endereco->estado }}</option>
        </select>
    </div>
</div>
@endsection