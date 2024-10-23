<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhoneController extends Controller
{
    public function index()
    {
        $phones = Phone::all();

        return view('profile.phones.phones', compact('phones'));
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();

        return redirect()->route('phones')->with([
            'status' => 'success',
            'message' => 'Контакт удален!',
        ]);
    }

    public function edit(Phone $phone)
    {
        return view('profile.phones.edit-phone', compact('phone'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'text' => 'required|string'
        ]);


        Phone::create([
            'number' => $validated['number'],
            'email' => $validated['email'],
            'text' => $validated['text']
        ]);

        return redirect()->route('phones')->with([
            'status' => 'success',
            'message' => 'Контакт создан!',
        ]);
    }

    public function update(Request $request, Phone $phone)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'text' => 'required|string'
        ]);


        $phone->update([
            'number' => $validated['number'],
            'email' => $validated['email'],
            'text' => $validated['text']
        ]);

        return redirect()->route('phones')->with([
            'status' => 'success',
            'message' => 'Контакт обновлен!',
        ]);
    }
}
