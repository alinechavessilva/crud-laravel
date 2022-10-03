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
        <h4>Editar Usuário</h4>

        {!! Form::model($usuario, ['method' => 'PATCH', 'route' => ['update', $usuario->id]]) !!}

            {!! csrf_field() !!}
            <b>Campos com * são obrigatórios</b><br>

            <div class="form-group">
                {!! Form::label('nome', 'Nome*:', ['class' => 'control-label']) !!}
                {!! Form::text('nome', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email*:', ['class' => 'control-label']) !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('cpf_cnpj', 'CPF ou CNPJ*:', ['class' => 'control-label', 'id' => 'cpfcnpj']) !!}
                {!! Form::text('cpf_cnpj', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('telefone', 'Telefone*:', ['class' => 'control-label', 'id' => 'telefone']) !!}
                {!! Form::text('telefone', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('mensagem', 'Mensagem*:', ['class' => 'control-label']) !!}
                {!! Form::text('mensagem', null, ['class' => 'form-control', 'maxlength' => '255']) !!}
            </div>

            <br/>
            {!! Form::button('Atualizar', ['class' => 'btn btn-secondary', 'type' => 'submit', 'title' => 'Atualizar Usuário']) !!}
            <a href="{{ route('home') }}" class="btn btn-secondary" title="Cancelar">Cancelar</a>
        {!! Form::close() !!}
    </div>
    <div class="col-lg-4"></div>

    @endsection
</div>
