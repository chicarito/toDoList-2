<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('role', '!=', 'admin')->latest()->get();
        $title = 'Home';
        return view('admin.index', compact('user', 'title'));
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required',
        ]);
        $user['password'] = bcrypt($request->password);
        User::create($user);
        return back()->with('status', 'berhasil tambah pengguna!');
    }

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $upd = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'role' => 'required',
        ]);

        if ($request->password) {
            $upd['password'] = bcrypt($request->password);
        } else {
            unset($upd['password']);
        }
        $user->update($upd);
        return redirect('/admin')->with('status', 'berhasil update pengguna');
    }

    public function delete(User $user)
    {
        $user->delete();
        return back()->with('status', 'berhasil hapus pengguna!');
    }
}
