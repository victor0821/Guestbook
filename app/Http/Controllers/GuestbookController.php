<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestbookController extends Controller
{
    public function index()
    {
        $entries = Guest::all();
        return view('index1', compact('entries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        Guest::create($request->all());

        return redirect()->route('guestbook.index')->with('success', '¡Mensaje enviado!');
    }
}
