<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\Auth;

class GuestbookController extends Controller
{
    public function index()
    {
        $entries = Guest::with('user')->latest()->get();
        return view('index1', compact('entries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $data = [
            'message' => $request->message,
        ];

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
            $data['name'] = Auth::user()->name;
            $data['email'] = Auth::user()->email;
        } else {
            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email',
            ]);
            $data['name'] = $request->name;
            $data['email'] = $request->email;
        }

        Guest::create($data);

        return redirect()->route('guestbook.index')->with('success', '¡Mensaje enviado!');
    }
}
