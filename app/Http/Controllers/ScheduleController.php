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
            'schedule' => 'required|string|max:2000',
        ]);

        $course = Course::findOrFail($courseId);

        $course->schedules()->create([
            'content' => $validated['schedule'],
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
