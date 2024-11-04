<?php

namespace App\Http\Controllers;

use App\Models\Videocourse;
use App\Models\Phone;
use App\Models\GeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideocourseController extends Controller
{
    public function index()
    {
        $videocourses = Videocourse::latest()->paginate(5);

        return view('profile.videocourses.videocourses', compact('videocourses'));
    }

    public function showAll()
    {
        $videocourses = Videocourse::latest()->paginate(9);
        $phones = Phone::all();
        $info = GeneralInfo::first();

        return view('videocourses', compact('videocourses', 'phones', 'info'));
    }

    public function destroy(Videocourse $videocourse)
    {
        if ($videocourse->image_path) {
            Storage::disk('public')->delete($videocourse->image_path);
        }
        $videocourse->delete();

        return redirect()->route('videocourses')->with([
            'status' => 'success',
            'message' => 'Видеокурс удален!',
        ]);
    }

    public function edit(Videocourse $videocourse)
    {
        return view('profile.videocourses.edit-course', compact('videocourse'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|max:1024',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Videocourse::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'link' => $validated['link'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('videocourses')->with([
            'status' => 'success',
            'message' => 'Видеокурс успешно создан!',
        ]);
    }

    public function update(Request $request, Videocourse $videocourse)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            if ($videocourse->image_path) {
                Storage::disk('public')->delete($videocourse->image_path);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $videocourse->image_path = $imagePath;
        }

        $videocourse->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'link' => $validated['link'],
            'image_path' => $videocourse->image_path ?? null,
        ]);


        return redirect()->route('videocourses')->with([
            'status' => 'success',
            'message' => 'Видеокурс успешно обновлен!',
        ]);
    }
}
