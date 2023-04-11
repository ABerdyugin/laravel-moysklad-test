<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\SalesReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SalesReturnController extends Controller
{
    public function addToMs()
    {
        $ms = new Moysklad();
        $demands = DB::table('demands')->inRandomOrder()->first();

        $demand = $ms->getDemand($demands->demandId);
        $positions = $ms->getDemandPositions($demands->demandId);
        $reason = fake()->sentence(4);

        $positions = Arr::random($positions, rand(1, count($positions)));

        $positionList = [];
        foreach ($positions as $position) {
            $position->quantity = rand(1, $position->quantity);
            unset($position->meta);
            unset($position->id);
            unset($position->accountId);
            $positionList[] = $position;
        }
        $data = [
            'description' => $reason,
            'organization' => $demand->organization,
            'store' => $demand->store,
            'agent' => $demand->agent,
            'demand' => ['meta' => $demand->meta],
            'positions' => $positionList
        ];
        $salesReturn = $ms->addSalesReturn($data);
        if ($salesReturn) {
            SalesReturn::create([
                'salesReturnId' => $salesReturn->id
            ]);
        }

        return view('add-to-ms');
    }
}
