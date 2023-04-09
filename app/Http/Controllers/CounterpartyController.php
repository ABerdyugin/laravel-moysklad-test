<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Counterparty;
use Illuminate\Http\Request;

class CounterpartyController extends Controller
{
    public function addToMs()
    {
        $clients = Counterparty::all();

        $ms = new Moysklad();

        foreach ($clients as $client) {
            if($client->clientId == null){
                $data = [
                    'name' => $client->name . ' ' . $client->lastName,
                    'legalFirstName' => $client->name,
                    'legalLastName' => $client->lastName,
                    'phone' => $client->phone,
                    'email' => $client->email,
                ];

                $msClient = $ms->addCounterparty($data);
                $clientId = $msClient->id;
                $client->clientid = $clientId;
                $client->save();
            }
        }
        return $ms->show();
    }

}
