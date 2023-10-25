@extends('layout.app')


@section('content')
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="col-md-5 form-group">
            <label class="form-label" for="email" name="email">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required
                autofocus>
        </div>

        <div class="col-md-5 form-group">
            <label class="form-label" for="password" name="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="col-md-5 form-group">
            <label class="form-label" for="password_confirmation" name="password_confirmation">Confirmar Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-dark">
                Resetar senha
            </button>
        </div>
    </form>
@endsection
