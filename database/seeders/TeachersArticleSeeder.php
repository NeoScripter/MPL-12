<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $teachers = Teacher::all();

        $articles = [
            [
                'title' => 'Параллельные процессы в супервизии',
                'link' => '',
            ],
            [
                'title' => 'Александр Мусихин. Выученная беспомощность. Техника самопомощи. Запись прямого эфира',
                'link' => '',
            ],
            [
                'title' => 'Супервизор - это как бабушка и дедушка!',
                'link' => '',
            ],
            [
                'title' => 'Должен и нельзя. Как психика воспринимает запреты и долженствования',
                'link' => '',
            ],
            [
                'title' => 'Конференция: Новое внутри и снаружи',
                'link' => '',
            ],
        ];

        foreach ($teachers as $teacher) {
            foreach ($articles as $article) {
                DB::table('articles')->insert([
                    'teacher_id' => $teacher->id,
                    'title' => $article['title'],
                    'link' => $article['link'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
