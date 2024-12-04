<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\GeneralInfo;
use App\Models\Phone;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

/*     public function index()
    {
        $courses = Course::latest()->paginate(5);

        return view('profile.courses.dashboard', compact('courses'));
    }
 */
    public function index($search = null)
    {
        $courses = Course::latest();

        if ($search) {
            $courses->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $courses = $courses->paginate(6);

        return view('profile.courses.dashboard', compact('courses'));
    }

    public function showAll()
    {
        $courses = Course::select(['id', 'image_path', 'start_date', 'start_time', 'format', 'content', 'title'])
        ->with('teachers')
        ->latest()
        ->paginate(9);

        return view('index', compact('courses'));
    }


    public function show(Course $course)
    {
        $course->load('schedules');
        return view('show-course', compact('course'));
    }

    public function destroy(Course $course)
    {
        if ($course->image_path) {
            Storage::disk('public')->delete($course->image_path);
        }
        $course->delete();

        return redirect()->route('dashboard')->with([
            'status' => 'success',
            'message' => 'Курс удален!',
        ]);
    }

    public function edit(Course $course)
    {
        $course->load('schedules');
        $teachers = Teacher::all();
        $courseTeachers = $course->teachers->pluck('id')->toArray();
        return view('profile.courses.edit-course', compact('course', 'teachers', 'courseTeachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'date' => 'required|string',
            'time' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string|max:60000',
            'price' => 'nullable|string',
            'reviews' => 'nullable|string',
            'image' => 'nullable|image|max:1024',
            'teachers' => 'nullable|array',
            'teachers.*' => 'exists:teachers,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $course = Course::create([
            'title' => $validated['title'],
            'format' => $validated['format'],
            'start_date' => $validated['date'],
            'start_time' => $validated['time'],
            'description' => $validated['description'],
            'content' => $validated['content'],
            'price' => $validated['price'],
            'reviews' => $validated['reviews'],
            'image_path' => $imagePath,
        ]);

        if (!empty($validated['teachers'])) {
            $course->teachers()->attach($validated['teachers']);
        }

        return redirect()->route('dashboard')->with([
            'status' => 'success',
            'message' => 'Курс успешно создан!',
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'date' => 'required|string',
            'time' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string|max:60000',
            'price' => 'nullable|string',
            'reviews' => 'nullable|string',
            'image' => 'nullable|image|max:1024',
            'teachers' => 'nullable|array',
            'teachers.*' => 'exists:teachers,id',
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
            'start_time' => $validated['time'],
            'description' => $validated['description'],
            'content' => $validated['content'],
            'price' => $validated['price'],
            'reviews' => $validated['reviews'],
            'image_path' => $course->image_path ?? null,
        ]);

        $course->teachers()->sync($validated['teachers'] ?? []);

        return redirect()->route('dashboard')->with([
            'status' => 'success',
            'message' => 'Курс успешно обновлен!',
        ]);
    }
}
