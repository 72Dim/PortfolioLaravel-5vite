<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $users = [
        //     [
        //         'name' => 'Pasha',
        //         'email' => 'www@PashkaPASS555777',
        //         //         'password' => '555777',
        //         'email_verified_at' => NULL,
        //         // hash ниже
        //         'password' => '$2y$12$px9y5AgGxGjSOMKZ9vATN.6dDSYJ0UV6gsDns8YHbdEsLmcKSHd0W',
        //         'remember_token' => NULL,
        //     ],
        //     [
        //         'name' => 'Dany',
        //         'email' => 'www@DanykaPASS123123',
        //         //         'password' => '123123',
        //         'email_verified_at' => NULL,
        //         // hash ниже
        //         'password' => '$2y$12$JYokrB8a7Fe53.VUL3V3EesskuSb5luO8F/pz3OB8SjHxdxRKS9.G',
        //         'remember_token' => NULL,
        //     ],
        //     [
        //         'name' => 'Vova',
        //         'email' => 'www@VovanPass365365',
        //         //         'password' =>'365365',
        //         'email_verified_at' => NULL,
        //         // hash ниже
        //         'password' => '$2y$12$AQqA5EpxrCzML8XnEwbb3O7QkSu5hYHJLKMEuwYOkcOKDlxSnq5D.',
        //         'remember_token' => NULL,
        //     ],
        // ];
        // for ($i=0; $i < count($users); $i++) {
        //     User::factory(1, [
        //         'name' => $users[$i]['name'],
        //         'email' => $users[$i]['email'],
        //         'email_verified_at' => $users[$i]['email_verified_at'],
        //         // 'password' => static::$password ??= Hash::make('password'),
        //         'password' => $users[$i]['password'],
        //         'remember_token' => $users[$i]['remember_token'],
        //     ])
        //     ->hasPosts(1, function (array $attributes, User $user) {
        //         return [
        //             'title' => $user->name,
        //         ];
        //     })->create();
        // }
        // $tima = 'Tima';
        // User::factory(1, [
        //     'name' => $tima,
        //     'email_verified_at' => NULL,
        // ])
        // ->hasPosts(1, function (array $attributes, User $user) {
        //     return [
        //         'title' => $user->name,
        //     ];
        // })->create();

        $categories = [
            'fruits' => [
                ['catgEng' =>'fruits', 'catgRus' =>'Фрукты', 'saver' =>'fruits.JPG'],
                [
                    // 'settings'  => ['nameCategory'  =>  "Фрукты", 'saver'  =>  "http => //shopsitefake/img/saverFruits.jpg",],
                    [
                        'prodEng' => 'Cherry_plum',
                        'prodRus'  => "Алыча",
                        'units'  => "1Кг",
                        'price'  =>  19.50,
                        'country'  => "Украина.",
                        'picture'  => "img/Cherry_plum.JPG"
                    ],
                    [
                        'prodEng' => 'Pomelo',
                        'prodRus'  => "Помело",
                        'units'  => "1Кг",
                        'price'  =>  39.50,
                        'country'  => "Израиль",
                        'picture'  => "img/Pomelo.JPG"
                    ],
                    [
                        'prodEng' => 'Pear',
                        'prodRus'  => "Груша",
                        'units'  => "1Кг",
                        'price'  =>  15.50,
                        'country'  => "Украина",
                        'picture'  => "img/Pear.JPG"
                    ],
                    [
                        'prodEng' => 'Oranges',
                        'prodRus'  => "Апельсин",
                        'units'  => "1кГ",
                        'price'  =>  19.56,
                        'country'  => "Грузия",
                        'picture'  => "img/Orange.JPG"
                    ],
                    [
                        'prodEng' => 'Bananas',
                        'prodRus'  => "Бананы",
                        'units'  => "1кГ",
                        'price'  => 36.85,
                        'country'  => "Папуа-Новая-Гвинея",
                        'picture'  => "img/Banana.JPG"
                    ],
                    [
                        'prodEng' => 'Limes',
                        'prodRus'  => "Лимоны",
                        'units'  => "1кГ",
                        'price'  => 32.45,
                        'country'  => "Грузия",
                        'picture'  => "img/lime.JPG"
                    ],
                    [
                        'prodEng' => 'Mandarins',
                        'prodRus'  => "Мандарины",
                        'units'  => "1кГ",
                        'price'  => 10.89,
                        'country'  => "Турция",
                        'picture'  => "img/Mandarin.JPG"
                    ],
                    [
                        'prodEng' => 'Apples',
                        'prodRus'  => "Яблоки",
                        'units'  => "1кГ",
                        'price'  => 12.89,
                        'country'  => "Украина",
                        'picture'  => "img/Apples.JPG"
                    ]
                ]
            ], 'vegetables' => [
                ['catgEng' =>'vegetables', 'catgRus' =>'Овощи', 'saver' =>'vegetables.JPG'],
                [
                     // 'settings'  => ['nameCategory'  =>  "Овощи",'saver'  => "img/'saver' Vegetables.JPG"],
                    [   'prodEng' => 'Kobak',
                        'prodRus'  => "Кобак",
                        'units'  => "1Кг",
                        'price'  =>  25.50,
                        'country'  => "Украина",
                        'picture'  => "img/Kobak.JPG"
                    ],
                    [   'prodEng' => 'Corn',
                        'prodRus'  => "Кукуруза",
                        'units'  => "1Кг",
                        'price'  =>  35.50,
                        'country'  => "Украина",
                        'picture'  => "img/Corn.JPG"
                    ],
                    [   'prodEng' => 'Pepper',
                        'prodRus'  => "Перец болгарский",
                        'units'  => "1Кг",
                        'price'  =>  35.50,
                        'country'  => "Украина",
                        'picture'  => "img/Pepper.JPG"
                    ],
                    [   'prodEng' => 'Eggplant',
                        'prodRus'  => "Баклажан",
                        'units'  => "1Кг",
                        'price'  =>  35.50,
                        'country'  => "Болгария",
                        'picture'  => "img/Eggplant.JPG"
                    ],
                    [   'prodEng' => 'Cabbages',
                        'prodRus'  => "Капуста",
                        'units'  => "1кГ",
                        'price'  =>  8.34,
                        'country'  => "Украина",
                        'picture'  => "img/Cabbage.JPG"
                    ],
                    [   'prodEng' => 'Zucchinis',
                        'prodRus'  => "Кабачки",
                        'units'  => "1кГ",
                        'price'  =>  4.75,
                        'country'  => "Украина",
                        'picture'  => "img/Zucchini.JPG"
                    ],
                    [   'prodEng' => 'Potatos',
                        'prodRus'  => "Картошка",
                        'units'  => "1кГ",
                        'price'  => 9.45,
                        'country'  => "Украина",
                        'picture'  => "img/Potato.JPG"
                    ],
                    [   'prodEng' => 'Carrots',
                        'prodRus'  => "Морковка",
                        'units'  => "1кГ",
                        'price'  => 8.56,
                        'country'  => "Украина",
                        'picture'  => "img/Carrot.JPG"
                    ]
                ]
            ], 'groats' => [
                ['catgEng' =>'groats', 'catgRus' =>'Крупы', 'saver' =>'groats.JPG'],
                [
                    // 'settings'  => ['nameCategory'  =>  "Крупы", 'saver'  => "img/saveGroats.JPG"],
                    [   'prodEng' => 'Rices',
                        'prodRus'  => "Рис",
                        'units'  => "1кГ",
                        'price'  => 35.85,
                        'country'  => "Китай",
                        'picture'  => "img/Rice.JPG"
                    ],
                    [   'prodEng' => 'Grechka',
                        'prodRus'  => "Гречка",
                        'units'  => "1кГ",
                        'price'  => 12.85,
                        'country'  => "Украина",
                        'picture'  => "img/Grechka.JPG"
                    ],
                    [   'prodEng' => 'Semolina',
                        'prodRus'  => "Манка",
                        'units'  => "1кГ",
                        'price'  => 15.85,
                        'country'  => "Украина",
                        'picture'  => "img/Semolina.JPG"
                    ]
                ]
            ], 'drinks' => [
                ['catgEng' =>'drinks', 'catgRus' =>'Напитки', 'saver' =>'drinks.JPG'],
                [
                    // 'settings'  => ['nameCategory'  =>  "Напитки", 'saver'  => "img/saverDrinks.JPG"],
                    [   'prodEng' => 'Lemonade',
                        'prodRus'  => "Лимонад",
                        'units'  => "1Лт",
                        'price'  => 10.85,
                        'country'  => "Украина",
                        'picture'  => "img/Lemonade.JPG"

                    ],
                    [   'prodEng' => 'Kvas_Taras',
                        'prodRus'  => "Квас Тарас",
                        'units'  => "1Лт",
                        'price'  => 21.38,
                        'country'  => "Украина",
                        'picture'  => "img/Kvas_Taras.JPG"
                    ],
                    [   'prodEng' => 'Tarhun',
                        'prodRus'  => "Тархун",
                        'units'  => "1Лт",
                        'price'  => 12.75,
                        'country'  => "Украина",
                        'picture'  => "img/Tarhun.JPG"
                    ]
                ]
            ], 'bakeryProducts' => [
                ['catgEng' =>'bakeryProducts', 'catgRus' =>'Выпечка', 'saver' =>'bakeryProducts.JPG'],
                [
                    // 'settings'  => ['nameCategory'  =>  "Выпечка", 'saver'  => "img/saverBakeryProducts.JPG"],
                    [
                        'prodEng' => 'whiteBread',
                        'prodRus'  => "Хлеб белый",
                        'units'  => "0,6Кг",
                        'price'  => 6.75,
                        'country'  => "Украина",
                        'picture'  =>  "img/whiteBread.JPG"
                    ],
                    [
                        'prodEng' => 'blackBread',
                        'prodRus'  => "Хлеб чёрный",
                        'units'  => "0,6Кг",
                        'price'  => 7.85,
                        'country'  => "Украина",
                        'picture'  =>  "img/blackBread.JPG"
                    ],
                    [
                        'prodEng' => 'batonDial',
                        'prodRus'  => "Батон",
                        'units'  => "0,5Кг",
                        'price'  => 4.85,
                        'country'  => "Украина",
                        'picture'  =>  "img/batonDial.JPG"
                    ]
                ]
            ], 'doughProducts' => [
                ['catgEng' =>'doughProducts', 'catgRus' =>'Полуфабрикаты', 'saver' =>'doughProducts.JPG'],
                [
                    // 'settings'  => ['nameCategory'  =>  "Полуфабрикаты", 'saver'  => "img/'saver' DoughProducts.JPG"],
                    [
                        'prodEng' => 'Pelmeni',
                        'prodRus'  => "Пельмени",
                        'units'  => "1Кг",
                        'price'  => 25.48,
                        'country'  => "Украина",
                        'picture'  => "img/Pelmeni.JPG"
                    ],
                    [
                        'prodEng' => 'Vareniki',
                        'prodRus'  => "Вареники",
                        'units'  => "1Кг",
                        'price'  => 23.45,
                        'country'  => "Украина",
                        'picture'  => "img/Vareniki.JPG"
                    ],
                    [
                        'prodEng' => 'Pancakes',
                        'prodRus' => "Блинчики",
                        'units'  => "1Кг",
                        'price'  => 21.38,
                        'country'  => "Украина",
                        'picture'  => "img/Pancakes.JPG"
                    ],
                    [
                        'prodEng' => 'Cutlets',
                        'prodRus'  => "Котлеты",
                        'units'  => "1Кг",
                        'price'  => 20.48,
                        'country'  => "Украина",
                        'picture'  => "img/Cutlets.JPG"
                    ],
                    [
                        'prodEng' => 'Benderiki',
                        'prodRus'  => "Бендерки",
                        'units'  => "1Кг",
                        'price'  => 23.78,
                        'country'  => "Украина",
                        'picture'  => "img/Benderiki.JPG"
                    ]
                ]
            ], 'eggs' => [
                ['catgEng' =>'eggs', 'catgRus' =>'Яйца', 'saver' =>'eggs.JPG'],
                [
                    [
                        'prodEng' => 'Chicken_eggs',
                        'prodRus' => "Яйца куриные",
                        'units'  => "10шт",
                        'price'  => 17.35,
                        'country'  => "Украина",
                        'picture'  => "img/Chicken_egg.JPG"
                    ],
                    [
                        'prodEng' => 'Duck_eggs',
                        'prodRus' => "Яйца утиные",
                        'units'  => "10шт",
                        'price'  => 25.50,
                        'country'  => "Украина",
                        'picture'  => "img/Duck_egg.JPG"
                    ],
                    [
                        'prodEng' => 'Quail_eggs',
                        'prodRus'  => "Яйца перепелиные",
                        'units'  => "10шт",
                        'price'  => 21.45,
                        'country'  => "Украина",
                        'picture'  => "img/Quail_egg.JPG"
                    ]
                ]
            ]
        ];
        foreach ($categories as $key => $value) {
            Category::factory(1, $value[0])
            ->create();
            $id = DB::table('categorys')->max('id');
            for ($i=0; $i < count($value[1]); $i++) {
                $value[1][$i]['category'] = $id;
                Product::factory(1, $value[1][$i])
                ->create();
            }
        }
    }
}
