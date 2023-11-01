<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'min:14', 'max:14', 'unique:users'],
            'data_nascimento' => ['required', 'date'],
            'celular' => ['required', 'string', 'min:15', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'permission' => ['required', 'string', 'max:50'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $request->permission,
        ])->givePermissionTo($request->permission);

        event(new Registered($user));

        if (Auth::user()) {
            return redirect('login');
        } else {
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
