<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function sendRequest($receiverId)
    {
        $receiver = User::findOrFail($receiverId);

        if (Friendship::where('sender_id', Auth::id())->where('receiver_id', $receiverId)->exists()) {
            return back()->with('error', 'Demande déjà envoyée.');
        }

        Friendship::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Demande d\'ami envoyée.');
    }

    public function receivedRequests()
    {
        $requests = Friendship::where('receiver_id', Auth::id())
                              ->where('status', 'pending')
                              ->with('sender') // Vérifier que la relation existe
                              ->get();
    
        return view('friend-requests', compact('requests')); 
    }
    
    

    public function acceptRequest($id)
    {
        $friendship = Friendship::findOrFail($id);
        if ($friendship->receiver_id != Auth::id()) {
            return back()->with('error', 'Action non autorisée.');
        }

        $friendship->update(['status' => 'accepted']);
        return back()->with('success', 'Demande d\'ami acceptée.');
    }

    public function declineRequest($id)
    {
        $friendship = Friendship::findOrFail($id);
        if ($friendship->receiver_id != Auth::id()) {
            return back()->with('error', 'Action non autorisée.');
        }

        $friendship->delete();
        return back()->with('success', 'Demande d\'ami refusée.');
    }

    public function friendsList()
    {
        $friends = Friendship::where(function ($query) {
            $query->where('sender_id', Auth::id())->orWhere('receiver_id', Auth::id());
        })
        ->where('status', 'accepted')
        ->with(['sender', 'receiver'])
        ->get();

        return view('friends.list', compact('friends'));
    }
}
