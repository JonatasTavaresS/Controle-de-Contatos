@extends('layout')

@section('titulo')
Adicionar Contato
@endsection

@section('cabecalho')
Adicionar Contato
@endsection

@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger">
    <ul> @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" class="row g-3">
    @csrf
    <div class="col-md-8">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" pattern="[a-zA-ZÀ-ú ]+$" id="nome" name="nome" required>
    </div>
    <div class="col-md-4">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control cel-sp-mask" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}$" id="telefone" name="telefone" placeholder="Digite apenas números" required>
    </div>
    <div class="col-md-6">
        <label for="CPF" class="form-label">CPF</label>
        <input type="text" class="form-control cpf-mask" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" id="CPF" name="CPF" placeholder="Digite apenas números" required>
    </div>
    <div class="col-md-6">
        <label for="RG" class="form-label">RG</label>
        <input type="text" class="form-control" pattern="[0-9]+$" id="RG" name="RG" placeholder="Digite apenas números" required>
    </div>
    <div class="col-md-8">
        <label for="rua" class="form-label">Rua</label>
        <input type="text" class="form-control" pattern="[a-zA-ZÀ-ú ]+$" id="rua" name="rua" required>
    </div>
    <div class="col-md-4">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" pattern="[0-9]+$" id="numero" name="numero" required>
    </div>
    <div class="col-md-6">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" pattern="[a-zA-ZÀ-ú ]+$" id="bairro" name="bairro" required>
    </div>
    <div class="col-md-4">
        <label for="complemento" class="form-label">Complemento</label>
        <input type="text" maxlength="9" class="form-control" id="complemento" name="complemento" required>
    </div>
    <div class="col-md-2">
        <label for="CEP" class="form-label">CEP</label>
        <input type="text" class="form-control cep-mask" pattern="[0-9]{5}-[0-9]{3}$" id="CEP" name="CEP" required>
    </div>
    <div class="col-md-8">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" pattern="[a-zA-ZÀ-ú ]+$" id="cidade" name="cidade" required>
    </div>
    <div class="col-md-4">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-select" required>
            <option value="" selected disabled></option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
<br />
@endsection