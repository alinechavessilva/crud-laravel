@extends('admin.master.layout')

@section('content')
<div class="row">
    <div class='search-clima'>
        <form method='GET' class='search-form' action='{{ route('searchClima') }}'>
            <input type="search" name='search' class="form-control" placeholder='Pesquise aqui nome da cidade...' 
                    value="">
            <button type="submit" class="btn btn-primary">Cidade</button>
        </form>
    </div>
    <div class="clima"> 
        
        <span>{{ $clima->name .' , '  }}</span>
        <span>{{ $clima->sys->country }}</span>
        <span>{{ date(', l , d M Y - ') }}</span>
        <span>{{ $clima->main->temp .'°c ' }}</span>
        @foreach ($clima->weather as $item)
            <span>{{ ' , '.$item->description. ' , '  }}</span>
        @endforeach
        <span>{{ $clima->main->temp_min .'°c / '. $clima->main->temp_min . '°c' }}</span>
    </div>
    
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-xs-12">
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
        <div class='title-table'>
            <h2 class="">Cadastro </h2>
            <form method='GET' class='search-form' action='{{ route('search') }}'>
                {{-- {{ csrf_field() }} --}}
                <input type="search" name='search' class="form-control" placeholder='Pesquise aqui...' 
                        value="{{ Request::get('search') }}">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>
        <table class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    <th>Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->created_at }}</td>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->cpf_cnpj }}</td>
                    <td>{{ $usuario->telefone }}</td>
                    <td>{{ $usuario->mensagem }}</td>
                    <td>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ação
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('edit', $usuario->id) }}">Editar</a></li>
                            <li><a class="dropdown-item" href="{{ route('delete', $usuario->id)}}">Delete</a></li>
                        </ul>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="footer-table">
            <a href="{{ route('index') }}" class="btn btn-primary" title="Novo Usuário" style="width: 100px">Novo</a>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>



@endsection


