<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $oreders = [[
            'id' =>1,
            'user_id' =>1,
            'number' =>13480731740,
            'status' =>0,
            'fee' =>10,
            'discount' =>44,
            'order_products' =>[
                ['order_id' =>1, 'product_id' =>1, 'param' => '6寸', 'price' => 555.00, 'product' =>['id'=>1,'imageable_id' =>1,'file'=> 'http://www.baidu.com']],
                ['order_id' =>1, 'product_id' =>1, 'param' => '6寸', 'price' => 333.00, 'product' =>['id'=>1,'imageable_id' =>1,'file'=> 'http://www.goodge.com']]
            ],
        ]];


        /* 求价格总和 传统 foreach循环相加 做法 */
        /*$price =0;
        foreach ($oreders as $oreder ) {
            foreach ($oreder['order_products'] as $order_product){
                $price += $order_product['price'];
            }
        }
        dd($price);*/


        /* 1、Laravel Collection sum 求价格总和 */
        /*dump(collect($oreders)->map(function ($order){
            return $order['order_products'];
        })->flatten(1)->map(function ($order){
            return $order['price'];
        })->sum());*/


        /* 2、Laravel Collection sum 求价格总和 */
        /*dump(collect($oreders)->flatMap(function ($order){
            return $order['order_products'];
        })->map(function ($order){
            return $order['price'];
        })->sum());*/


        /* 3、Laravel Collection sum 求价格总和 */
        /*dump(collect($oreders)->flatMap(function ($order){
            return $order['order_products'];
        })->pluck('price')->sum());*/


        /* 4、Laravel Collection sum 求价格总和 */
        dump(collect($oreders)->flatMap(function ($order){
            return $order['order_products'];
        })->sum('price'));

    }
}
