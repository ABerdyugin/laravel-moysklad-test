<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Goods;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GoodsController extends Controller
{
    public function addToMs()
    {
        $groups = Group::all();
        $groupList = [];
        foreach ($groups as $group) {
            $groupList[] = [
                "productFolder" => [
                    'meta' => [
                        "href" => "https://online.moysklad.ru/api/remap/1.2/entity/productfolder/" . $group->groupId,
                        "metadataHref" => "https://online.moysklad.ru/api/remap/1.2/entity/productfolder/metadata",
                        "type" => "productfolder",
                        "mediaType" => "application/json",
                        "uuidHref" => "https://online.moysklad.ru/app/#good/edit?id=" . $group->groupId
                    ]
                ]
            ];
        }


        $goods = Goods::all();
        foreach ($goods as $item) {
            if ($item->GoodsId == null) {
                $data = array_merge([
                    'name' => $item->name
                ],
                    Arr::random($groupList)
                );
                $ms = new Moysklad();
                $product = $ms->addProduct($data);
                if ($product != null) {
                    $productId = $product->id;
                    $item->productId = $productId;
                    $item->save();
                }
            }
        }
        return view('add-to-ms');

    }
}
