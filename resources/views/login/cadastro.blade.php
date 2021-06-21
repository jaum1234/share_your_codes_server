@extends('layout-form')

@section('formulario')
<div class="position-absolute top-50 start-50 translate-middle  text-center p-4 formulario">
    <form action="/cadastro/do" method="post" class="mb-3">
        @csrf
        @if ($errors->all())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="d-flex flex-column">
            <label for="email" class="label-formulario">E-mail</label>
            <input type="text" name="email" class="rounded input-formulario">
            <label for="nome" class="label-formulario">Nome completo</label>
            <input type="text" name="nome" class="rounded input-formulario">
            <label for="nomeUsuario" class="label-formulario">Nome de usuário</label>
            <input type="text" name="nomeUsuario" class="rounded input-formulario">
            <label for="senha" class="label-formulario">Senha</label>
            <input type="password" name="senha" class="rounded input-formulario">
            <label for="confirmar_senha" class="label-formulario">Confirmar senha</label>
            <input type="password" name="confirmar_senha" class="rounded input-formulario">
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar-se</button>
    </form>
    <a href="/login">Ja possuo cadastro</a>

</div>
@endsection