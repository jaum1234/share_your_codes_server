@extends('layouts.form')

@section('formulario')
    <div class="container mt-5">
        <div class="col d-flex flex-column text-center">
            <h2 class="fw-light mb-5">{{ $titulo }}</h2>
            <form action="/cadastro/do" method="post" class="mb-3 d-flex flex-column align-items-center">
                @csrf
                <small class="text-danger">{{ $errors->first('email') }}</small>
                    <label for="email" class="form-label fw-light">E-mail</label>
                    
                    <input 
                        type="text" 
                        name="email" 
                        class="rounded form-control text-light auth__input">
                        
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    <label for="name" class="form-label fw-light">Nome completo</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="rounded form-control text-light auth__input">
                        
                        <small class="text-danger">{{ $errors->first('nickname') }}</small>
                    <label for="nickname" class="form-label fw-light">Nome de usuário</label>
                    <input 
                        type="text" 
                        name="nickname" 
                        class="rounded form-control text-light auth__input">
                        
                        <small class="text-danger" role="alert">{{ $errors->first('password') }}</small>
                    <label for="password" class="form-label fw-light">Senha</label>
                    <input 
                        type="password" 
                        name="password" 
                        class="rounded form-control text-light auth__input">
                        
                        
                    <label for="password_confirmation" class="form-label fw-light">Confirmar senha</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        class="rounded form-control text-light auth__input">
                
                <button class="btn btn-primary" type="submit">Cadastrar-se</button>
            </form>
            <a href="{{ route('form.login') }}" class="text-decoration-none text-center pb-3">Ja possuo cadastro</a>
        </div>
    </div>
@endsection