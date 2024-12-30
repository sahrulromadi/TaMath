<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('user.pages.profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|max:12|confirmed',
            'picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        // menggunakan variabel dataUpdated agar password tidak di update ketika tidak diisi
        $dataUpdated = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        // ubah password
        if ($request->filled('password')) {
            // masukkan ke $dataUpdated
            $dataUpdated['password'] = Hash::make($validated['password']);
        }

        // update picture
        if ($request->hasFile('picture')) {
            // hapus gambar lama jika ada
            if ($user->picture && Storage::disk('public')->exists($user->picture)) {
                // hapus gambar di disk public
                Storage::disk('public')->delete($user->picture);
            }

            // simpan ke storage dan database (path file nya -> profile_pictures/id/hash img)
            $dataUpdated['picture'] = $request->file('picture')->store('profile_pictures/' . $user->id, 'public');
        }

        // update
        $user->update($dataUpdated);

        return back()->with('success', 'Sukses Update Profile');
    }
}
