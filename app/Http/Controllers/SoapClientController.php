<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SoapClient;
use Illuminate\Support\Facades\Cache;

class SoapClientController
{
    /**
    * @var SoapWrapper
    */
    protected $soapClient;

    /**
    * SoapController constructor.
    *
    * @param SoapWrapper $soapClient
    */


    public function show()
    {
        $bank = Cache::get('bank');
        dd($bank);
        if ( $bank==null) {
            $minutes = 1;

            $bank = Cache::remember('bank', $minutes, function () {
                $seed = date('c');
                $hashString = sha1($seed.'024h1IlD', false);
                $servicio="https://test.placetopay.com/soap/pse/?wsdl"; //url del servicio
                $parametros= ['auth'=>([
                    'login' => '6dd490faf9cb87a9862245da41170ff2',
                    'tranKey' =>$hashString,
                    'seed' => $seed])];


                        $client = new SoapClient($servicio, $parametros);
                        $client ->__setLocation('https://test.placetopay.com/soap/pse/');
                        $result = $client->getBankList($parametros);//llamamos al métdo que nos interesa con los parámetros

            return $cache=$result;
        });

        }


                var_dump($bank);

                exit;

        }
    }
