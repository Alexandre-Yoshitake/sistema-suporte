@extends('layouts.app')


@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="col-md-5 form-group">
            <label class="form-label" for="email">E-mail</label>
            <input class="form-control" type="email" id="email" name="email" :value="old('email')" required autofocus>
        </div>

        <div class="col-md-5 form-group">
            <label class="form-label" for="password">Senha</label>
            <input class="form-control" type="password" id="password" name="password" :value="old('password')" required>
        </div>

        <!-- Remember Me -->
        <div class="d-flex mt-4">
            <label for="remember_me" class="inline-flex items-center m-2">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600">Lembre de mim</span>
            </label>

        </div>

        <div class="d-flex">
            <div class="m-3">
                <button class="btn btn-dark">
                    Entrar
                </button>
                <a href="/" class="btn btn-outline-dark">
                    Voltar
                </a>
            </div>
            <div class="mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
