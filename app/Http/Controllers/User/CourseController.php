<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::latest()->paginate(8);

        return view('dashboard', compact('courses'));
    }

    public function showAll()
    {
        $courses = Course::latest()->paginate(8);
        $phones = Phone::all();

        return view('index', compact('courses', 'phones'));
    }

    public function destroy(Course $course)
    {
        if ($course->image_path) {
            Storage::disk('public')->delete($course->image_path);
        }
        $course->delete();

        return redirect()->route('dashboard')->with('status', 'course-deleted');
    }

    public function edit(Course $course)
    {
        $course->load('schedules');
        return view('edit-course', compact('course'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'date' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string|max:10000',
            'image' => 'nullable|image|max:1024',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Course::create([
            'title' => $validated['title'],
            'format' => $validated['format'],
            'start_date' => $validated['date'],
            'description' => $validated['description'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('status', 'course-created');
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'date' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string|max:10000',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            if ($course->image_path) {
                Storage::disk('public')->delete($course->image_path);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $course->image_path = $imagePath;
        }

        $course->update([
            'title' => $validated['title'],
            'format' => $validated['format'],
            'start_date' => $validated['date'],
            'description' => $validated['description'],
            'content' => $validated['content'],
            'image_path' => $course->image_path ?? null,
        ]);

        return redirect()->route('dashboard')->with('status', 'course-updated');
    }
}
