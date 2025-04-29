<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class CategoryController extends Controller
{
    public function paginate_()
    {
        $keyName = 'allCategories';
        if( !session()->has($keyName) ){
            $allCategorys = DB::table('categorys')->select('id', 'catgEng', 'catgRus', 'saver')->get();
            $collectionCategories = collect($allCategorys);
            session()->put($keyName, $collectionCategories);
        }else {  // Если в сессии есть ключ $categName то к БД не обращаемся, а берём из сессии
            $collectionCategories = session()->get($keyName);
        }
        $page = request()->input('page', 1)-0;  // числовой номер страницы
        $perPage = 3;                           // количество елементов на странице

        // Пагинация с учетом длины страницы
        return new LengthAwarePaginator(
            $collectionCategories->forPage($page, $perPage),
            $collectionCategories->count(),
            $perPage,
            $page,
            [
                'path'  => url('/categorys'),
            ]
        );
    }

}
