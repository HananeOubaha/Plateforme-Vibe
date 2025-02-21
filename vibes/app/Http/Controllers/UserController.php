<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer la recherche (pseudo ou email)
        $search = $request->input('search');

        // Filtrer les utilisateurs selon la recherche
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('pseudo', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->paginate(10); // Paginer les résultats (10 par page)

        return view('users.index', compact('users', 'search'));
    }
}
