<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralInfo;
use App\Models\Phone;
use App\Models\Graduate;
use Illuminate\Support\Facades\Storage;

class GraduateController extends Controller
{
    public function index()
    {
        $graduates = Graduate::latest()->paginate(9);

        return view('profile.graduates.graduates', compact('graduates'));
    }

    public function showAll()
    {
        $graduates = Graduate::all();
        $phones = Phone::all();
        $info = GeneralInfo::first();

        return view('graduates', compact('graduates', 'phones', 'info'));
    }

    public function show(Graduate $graduate)
    {
        $phones = Phone::all();
        $info = GeneralInfo::first();

        return view('show-graduate', compact('graduate', 'phones', 'info'));
    }

    public function destroy(Graduate $graduate)
    {
        if ($graduate->mainImagePath) {
            Storage::disk('public')->delete($graduate->mainImagePath);
        }
        $graduate->delete();

        return redirect()->route('graduates')->with([
            'status' => 'success',
            'message' => 'Выпускник удален!',
        ]);
    }

    public function edit(Graduate $graduate)
    {
        return view('profile.graduates.edit-graduate', compact('graduate'));
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

        Graduate::create([
            'name' => $validated['name'],
            'quote' => $validated['quote'],
            'education' => $validated['education'],
            'main_image_path' => $mainImagePath,
        ]);

        return redirect()->route('graduates')->with([
            'status' => 'success',
            'message' => 'Выпускник создан!',
        ]);
    }

    public function update(Request $request, Graduate $graduate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quote' => 'required|string',
            'education' => 'required|string|max:10000',
            'main_image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('main_image')) {
            if ($graduate->main_image_path) {
                Storage::disk('public')->delete($graduate->main_image_path);
            }

            $imagePath = $request->file('main_image')->store('images', 'public');
            $graduate->main_image_path = $imagePath;
        }

        $graduate->update([
            'name' => $validated['name'],
            'quote' => $validated['quote'],
            'education' => $validated['education'],
            'main_image_path' => $graduate->main_image_path ?? null,
        ]);


        return redirect()->route('graduates')->with([
            'status' => 'success',
            'message' => 'Информация о выпускнике успешно обновлена!',
        ]);
    }
}
