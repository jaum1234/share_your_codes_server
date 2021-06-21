@extends('mobile.layout-form')

@section('formulario')
    <div class="container mt-5">
        <div class="col d-flex flex-column text-center">
            <h2 class="fw-light mb-5">{{ $titulo }}</h2>
            <form action="/cadastro/do" method="post" class="mb-3 d-flex flex-column align-items-center">
                @csrf
                @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                
                    <label for="email" class="form-label fw-light">E-mail</label>
                    <input 
                        type="text" 
                        name="email" 
                        class="rounded form-control text-light input-formulario">
                    <label for="nome" class="form-label fw-light">Nome completo</label>
                    <input 
                        type="text" 
                        name="nome" 
                        class="rounded form-control text-light input-formulario">
                    <label for="nomeUsuario" class="form-label fw-light">Nome de usuário</label>
                    <input 
                        type="text" 
                        name="nomeUsuario" 
                        class="rounded form-control text-light input-formulario">
                    <label for="senha" class="form-label fw-light">Senha</label>
                    <input 
                        type="password" 
                        name="senha" 
                        class="rounded form-control text-light input-formulario">
                    <label for="confirmar_senha" class="form-label fw-light">Confirmar senha</label>
                    <input 
                        type="password" 
                        name="confirmar_senha" 
                        class="rounded form-control text-light input-formulario">
                
                <button class="btn btn-primary" type="submit">Cadastrar-se</button>
            </form>
            <a href="/login" class="text-decoration-none text-center pb-3">Ja possuo cadastro</a>
        </div>
    </div>
@endsection