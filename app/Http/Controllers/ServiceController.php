<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function addToMs()
    {
        $services = Service::all();

        foreach ($services as $service) {
            if ($service->serviceId == null) {
                $data = [
                    'name' => $service->name
                ];
                $ms = new Moysklad();
                $srv = $ms->addService($data);
                if ($srv != null) {
                    $serviceId = $srv->id;
                    $service->serviceId = $serviceId;
                    $service->save();
                }
            }
        }
        return view('add-to-ms');

    }
}
