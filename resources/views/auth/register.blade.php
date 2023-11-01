@extends('layouts.app')


@section('content')
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-4">Cadastrar Usuário</h1>
    </div>
    <div class="container-fluid col-md-10">
        <form method="POST" action="{{ route('register') }}" class="col-md-10">
            @csrf

            <div class="d-flex justify-content-around mb-4">
                <div class="form-group col-md-5">
                    <label class="form-label" for="name">Nome</label>
                    <input class="form-control" type="text" id="name" name="name" required autofocus>
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="cpf">CPF</label>
                    <input class="form-control" type="text" id="cpf" name="cpf" maxlength="14"
                        OnKeyPress="formatar('###.###.###-##',this)" required autofocus>
                </div>
            </div>
            <div class="d-flex justify-content-around mb-4">
                <div class="form-group col-md-5">
                    <label class="form-label" for="data_nascimento">Data de Nascimento</label>
                    <input class="form-control" type="date" id="data_nascimento" name="data_nascimento" required
                        autofocus>
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="celular">Celular</label>
                    <input class="form-control" type="text" id="celular" name="celular" maxlength="15"
                        OnKeyPress="formatar('(##) #####-####',this)" required autofocus>
                </div>
            </div>
            <div class="d-flex justify-content-around mb-4">
                <div class="form-group col-md-5">
                    <label class="form-label" for="email">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" required>
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="permission">Perfil</label>
                    <select class="form-select" name="permission" id="permission">
                        <option value="admin">Administrador</option>
                        <option value="colaborador">Colaborador</option>
                        <option value="cliente">Cliente</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-around mb-4">
                <div class="form-group col-md-5">
                    <label class="form-label" for="password">Senha</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="form-group col-md-5">
                    <label class="form-label" for="password_confirmation">Confirme a Senha</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                        required>
                </div>
            </div>

            <div class="form-group m-4">
                <button class="btn btn-success">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
    <script>
        function formatar(mascara, valor) {
            let i = valor.value.length;
            let saida = '#';
            let texto = mascara.substring(i);
            while (texto.substring(0, 1) != saida && texto.length) {
                valor.value += texto.substring(0, 1);
                i++;
                texto = mascara.substring(i);
            }
        }
    </script>
@endsection
