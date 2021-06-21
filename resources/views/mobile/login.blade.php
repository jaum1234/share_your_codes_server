@extends('mobile.layout-form')

@section('formulario')
    <div class="container mt-5">
        <div class="col d-flex flex-column text-center">
            <h2 class="fw-light mb-5">{{ $titulo }}</h2>
            <form action="/login/do" method="post" class="mb-3 d-flex flex-column align-items-center">
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
                
                    <label for="email" class="form-label fw-light">E-mail</label>
                    <input 
                        type="text" 
                        name="email" 
                        class="rounded input-formulario form-control text-light">
                    <label for="senha" class="form-label fw-light">Senha</label>
                    <input type="password" name="senha" class="rounded form-control input-formulario text-light">
                
                <button class="btn btn-primary">Logar</button>
            </form>
            <a href="/cadastro" class="text-decoration-none ">Ainda nao tenho cadastro</a>
        </div>
    </div>
@endsection