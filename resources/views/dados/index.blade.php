@extends('layout')

@section('titulo')
Dados de {{ $contato->nome }}
@endsection

@section('cabecalho')
Dados de Contato
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success" role="alert">
    {{$mensagem}}
</div>
@endif

<div class="row g-3">
    <div class="col-md-8">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" disabled value="{{ $contato->nome }}">
    </div>
    <div class="col-md-4">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" maxlength="15" class="form-control" id="telefone" name="telefone" disabled value="{{ $contato->telefone }}">
    </div>
    <div class="col-md-6">
        <label for="CPF" class="form-label">CPF</label>
        <input type="text" maxlength="11" class="form-control" id="CPF" name="CPF" disabled value="{{ $contato->CPF }}">
    </div>
    <div class="col-md-6">
        <label for="RG" class="form-label">RG</label>
        <input type="text" class="form-control" id="RG" name="RG" disabled value="{{ $contato->RG }}">
    </div>
</div>

<br />
<h1 class="display-4">Dados de Endereço</h1>
@auth
<a href="/enderecos/{{ $contato->id }}/adicionar" class="btn btn-dark mb-2">Adicionar Endereço</a>
@endauth
<ul class="list-group">
    <?php $counter = 0; ?>
    @foreach($enderecos as $endereco)
    <?php $counter++; ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="nome-endereco-{{ $endereco->id }}">Endereço {{ $counter }}</span>

        <span class="d-flex">
            <a href="/enderecos/{{ $endereco->id }}/dados" class="btn btn-info btn-sm mr-2">
                <i class="fas fa-external-link-alt"></i>
            </a>
            @auth
            <form method="post" action="/enderecos/{{ $endereco->id }}/remover">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            @endauth
        </span>
    </li>
    @endforeach
</ul>
<br />
@endsection