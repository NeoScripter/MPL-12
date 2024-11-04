<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralInfo;
use App\Models\Phone;
use App\Models\Psychologist;
use Illuminate\Support\Facades\Storage;

class PsychologistController extends Controller
{
    public function index()
    {
        $psychologists = Psychologist::latest()->paginate(9);

        return view('profile.psychologists.psychologists', compact('psychologists'));
    }

    public function showAll()
    {
        $psychologists = Psychologist::all();
        $phones = Phone::all();
        $info = GeneralInfo::first();

        return view('psychologists', compact('psychologists', 'phones', 'info'));
    }

    public function show(Psychologist $psychologist)
    {
        $phones = Phone::all();
        $info = GeneralInfo::first();

        return view('show-shrink', compact('psychologist', 'phones', 'info'));
    }

    public function destroy(Psychologist $psychologist)
    {
        if ($psychologist->mainImagePath) {
            Storage::disk('public')->delete($psychologist->mainImagePath);
        }
        $psychologist->delete();

        return redirect()->route('psychologists')->with([
            'status' => 'success',
            'message' => 'Психолог удален!',
        ]);
    }

    public function edit(Psychologist $psychologist)
    {
        return view('profile.psychologists.edit-psychologist', compact('psychologist'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quote' => 'required|string',
            'education' => 'required|string|max:10000',
            'main_image' => 'nullable|image|max:1024',
        ]);

        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('images', 'public');
        }

        Psychologist::create([
            'name' => $validated['name'],
            'quote' => $validated['quote'],
            'education' => $validated['education'],
            'main_image_path' => $mainImagePath,
        ]);

        return redirect()->route('psychologists')->with([
            'status' => 'success',
            'message' => 'Психолог создан!',
        ]);
    }

    public function update(Request $request, Psychologist $psychologist)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quote' => 'required|string',
            'education' => 'required|string|max:10000',
            'main_image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('main_image')) {
            if ($psychologist->main_image_path) {
                Storage::disk('public')->delete($psychologist->main_image_path);
            }

            $imagePath = $request->file('main_image')->store('images', 'public');
            $psychologist->main_image_path = $imagePath;
        }

        $psychologist->update([
            'name' => $validated['name'],
            'quote' => $validated['quote'],
            'education' => $validated['education'],
            'main_image_path' => $psychologist->main_image_path ?? null,
        ]);


        return redirect()->route('psychologists')->with([
            'status' => 'success',
            'message' => 'Информация о психологе успешно обновлена!',
        ]);
    }
}
