<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index() {
        $courses = Course::latest()->paginate(2);

        return view('dashboard', compact('courses'));
    }

    public function showAll() {
        $courses = Course::latest()->paginate(2);

        return view('index', compact('courses'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'content' => 'nullable|string|max:10000', // Updated validation
            'image' => 'nullable|image|max:1024',
        ]);

        // Handle image upload if it exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create a new course with the validated data
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
}
