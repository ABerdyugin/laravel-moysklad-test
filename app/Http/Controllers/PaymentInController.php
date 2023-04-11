<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\PaymentIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentInController extends Controller
{
    public function addToMs()
    {
        $ms = new Moysklad();
        $organization = $ms->getOrganization();
        $counterparty = DB::table('counterparties')->inRandomOrder()->first();

        $data = [
            'sum' => rand(100, 100000),
            'agent' => [
                'meta' => [
                    "href" => "https://online.moysklad.ru/api/remap/1.2/entity/counterparty/" . $counterparty->clientId,
                    "type" => "counterparty",
                    "mediaType" => "application/json"
                ]
            ],
            'organization' => [
                'meta' => $organization->meta
            ]
        ];

        $paymentIn = $ms->addPaymentId($data);
        if ($paymentIn) {
            PaymentIn::create(['paymentInId' => $paymentIn->id]);
        }
        return view('add-to-ms');
    }
}
