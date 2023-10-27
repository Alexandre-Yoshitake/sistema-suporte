@extends('layout.app')

@section('content')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label class="form-label" for="password">Senha</label>
            <input class="form-control" type="password" id="password" name="password" required>
        </div>

        <div class="flex justify-end mt-4">
            <button class="btn btn-dark">
                Confirmar
            </button>
        </div>
    </form>
@endsection
