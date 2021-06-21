@extends('layout-form')

@section('formulario')
    
        <form action="/login/do" method="post" class="mb-3">
            @csrf
            @if ($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if (!empty($mensagem))
                <div class="alert alert-success">
                    {{ $mensagem }}
                </div>
            @endif
            <div class="d-flex flex-column ">
                <label for="email" class="label-formulario">E-mail</label>
                <input type="text" name="email" class="rounded input-formulario">
                <label for="senha" class="label-formulario">Senha</label>
                <input type="password" name="senha" class="rounded input-formulario">
            </div>
            <button class="btn btn-primary">Logar</button>
        </form>
        <a href="/cadastro">Ainda nao tenho cadastro</a>
    </div>
@endsection