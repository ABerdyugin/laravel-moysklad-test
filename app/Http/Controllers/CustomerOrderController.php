<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Counterparty;
use App\Models\CustomerOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerOrderController extends Controller
{
    public function addToMs()
    {
        $ms = new Moysklad();
        $counterparty = DB::table('counterparties')->inRandomOrder()->first();
        $products = DB::table('goods')->inRandomOrder()->limit(rand(1, 3))->get();

        $positions = $ms->readyPositions($products);

        $organization = $ms->getOrganization();
        $data = [
            'organization' => [
                "meta" => $organization->meta
            ],
            'agent' => [
                'meta'=>[
                    "href" => "https://online.moysklad.ru/api/remap/1.2/entity/counterparty/" . $counterparty->clientId,
                    "type" => "counterparty",
                    "mediaType" => "application/json"
                ]
            ],
            'positions' => $positions
        ];
        $order = $ms->addCustomerOrder($data);
        if ($order != null) {
            CustomerOrder::create([
                'orderId' => $order->id
            ]);
        }

        return view('add-to-ms');
    }
}
