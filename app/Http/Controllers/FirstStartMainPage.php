<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstStartMainPage extends Controller
{
    public function first_start () {
        //todo nOrder - сбрасывать по не обходимости раз в год или в месяц ---
            if ( false == cache()->has('nOrder') ) {
                cache()->forever('nOrder', 0);
            } // order number is assigned in CartController.php
            else {
                //* to clear the cache, just uncomment two lines
                // cache()->forget('nOrder');
                // cache()->forever('nOrder', 0);
            }
        //todo the end nOrder -------------------------------------------------
        $arrayForView = [
            'bodyClass'    => '',                   /* значение для класса тега <body>, указует на открытие модального окна */
            'modalBackdrop'=> 'display: none;',     /* значение для модального фона в теге <div class="modal-backdrop fade show" */
            'modalDialog'  => '',                   /* значение указует какое диалоговое окно открыть в модальном блоке */
            'nameContent'  => 'startPage',          /* значение показывает, какое наполнение у контента, ''-содержимое по умолчанию */
            'paginateCategories' => '',
            'paginateProducts'   => '',
            'toPage'     => 'On main',
            'h1_title1'  => "Данная работа, это тестовое задание (портфолио).",
            'h1_title2'  => "Для подражания был взят сайт Rozetka.",
            'imgClassName'=> 'img-laravel_book',
        ];

        if ( true == auth()->check() ) {
            $arrayForView['nameContent'] = 'authenticated';
            return view('main')
            ->with($arrayForView);
        }else {
            return view('main')
            ->with($arrayForView);
        }
    }
}
