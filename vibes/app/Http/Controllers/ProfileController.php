<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Mise à jour des informations du profil
        $user->fill([
            'name' => $request->input('name'),
            'pseudo' => $request->input('pseudo'), // Ajout du pseudo
            'email' => $request->input('email'),
            'bio' => $request->input('bio'), // Mise à jour de la bio
        ]);

        // Réinitialisation de la vérification email si modifié
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Gestion de l'upload de la photo de profil
        if ($request->hasFile('profile_photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->profile_photo && Storage::exists('public/' . $user->profile_photo)) {
                Storage::delete('public/' . $user->profile_photo);
            }

            // Stocker la nouvelle image et mettre à jour le champ
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        // Sauvegarde des changements
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        // Supprimer l'image de profil de l'utilisateur avant suppression du compte
        if ($user->profile_photo && Storage::exists('public/' . $user->profile_photo)) {
            Storage::delete('public/' . $user->profile_photo);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
