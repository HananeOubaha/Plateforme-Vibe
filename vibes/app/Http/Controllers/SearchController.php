<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $users = \App\Models\User::where('name', 'like', "%$query%")
        ->orWhere('email', 'like', "%$query%")
        ->get();
        return view('search.index', compact('users'));
    }
}

