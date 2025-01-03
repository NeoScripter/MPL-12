<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $education = '<h3>Психолог-консультант и врач-психотерапевт, работаю с 2004 года. Автор книг об эмоциях, фобиях, панических атаках и книг для родителей.</h3>
        <p>Чаще всего ко мне обращаются, чтобы:<br>
        – поднять самооценку, научиться себя любить,<br>
        – разобраться с эмоциями (страхи, паника, раздражительность, горе, ревность и другие),<br>
        – улучшить отношения с партнером или детьми.</p>

        <h3>В своей работе я в основном использую краткосрочные проблемно-ориентированные методы, психодраму (монодраму) и телесно-ориентированную терапию.</h3>

        <h3>Образование:</h3>
        <p>Врач-психотерапевт (ИГМУ, 2003),<br>
        Психолог-консультант (ИПКРО, 2004),<br>
        Психолог-консультант (НИИСПиПРЛ, 2010).</p>

        <h3>Специализации:</h3>
        <p>Сказкотерапия (НИИСПиПРЛ, 2010),<br>
        Работа психолога-консультанта с психической травмой (МПЛ12, 2013),<br>
        Введение в психодраму (МИГиП, 2013),<br>
        Психотерапия психосоматических расстройств (АТОП, 2014),<br>
        Гештальт и психодрама: Краски жизни (НОЧУ «ИГиП», 2016),<br>
        Комплексный подход в работе с психологической травмой и кризисными состояниями (НП ВПО «ИМСГС», 2016),<br>
        Базовый курс психодрамы (МИГиП, РАП, 2016),<br>
        и еще множество других тренингов и программ.</p>
        ';

        $quote = 'Я искренне считаю, что основная задача психотерапии – помочь человеку научиться любить себя безусловно. Это включает и бережное отношение к себе, и умение себя защищать, и умение себя организовать, и вовремя о себе позаботиться, и вовремя включить волю, и еще многое другое. Это как найти внутри себя бесконечный источник ресурсов, который не зависит от других людей, обстоятельств жизни и который навсегда останется с вами.';


        return [
            'name' => fake()->name(),
            'main_image_path' => collect(glob(storage_path('app/public/teachers/*.*')))
                ->map(fn($path) => 'teachers/' . basename($path))
                ->random(),
            'secondary_image_path' => collect(glob(storage_path('app/public/teachers/*.*')))
            ->map(fn($path) => 'teachers/' . basename($path))
            ->random(),
            'quote' => $quote,
            'whatsapp' => fake()->phoneNumber(),
            'telegram' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'category' =>  $this->faker->randomElement(['Супервизор', 'Консультант', 'Выпускник']),
            'education' => $education,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
