@extends('layouts.form')

@section('formulario')

    <div class="container mt-5">
        <div class="col d-flex flex-column text-center auth">
            <h2 class="fw-light mb-5">{{ $titulo }}</h2>
            <form action="{{ route('login.store') }}" method="post" class="mb-3 d-flex flex-column align-items-center">
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                    <label for="email" class="form-label fw-light">E-mail</label>
                    <input 
                        type="email" 
                        name="email" 
                        class="rounded auth__input form-control text-light">

                    <small class="text-danger">{{ $errors->first('password') }}</small>
                    @error('erro')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="password" class="form-label fw-light">Senha</label>
                    <input type="password" name="password" class="rounded form-control auth__input text-light">
                
                <button class="btn btn-primary">Logar</button>
            </form>
            <a href="{{ route('cadastro.create') }}" class="text-decoration-none ">Ainda nao tenho cadastro</a>
        </div>
    </div>

@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var chave = '{{ Session::get("mensagem") }}'
    
    if ('{{ Session::has("mensagem") }}') {
        Swal.fire({
            icon: 'success',
            title: chave
        })
    }
</script>
@endsection