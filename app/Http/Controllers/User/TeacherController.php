<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(9);

        return view('teachers', compact('teachers'));
    }

    public function showAll()
    {
        $teachers = Teacher::all();
        $phones = Phone::all();

        return view('user-teachers', compact('teachers', 'phones'));
    }

    public function show(Teacher $teacher)
    {
        $teacher->load('articles');
        $phones = Phone::all();
        return view('show-teacher', compact('teacher', 'phones'));
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->mainImagePath) {
            Storage::disk('public')->delete($teacher->mainImagePath);
        }
        if ($teacher->secondaryImagePath) {
            Storage::disk('public')->delete($teacher->secondaryImagePath);
        }
        $teacher->delete();

        return redirect()->route('teachers')->with('status', 'teacher-deleted');
    }

    public function edit(Teacher $teacher)
    {
        $teacher->load('articles');
        return view('edit-teacher', compact('teacher'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quote' => 'nullable|string',
            'education' => 'nullable|string|max:10000',
            'main_image' => 'nullable|image|max:1024',
            'secondary_image' => 'nullable|image|max:1024',
        ]);

        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('images', 'public');
        }

        $secondaryImagePath = null;
        if ($request->hasFile('secondary_image')) {
            $secondaryImagePath = $request->file('secondary_image')->store('images', 'public');
        }

        Teacher::create([
            'name' => $validated['name'],
            'quote' => $validated['quote'],
            'education' => $validated['education'],
            'main_image_path' => $mainImagePath,
            'secondary_image_path' => $secondaryImagePath,
        ]);

        return redirect()->route('teachers')->with('status', 'teacher-created');
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quote' => 'nullable|string',
            'education' => 'nullable|string|max:10000',
            'main_image' => 'nullable|image|max:1024',
            'secondary_image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('main_image')) {
            if ($teacher->main_image_path) {
                Storage::disk('public')->delete($teacher->main_image_path);
            }

            $imagePath = $request->file('main_image')->store('images', 'public');
            $teacher->main_image_path = $imagePath;
        }

        if ($request->hasFile('secondary_image')) {
            if ($teacher->secondary_image_path) {
                Storage::disk('public')->delete($teacher->secondary_image_path);
            }

            $imagePath = $request->file('secondary_image')->store('images', 'public');
            $teacher->secondary_image_path = $imagePath;
        }

        $teacher->update([
            'name' => $validated['name'],
            'quote' => $validated['quote'],
            'education' => $validated['education'],
            'main_image_path' => $teacher->main_image_path ?? null,
            'secondary_image_path' => $teacher->secondary_image_path ?? null,
        ]);


        return redirect()->route('teachers')->with('status', 'teacher-updated');
    }
}
