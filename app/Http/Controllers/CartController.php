<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Repository;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Order;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Response $response){
            //* method GET
        // ... code
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Repository $cache, Order $order){
            //* method POST
        //* Создаём составной номер квитанции
        $nOrder = $cache->get('nOrder');  // устанавливается в контроллере FirstStartMainPage
        $nOrder = ++$nOrder;
        $cache->forever('nOrder', $nOrder);
        $nowKyiv = CarbonImmutable::now('Europe/Kyiv');
        $dTime = $nowKyiv->format('Y-m-d H:i:s.u');     // 2024-03-09 15:07:11.075050
        $nDay = $nowKyiv->format('d');
        $numberOrder = $nDay."_$nOrder";

            //* Request body:
        $inCart = $request->json('inCart');
        $orderSum = $request->json('orderSum');
        $requestBody = $request->json();
        $amountInCart = $request->json('amountInCart');

        $shoppingList = array();
        for ($i=0; $i < count($request->json("inCart")); $i++) {
            $id = $request->json("inCart.$i.id");
            $sum = $request->json("inCart.$i.sum");
            $price = $request->json("inCart.$i.price");
            $amount = $request->json("inCart.$i.amount");
            $prodEng = $request->json("inCart.$i.prodEng");
            $strForReceipt = "$id-$prodEng, $amount X $price = $sum"."₴\n"; // строка для квитанции
            array_push($shoppingList, $strForReceipt);
        }
        if ( false == is_string($inCart) ) {
            $inCart = json_encode($inCart);                             // преобразуем в JSON строку
        }

        $userId = Auth::user()->id;

        //* Добавление в таблицу order, через модель
        $order->create([
            'userId' => $userId,
            'nOrder' => $numberOrder,
            'orderSum' => $orderSum,
            'amountInCart' => $amountInCart,
            'inCart' => $inCart,
        ]);
        // Mail::to('misLiza@app.com')->send(new OrderShipped($numberOrder, $dTime, $shoppingList));

        //*--- Ответ на AJAX запрос из фронтента ---
        $serverMessage = null;
        $serverMessage = [
            "top" => "Заказ успешно обработан.",
            "down" => "Чек отправлен на ваш email.",
        ];
        return response()
        ->json($serverMessage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       //* method GET
        // ... code
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       //* method PUT - помещать
        // ... code
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {       //* method DELETE
        // ... code
    }
}

