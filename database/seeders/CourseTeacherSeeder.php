<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Teacher;

class CourseTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        $teachers = Teacher::all();

        foreach ($courses as $course) {
            $randomTeachers = $teachers->random(7);

            $course->teachers()->attach($randomTeachers);
            $supervisingTeacher = $teachers->random(1)->first();
            $supervisingTeacher->update(['supervised_course_id' => $course->id]);
        }
    }
}
