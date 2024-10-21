<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesSeeder extends Seeder
{
    public function run()
    {
        $courses = Course::all();

        $schedules = [
            [
                'content' => 'Базовый курс "Психологическое консультирование", очно-заочная форма обучения',
            ],
            [
                'content' => 'Наш курс комбинированный и в нем есть очные встречи, за все время обучения их 6.',
            ],
            [
                'content' => 'Длительность - 3 семестра (1,5 года)',
            ],
            [
                'content' => 'Каждый семестр состоит из 2 очных "трехдневок" в Москве - очные занятия проходят в нашей лаборатории',
            ],
            [
                'content' => 'Трехдневка - занятия с 10:00 до 22:00 три дня подряд - пятница, суббота. воскресенье',
            ],
            [
                'content' => 'Старт обучения с онлайн блока',
            ],
            [
                'content' => 'по средам с 22 января',
            ],
            [
                'content' => '14 - 16 марта 2025',
            ],
            [
                'content' => '13 - 15 июня 2025',
            ],
            [
                'content' => 'К вводному курсу можно приступить прямо сейчас.',
            ],
            [
                'content' => 'В рамках вводного курса состоятся 2 онлайн вебинара:',
            ],
            [
                'content' => 'По всем вопросам, куратор онлайн программ МПЛ12,',
            ],
            [
                'content' => '+7 925 506 17 12, Татьяна',
            ],
        ];

        foreach ($courses as $course) {
            foreach ($schedules as $schedule) {
                DB::table('schedules')->insert([
                    'course_id' => $course->id,
                    'content' => $schedule['content'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
