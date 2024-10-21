<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phones')->insert([
            [
                'number' => '+7(925)441-74-12',
                'email' => 'prog.curator@mospsylab.ru',
                'text' => 'Запись на мероприятия и расстановки Куратор мероприятий для всех желающих, Анна Будни с 10 до 21 (телефон и WhatsApp)Суббота и воскресенье только WhatsApp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '+7(905)540-54-45',
                'email' => 'curator@mospsylab.ru',
                'text' => 'Все вопросы по обучению, Катерина, с 11 до 21, все дни кроме пятницы',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '+7(925)506-17-12',
                'email' => 'online.curator@mospsylab.ru',
                'text' => 'Куратор онлайн обучения и координатор мастерской по работе с подростками и родителями, Татьяна',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '+7(968)930-29-01',
                'email' => null,
                'text' => 'Вопросы по записи на консультации, Анастасия, будни и воскресенье с 10 до 21, суббота - выходной',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '+7(906) 073-00-12',
                'email' => 'softskills@mospsylab.ru',
                'text' => 'Куратор курса Soft Skills, Ольга Будни с 10 до 21 (телефон и WhatsApp). Понедельник выходной.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '+7 (903) 012-12-89',
                'email' => null,
                'text' => 'Административные вопросы, жалобы и предложения, Григорий',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => '+7(977)-108-03-54',
                'email' => 'admin@mospsylab.ru',
                'text' => 'Организационные вопросы Администратор площадки, с 12 до 22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
