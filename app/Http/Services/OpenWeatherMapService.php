<?php

namespace App\Http\Services;

class OpenWeatherMapService
{
   public static function consultaApi($cidade = 'Fortaleza', $estado = 'CE'){
        $params['q'] =  $cidade.',BR-'.$estado.',BRA';
        $params['units'] = 'metric';
        $params['lang'] = 'pt_br';
        $params['appid'] = env('API_KEY_OWM');

        $urlRequest = env('API_URL_OWM').http_build_query($params);

        return self::requestByCurl($urlRequest);
   }

   private static function requestByCurl($urlRequest){
       $curl = curl_init();
       curl_setopt_array($curl, [
         CURLOPT_URL => $urlRequest,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_CUSTOMREQUEST => 'GET'
       ]);

       $response = curl_exec($curl);

       curl_close($curl);

       return $response;

   }
}
