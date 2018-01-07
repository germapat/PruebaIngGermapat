<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use SoapClient;

class FunctionsController extends Controller
{
    public function get_bank_list()
    {
        $bank_list = Cache::remember('bank', 1440, function () {
            try {
                $seed = date('c');
                $hashString = sha1($seed.'024h1IlD', false);
                $servicio="https://test.placetopay.com/soap/pse/?wsdl";
                $parametros= ['auth'=>([
                    'login' => '6dd490faf9cb87a9862245da41170ff2',
                    'tranKey' =>$hashString,
                    'seed' => $seed])];
                    $cliente = new SoapClient($servicio, $parametros);
                    $cliente ->__setLocation('https://test.placetopay.com/soap/pse/');
                    //llamamos al métdo que nos interesa con los parámetros
                    $resultado = $cliente->getBankList($parametros)->getBankListResult->item;
                    return $cache = $resultado;

                } catch (\Exception $e) {
                    return $e->getMessage();
                }

            });
            return $bank_list;
    }
}
