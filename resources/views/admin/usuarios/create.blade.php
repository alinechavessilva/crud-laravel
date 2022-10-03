@extends('admin.master.layout')

@section('content')

<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 col-xs-12">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
            </div>
        @endif

        <h4>Cadastrar Usuário</h4>
        {{ Form::open([ 'route' => 'store' ]) }}

            {{ csrf_field() }}
            <b>Campos com * são obrigatórios</b><br>
            <div class="form-group">
                {{ Form::label('name', 'Nome*:', ['class' => 'control-label']) }}
                <input type="text" name="nome" value="{{ old('name') }}" class="form-control"
                placeholder="Informe o Nome completo" maxlength="255" required>
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email*:', ['class' => 'control-label']) }}
                <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                placeholder="Email" maxlength="255" required>
            </div>

            <div class="form-group">
                {{ Form::label('telefone', 'Telefone*:', ['class' => 'control-label']) }}
                <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}" class="form-control"
                placeholder="Informe o telefone" maxlength="16" required>
            </div>

            <div class="form-group">
                {{ Form::label('cpf_cnpj', 'Cpf ou Cnpj*:', ['class' => 'control-label']) }}
                <input type="text" id="cpfcnpj" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}" class="form-control"
                placeholder="Cpf ou Cnpj" maxlength="50" required>
            </div>

            <div class="form-group">
                {{ Form::label('mensagem', 'Mensagem*:', ['class' => 'control-label']) }}
                <input type="text" name="mensagem" value="{{ old('mensagem') }}" class="form-control"
                placeholder="Mensagem" maxlength="255" required>
            </div>

            <br/>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" title="Cadastrar Usuário">Cadastrar</button>
                <a href="{{ route('home') }}" class="btn btn-secondary" title="Cancelar">Cancelar</a>
            </div>

        {{ Form::close() }}
    </div>
    <div class="col-lg-4"></div>
</div>
@endsection
