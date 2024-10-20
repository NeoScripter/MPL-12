<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request, $courseId)
    {
        $validated = $request->validate([
            'schedule' => 'required|string|max:255',
        ]);

        // Find the course by its ID
        $course = Course::findOrFail($courseId);

        // Create a new schedule and associate it with the course
        $course->schedules()->create([
            'content' => $validated['schedule'], // Use 'schedule' field for content
        ]);

        return redirect()->back();
    }

    public function destroy($scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);

        $schedule->delete();

        return redirect()->back();
    }
}
