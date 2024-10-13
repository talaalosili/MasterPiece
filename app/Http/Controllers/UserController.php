<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'nullable|string', 
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|unique:users,phone', 
            'role' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
    
        $path = null; 
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/image/';
            $file->move(public_path($path), $filename);
        }

        
    
        User::create([
            'fullname' => $validated['fullname'], 
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $validated['role'],
            'image' => $path ? $path . $filename : null, 
        ]);

       

    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'fullname' => 'nullable|string', 
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|unique:users,phone,' . $user->id,
            'role' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);
    
        if ($request->hasFile('image')) {
            if ($user->image && File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
    
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/image/';
            $file->move(public_path($path), $filename);
    
            $user->image = $path . $filename;
        }
    
        $user->update([
            'fullname' => $validated['fullname'] ?? $user->fullname, 
            'email' => $validated['email'],
            'phone' => $request->phone ?? $user->phone, 
            'role' => $validated['role'],
        ]);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    

    

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.show', compact('user'));
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    
    if ($user->image) {
        $imagePath = public_path('uploads/users/' . $user->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); 
        }
    }
    
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}

}
