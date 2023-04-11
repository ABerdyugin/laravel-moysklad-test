<?php

namespace App\Http;

use Illuminate\Support\Arr;

class Moysklad
{

    public function get($entity, $id = null, $opt = null)
    {
        if ($id) {
            $entity .= '/' . $id . ($opt ? '/' . implode('/', $opt) : '');
        }
        return $this->connect('GET', $entity);
    }

    public function add($entity, $data)
    {
        return $this->connect('POST', $entity, $data);
    }

    private function connect($method, $entity, $body = null)
    {
        $url = env('MOYSKLAD_JSON_API') . '/entity/' . $entity;
        return $this->makeHttpRequest($method, $url, $body);
    }

    private function makeHttpRequest(string $method, string $url, $body = null)
    {
        $bearerToken = env('MOYSKLAD_TOKEN');
        $opts = $body
            ? array('http' =>
                array(
                    'method' => $method,
                    'header' => array('Authorization: Bearer ' . $bearerToken, "Content-type: application/json"),
                    'content' => json_encode($body)
                )
            )
            : array('http' =>
                array(
                    'method' => $method,
                    'header' => 'Authorization: Bearer ' . $bearerToken
                )
            );
        //if($body)dd($opts);
        $context = stream_context_create($opts);
        $result = file_get_contents($url, false, $context);
        return json_decode($result);
    }

    public function readyPositions($list): array
    {
        $positions = [];
        foreach ($list as $item) {
            $positions[] = [
                "quantity" => rand(1, 5),
                'price' => doubleval(rand(100, 100000)),
                'assortment' => [
                    'meta' => [
                        "href" => "https://online.moysklad.ru/api/remap/1.2/entity/product/" . $item->productId,
                        "type" => "product",
                        "mediaType" => "application/json"
                    ]
                ]
            ];
        }
        return $positions;
    }

    public function addCounterparty($data)
    {
        return $this->add('counterparty', $data);
    }

    public function addProduct(array $data)
    {
        return $this->add('product', $data);
    }

    public function addService(array $data)
    {
        return $this->add('service', $data);
    }

    public function addWarehouse(array $data)
    {
        return $this->add('store', $data);
    }

    public function addGroup(mixed $data)
    {
        return $this->add('productfolder', $data);
    }

    public function getOrganization($id = null)
    {
        $organisation = $this->get('organization', $id);
        return Arr::random($organisation->rows);
    }

    public function getDemand($id)
    {
        return $this->get('demand', $id);
    }

    public function getDemandPositions($id)
    {
        $positions =$this->get('demand', $id, ['positions']);
        return $positions->rows;
    }

    public function addCustomerOrder(array $data)
    {
        return $this->add('customerorder', $data);
    }

    public function addDemand(array $data)
    {
        return $this->add('demand', $data);
    }

    public function addSalesReturn(array $data)
    {
        return $this->add('salesreturn', $data);
    }

    public function addPaymentId(array $data)
    {
        return $this->add('paymentin', $data);
    }

    public function addCashId(array $data)
    {
        return $this->add('cashin', $data);
    }
}
