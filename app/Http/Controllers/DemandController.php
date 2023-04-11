<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
{
    public function addToMs()
    {

        $ms = new Moysklad();
        $organization = $ms->getOrganization();

        $counterparty = DB::table('counterparties')->inRandomOrder()->first();
        $store = DB::table('warehouses')->inRandomOrder()->first();
        $products = DB::table('goods')->inRandomOrder()->limit(rand(1, 3))->get();

        $positions = $ms->readyPositions($products);
        $data = [
            'organization' => [
                "meta" => $organization->meta
            ],
            'agent' => [
                'meta' => [
                    "href" => "https://online.moysklad.ru/api/remap/1.2/entity/counterparty/" . $counterparty->clientId,
                    "type" => "counterparty",
                    "mediaType" => "application/json"
                ]
            ],
            'store' => [
                'meta' => [
                    "href" => "https://online.moysklad.ru/api/remap/1.2/entity/store/" . $store->storeId,
                    "type" => "store",
                    "mediaType" => "application/json"
                ]
            ],
            'positions' => $positions
        ];

        $demand = $ms->addDemand($data);
        if($demand){
            Demand::create([
                'demandId' => $demand->id
            ]);
        }

        return view('add-to-ms');
    }
}
