@extends('layout')

@section('titulo')
Lista de Contatos
@endsection

@section('cabecalho')
Contatos
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success" role="alert">
    {{$mensagem}}
</div>
@endif
@auth
<a href="{{ route('form_criar_contato')}}" class="btn btn-dark mb-2">Adicionar Contato</a>
@endauth

<ul class="list-group">
    @foreach($contatos as $contato)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="nome-contato-{{ $contato->id }}">{{ $contato->nome }}</span>
        <span class="d-flex">
            <a href="/contatos/{{ $contato->id }}/editar" class="btn btn-info btn-sm mr-2">
                <i class="fas fa-edit"></i>
            </a>
            <a href="/contatos/{{ $contato->id }}/dados" class="btn btn-info btn-sm mr-2">
                <i class="fas fa-external-link-alt"></i>
            </a>
            @auth
            <form method="post" action="/contatos/{{ $contato->id }}/remover">
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
@endsection