<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function create()
    {
        return view('admin/users/create');
    }

    public function store()
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'), 
            'password' => bcrypt(request('password')),
            'is_admin' => 1,
        ]);

        return redirect('/admin/users');
    }

    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $user->update([
            'name' => request('name'),
            'email' => request('email'), 
            'password' => bcrypt(request('password')),
            'is_admin' => request('is_admin'),
        ]);

        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/users');
    }

    public function show(User $user)
    {
        return view('admin/users/show', ['user' => $user]);
    }
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = DB::table('users')->where('id', 'like', '%'.$search.'%')->first();
        return view('admin/users', ['users' => $users]);
    }
}
