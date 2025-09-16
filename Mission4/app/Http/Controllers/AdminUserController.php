<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    // READ
    public function index(Request $request){

        $query = User::query();
        
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('USERNAME', 'like', "%{$search}%")
                ->orWhere('FULL_NAME', 'like', "%{$search}%")
                ->orWhere('ROLE', 'like', "%{$search}%");
        }

        $users = $query->orderBy('USER_ID')->get();

        return view('admin.users.index', compact('users'));
    }

    // CREATE
    public function create(){
        return view('admin.users.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'USERNAME' => 'required|string|max:50|unique:USERS,USERNAME',
            'FULL_NAME' => 'required|string|max:100',
            'PASSWORD' => 'required|string|min:6|confirmed',
            'ROLE' => 'required|in:admin,student',
            'PROFILE_IMAGE' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('PROFILE_IMAGE')) {
            $data['PROFILE_IMAGE'] = $request->file('PROFILE_IMAGE')->store('profiles', 'public');
        }

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    // SHOW
    public function show(User $user)
    {
        $user->load('student.takes.course'); // eager load
        return view('admin.users.show', compact('user'));
    }

    // EDIT
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // UPDATE
    public function update(Request $request, User $user)
    {
        $request->validate([
            'USERNAME' => 'required|string|max:50|unique:USERS,USERNAME,' . $user->USER_ID . ',USER_ID',
            'FULL_NAME' => 'required|string|max:100',
            'PASSWORD' => 'nullable|string|min:6|confirmed',
            'ROLE' => 'required|in:admin,student',
            'PROFILE_IMAGE' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->filled('PASSWORD')) {
            $data['PASSWORD'] = bcrypt($request->PASSWORD);
        } else {
            unset($data['PASSWORD']);
        }

        if ($request->hasFile('PROFILE_IMAGE')) {
            $data['PROFILE_IMAGE'] = $request->file('PROFILE_IMAGE')->store('profiles', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    // DELETE
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
