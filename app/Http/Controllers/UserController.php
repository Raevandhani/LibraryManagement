<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();

        $users = User::where('role', 'member')->get();

        return view('users.index', compact('users'));
    }

    public function admin()
    {
        $users = User::where('role', 'admin')->get();

        return view('users.admin', compact('users'));
    }

    public function admin_store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'email' => "required",
            'password' => "required",
        ]);

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'admin',
            ]
        );
        
        return redirect('users.admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'email' => "required",
            'password' => "required",
        ]);

        User::create(
            $request->all()
        );

        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => "required",
            'email' => "required",
            'password' => "required",
        ]);

        $users = User::findorFail($id);
        $users->update($request->all());

        $link_address = $request->headers->get('referer');

        if (Str($link_address, '/users.admin') !== false) {
            return redirect('users.admin'); 
        }

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->route('users.index');
    }
    
}
