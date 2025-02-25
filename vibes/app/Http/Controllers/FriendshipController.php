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

        // Vérifier si une demande existe déjà
        if (Friendship::where('sender_id', Auth::id())->where('receiver_id', $receiverId)->exists()) {
            return back()->with('error', 'Demande déjà envoyée.');
        }

        // Créer une demande d'ami
        Friendship::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Demande d\'ami envoyée.');
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
}
