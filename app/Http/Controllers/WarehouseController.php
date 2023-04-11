<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function addToMs()
    {
        $warehouses = Warehouse::all();
        foreach ($warehouses as $warehouse){
            if($warehouse->storeId == null){
                $data = [
                    'name'  => $warehouse->name
                ];

                $ms = new Moysklad();
                $msStore = $ms->addWarehouse($data);
                if($msStore){
                    $storeId = $msStore->id;
                    $warehouse->storeid = $storeId;
                    $warehouse->save();
                }
            }
        }

        return view('add-to-ms');

    }
}
