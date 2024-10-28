<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GeneralInfo;

class GeneralInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (GeneralInfo::count() == 0) {
            GeneralInfo::create([
                'menu_names' => json_encode([
                    'Обучение: базовый курс онлайн',
                    'Видео курсы',
                    'SOFT SKILLS Навыки жизни',
                    'Супервизия',
                    'Отзывы',
                    'Текущие мероприятия. Уже стартовали',
                    'Идет набор. Предварительная запись',
                    'Команда психологов МПЛ12',
                    'Доступная помощь. Выпускники МПЛ 12',
                    'Видео'
                ]),
                'address' => 'Новая Басманная 23б с20',
                'whatsapp' => '+79255061712',
                'youtube' => 'https://www.youtube.com/channel/UCziWIpu0l18DX8aqu4_xEVg',
                'vk' => 'https://vk.com/mpl12',
                'telegram_channel' => 'https://t.me/mpl_12',
                'telegram_group' => 'https://t.me/mpl_12',
            ]);
        }
    }
}
