<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Muestra el formulario de edición de perfil.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Actualiza la información del perfil del usuario.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'favorite_tcg' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Máximo 2MB
        ]);

        // 2. Actualizar campos de texto
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->favorite_tcg = $request->favorite_tcg;

        // 3. Gestión del Avatar (si se ha subido uno nuevo)
        if ($request->hasFile('avatar')) {
            
            // Borrar el avatar antiguo si existe para no llenar el server de basura
            if ($user->avatar && File::exists(public_path('img/avatars/' . $user->avatar))) {
                File::delete(public_path('img/avatars/' . $user->avatar));
            }

            // Guardar el nuevo
            $imageName = 'avatar_' . $user->id . '_' . time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('img/avatars'), $imageName);
            
            // Guardar el nombre del archivo en la BD
            $user->avatar = $imageName;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', '¡Perfil actualizado, Duelista!');
    }
}