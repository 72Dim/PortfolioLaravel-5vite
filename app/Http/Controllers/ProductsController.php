<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsController extends Controller
{
    public function paginate_() {
        $urlArr = request()->segments();
        $elemCount = count($urlArr);
        $_id = $urlArr[$elemCount-1];           // 2-1=1, в массиве segments[1]=номер категории, а segments[0]=название категории
        $categName = $urlArr[0].'_'.$urlArr[1]; // Комбинированный ключ типа 'fruits_1'
        // ---- Перед обращением к БД проверяем, есть ли в сессии ключ категорию берём из маршрута -----
        if( !session()->has($categName) ){
            $match = 'no match';
            // возвращает массив
            $allProducts = DB::select(
                'SELECT id, category, prodEng, prodRus, units, price, country, picture FROM products WHERE category = :category',
                ['category' => $_id]
            );
            session()->put($categName, $allProducts);           // результат записуем в сессию 'fruits_1', [{}, {}, ...]
            $collectionProducts = collect($allProducts);
        }
        else {  // Если в сессии есть ключ $categName то к БД не обращаемся, а берём из сессии
            $match = 'match';
            $arrayProducts = session()->get($categName);    // получаем из сессию 'fruits_1', [{}, {}, ...]
            $collectionProducts = collect($arrayProducts);  // преобразуем масив в коллекцию
        }

        $page = request()->input('page', 1)-0;          // числовой номер страницы
        $perPage = 2;                                   // количество елементов на странице
        return new LengthAwarePaginator(
            $collectionProducts->forPage($page, $perPage),
            $collectionProducts->count(),                   // Метод count(), возвращает общее количество элементов в коллекции:
            $perPage,                                       // количество елементов на странице
            $page,                                          // числовой номер страницы
            [
                'path'  => url('/'.$urlArr[$elemCount-$elemCount].'/'.$urlArr[$elemCount-1]),
            ]
        );
    }
}
