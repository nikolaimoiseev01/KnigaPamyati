<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\FederalDistrict;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Veteran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function makeFedearlDistricts(): void
    {
        $districts = [
            [
                'name' => 'Южный федеральный округ',
                'slug' => 'ufo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Сибирский федеральный округ',
                'slug' => 'sbfo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Уральский федеральный округ',
                'slug' => 'ufo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Южный федеральный округ',
                'slug' => 'urfo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Северо-Кавказский федеральный округ',
                'slug' => 'skfo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Северо-Западный федеральный округ',
                'slug' => 'szfo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Дальневосточный федеральный округ',
                'slug' => 'dfo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Приволжский федеральный округ',
                'slug' => 'pfo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ],
            [
                'name' => 'Центральный федеральный округ',
                'slug' => 'cfo',
                'description' => 'В годы Великой Отечественной войны Урал стал в прямом смысле слова кузницей Победы,обеспечивая фронт боеприпасами, боевой техникой и всем необходимым'
            ]
        ];

        foreach ($districts as $district) {
            $federal_district = FederalDistrict::create($district);
            for ($ci = 1; $ci <= 3; $ci++) { // Создаем несколько компаний
                $company = Company::create([
                    'federal_district_id' => $federal_district->id,
                    'name' => "Компания {$ci} ({$federal_district['slug']})",
                    'date_start' => '1942',
                    'date_end' => 'Н.В.',
                    'description' => 'Описание компании ' . $ci,
                    'main_fact' => 'Основные факты компании ' . $ci,
                    'timeline' => json_encode([
                        [
                            'period' => '3 июня 1939 года',
                            'desc' => 'вышло Постановление Экономсовета СССР № 513-99С о строительстве в районе г. Каменск-Уральский завода №268 как базы по производству магниевых сплавов. 4 февраля 1940 года Нарком авиапромышленности утвердил проектное задание. В мае 40-го начались первые строительные работы по возведению завода. 13 марта 1941 года Наркомат авиационной промышленности (НКАП) утвердил комплексный проект завода, в который свои уточнения внесла начавшаяся через три месяца Великая Отечественная война.'
                        ],
                        [
                            'period' => '21 июля 1941 года',
                            'desc' => 'было создано специальное Управление по строительству Каменских заводов (УСКЗ), оно взяло на себя проектирование, строительство и организацию производственно-технологических процессов завода № 268 УСКЗ возглавили Г.В. Визирян (в 1941-1942 гг.) и П.А. Герасимов (в 1942-1943 гг.).'
                        ]
                    ])
                ]);
                $image = url('/') . '/fixed/test/company_test.png';
                $company->addMediaFromUrl($image)->preservingOriginal()->toMediaCollection('cover');

                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_1_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_2_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_1_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_2_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_1_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_2_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');

                for ($vi = 1; $vi <= 3; $vi++) { // Создаем несколько ветеранов
                    $veteran = Veteran::create([
                        'company_id' => $company->id,
                        'name' => 'Ветеран ' . $vi,
                        'surname' => 'Фамилия ' . $vi,
                        'thirdname' => 'Отчество ' . $vi,
                        'birth_dt' => '1941',
                        'death_dt' => '1972',
                        'position' => 'Инженер',
                        'main_fact' => 'Основные факты ветерана ' . $vi,
                        'timeline' => json_encode([
                            [
                                'period' => 'сентябрь 1942',
                                'desc' => 'В начале сентября 1942 года 167-я стрелковая дивизия вошла в состав 38-й армии и была переброшена на север Воронежской области. Ефрейтор Абрамов участвовал в тактических боях за Верейские высоты и посёлок Большая Верейка. К 30 января 1943 года его подразделение достигло станции Касторная в Курской области, где оказалась окружена крупная группировка вражеских войск. В ходе наступления Илья Абрамов обезвредил около сотни мин.'
                            ],
                            [
                                'period' => 'награждение',
                                'desc' => 'За образцовое выполнение боевых заданий командования на фронте борьбы с немецко- фашистскими захватчиками и проявленные при этом отвагу и героизм 10 января 1944 былудостоен звания Героя Советского Союза с вручением ордена Ленина и медали «ЗолотаяЗвезда».'
                            ]
                        ])
                    ]);
                    $image = url('/') . '/fixed/test/veteran_test.jpeg';
                    $veteran->addMediaFromUrl($image)->preservingOriginal()->toMediaCollection('cover');
                }
            }
        };

    }

    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make(ENV('ADMIN_PASSWORD')),
            'remember_token' => Str::random(10),
        ]);

        $this->makeFedearlDistricts();
    }
}
