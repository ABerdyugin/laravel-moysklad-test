<?php

namespace App\Http;

class Moysklad
{


    public function show()
    {
        return env('MOYSKLAD_JSON_API');

    }

    public function addCounterparty($data)
    {
        return $this->add('counterparty', $data);
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
        //print_r($opts);die();
        $context = stream_context_create($opts);
        $result = file_get_contents($url, false, $context);
        return json_decode($result);
    }

    public function addProduct(array $data)
    {
        return $this->add('product', $data);
    }

    public function addService(array $data)
    {
        return $this->add('service', $data);
    }

    public function addProductFolder(array $data)
    {
        return $this->add('productfolder', $data);
    }

    public function addWarehouse(array $data)
    {
        return $this->add('store', $data);
    }


}
