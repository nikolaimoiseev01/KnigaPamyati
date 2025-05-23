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
            for ($ci = 1; $ci <= 2; $ci++) { // Создаем несколько компаний
                $company = Company::create([
                    'federal_district_id' => $federal_district->id,
                    'name' => "Компания {$ci} ({$federal_district['slug']})",
                    'date_start' => '1942',
                    'date_end' => 'Н.В.',
                    'description' => 'У Каменск-Уральского металлургического завода есть несколько первых исторических рубежей, связанных с ключевым словом «Победа». В далеком 1942-м, 14 февраля, в литейном цехе завода №268 (КУМЗа) была получена первая плавка, выпущена первая заводская продукция. В 1944-м, 5 мая, в невероятно сложных условиях была введена I очередь завода, этот день принято считать Днем рождения КУМЗа. 29-го победного для всей страны мая 1945 года Госкомиссия приняла решение о вводе всего
комплекса завода в эксплуатацию. КУМЗ – ровесник Победы.',
                    'timeline' => [
                        [
                            'data' => [
                                'period' => 'сентябрь 1942',
                                'desc' => 'вышло Постановление Экономсовета СССР № 513-99С о строительстве в районе г. Каменск-Уральский завода №268 как базы по производству магниевых сплавов. 4 февраля 1940 года Нарком авиапромышленности утвердил проектное задание. В мае 40-го начались первые строительные работы по возведению завода. 13 марта 1941 года Наркомат авиационной промышленности (НКАП) утвердил комплексный проект завода, в который свои уточнения внесла начавшаяся через три месяца Великая Отечественная война.'
                            ],
                            'type' => 'general'
                        ],
                        [
                            'data' => [
                                'period' => 'сентябрь 1942',
                                'desc' => 'было создано специальное Управление по строительству Каменских заводов (УСКЗ), оно взяло на себя проектирование, строительство и организацию производственно-технологических процессов завода № 268 УСКЗ возглавили Г.В. Визирян (в 1941-1942 гг.) и П.А. Герасимов (в 1942-1943 гг.).'
                            ],
                            'type' => 'general'
                        ],
                        [
                            'data' => [
                                'text' => 'Венцом усилий заводчан стало оформление 268-го в самостоятельную хозяйственную единицу в декабре 1943 года, подтвержденное приказом №5 по Наркомату авиационной промышленности от 4.01.1944 года. Первым директором завода №268 (КУМЗ) стал Федор Терентьевич Маленок. Он возглавлял завод в 1944-1945 гг.'
                            ],
                            'type' => 'big_block'
                        ]
                    ]
                ]);
                $image = url('/') . '/fixed/test/company_test.png';
                $company->addMediaFromUrl($image)->preservingOriginal()->toMediaCollection('cover');

                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_1_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_2_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                $company->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_1_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');

                for ($vi = 1; $vi <= 10; $vi++) { // Создаем несколько ветеранов
                    $veteran = Veteran::create([
                        'company_id' => $company->id,
                        'name' => "Илья ({$company->id})",
                        'surname' => 'Абрамов ',
                        'thirdname' => 'Васильевич ',
                        'description' => 'Илья Васильевич Абрамов — советский военнослужащий, сапёр 180-го отдельного сапёрного батальона 167-й стрелковой Сумско-Киевской дважды Краснознамённой дивизии 38-й армии 1-го Украинского фронта, ефрейтор. Участник Великой Отечественной войны. Герой Советского Союза (1944).',
                        'birth_dt' => '1941',
                        'death_dt' => '1972',
                        'position' => 'Инженер',
                        'timeline' => [
                            [
                                'data' => [
                                    'period' => 'сентябрь 1942',
                                    'desc' => 'В начале сентября 1942 года 167-я стрелковая дивизия вошла в состав 38-й армии и была переброшена на север Воронежской области. Ефрейтор Абрамов участвовал в тактических боях за Верейские высоты и посёлок Большая Верейка. К 30 января 1943 года его подразделение достигло станции Касторная в Курской области, где оказалась окружена крупная группировка вражеских войск. В ходе наступления Илья Абрамов обезвредил около сотни мин.'
                                ],
                                'type' => 'general'
                            ],
                            [
                                'data' => [
                                    'period' => 'сентябрь 1942',
                                    'desc' => 'За образцовое выполнение боевых заданий командования на фронте борьбы с немецко- фашистскими захватчиками и проявленные при этом отвагу и героизм 10 января 1944 былудостоен звания Героя Советского Союза с вручением ордена Ленина и медали «ЗолотаяЗвезда».'
                                ],
                                'type' => 'general'
                            ],
                            [
                                'data' => [
                                    'text' => '18 февраля 1942 год девятнадцатилетний Илья Васильевич был отправлен на фронт, где служил сапёром. Порой за день ему приходилось обезвреживать до сотни мин, каждый раз рискуя погибнуть. Но благодаря его работе были спасены десятки жизней советских воинов'
                                ],
                                'type' => 'big_block'
                            ]
                        ]
                    ]);
                    $image = url('/') . '/fixed/test/veteran_test.jpeg';
                    $veteran->addMediaFromUrl($image)->preservingOriginal()->toMediaCollection('cover');
                    $veteran->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_1_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                    $veteran->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_2_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                    $veteran->addMediaFromUrl(url('/') . '/fixed/test/company_gallery_1_test.jpeg')->preservingOriginal()->toMediaCollection('gallery');
                    $veteran->addMediaFromUrl(url('/') . '/fixed/test/medal_star.png')->preservingOriginal()->toMediaCollection('medals');
                    $veteran->addMediaFromUrl(url('/') . '/fixed/test/medal_star.png')->preservingOriginal()->toMediaCollection('medals');
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
