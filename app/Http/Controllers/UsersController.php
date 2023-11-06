<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('status', 'DESC')->get();

        return view('equipe.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('equipe.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        User::findOrFail($request->id)->update($request->all());

        return redirect('equipe');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->status = false;
        $user->save();

        return redirect('equipe')->with('user', $user);
    }
}
