<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function addToMs()
    {
        $goods = Goods::all();
        foreach ($goods as $item) {
            if ($item->GoodsId == null) {
                $data = [
                    'name' => $item->name
                ];
                $ms = new Moysklad();
                $product = $ms->addProduct($data);
                if($product != null){
                    $productId = $product->id;
                    $item->productId = $productId;
                    $item->save();
                }
            }
        }
    }
}
