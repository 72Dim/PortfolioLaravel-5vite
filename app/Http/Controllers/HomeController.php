<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Pagination\LengthAwarePaginator;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;

class HomeController extends Controller
{
    private $arrayForView = [
        'bodyClass'    => '',                   /* значение для класса тега <body>, указует на открытие модального окна */
        'modalBackdrop'=> 'display: none',      /* значение для модального фона в теге <div class="modal-backdrop fade show" */
        'modalDialog'  => 'cart',
        'nameContent'  => '',                    /* значение показывает, какое наполнение у контента. (''-содержимое по умолчанию) */
    ];

    /**
     * Create a new controller instance.
     *
     * @return void // - пустота
     */
    public function __construct() {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function show_Products(
        ProductsController $products,
        CategoryController $categorys,
        Product $product,
        ) {                                                             //* Контент с продуктами
        $urlArr = request()->segments();
        $allCategories = session()->get('allCategories', 'default');    // коллекция

        if(Gate::denies('show_products', $product)) {
            $this->arrayForView['nameContent'] = 'products';
            $this->arrayForView['categName']   = $urlArr[0];
            $this->arrayForView['categId']     = $urlArr[1];
            $this->arrayForView['allCategories']     = $allCategories;
            $this->arrayForView['paginateProducts']  = $products->paginate_();
            $this->arrayForView['paginateCategories']= '';
            return view('main')
            ->with($this->arrayForView);
        }else {
            $textForAbort = Auth::user()->name." извените, вы не авторизованы для дальнейших действий.";
            abort(403, $textForAbort);
        }
    }

    public function show_Categories(CategoryController $categorys) {   //* Контент с категориями
        $this->arrayForView['paginateCategories'] = $categorys->paginate_();
        $this->arrayForView['nameContent'] = 'categories';
        return view('main')
        ->with($this->arrayForView);
    }
}
