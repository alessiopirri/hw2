<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

class ExternalApiController extends BaseController{

    public function bridgestone ($year = null, $make = null, $model = null, $trim = null){

        //TODO METTERLE NELL'ENV
        $key= env("KEY_BRIDGESTONE");

        header('Content-Type: application/json');

        if(isset($year)){
            if(isset($make)){
                if(isset($model)){
                    if(isset($trim)){
                        //misura
                        $url = "https://wl.tireconnect.ca/api/v2/vehicle/tireSizes?key=".$key ."&year=" .urlencode($year) ."&make=" .urlencode($make) ."&model=" .urlencode($model) ."&trim=" .urlencode($trim);
                    } else {
                        //allestimenti
                        $url = "https://wl.tireconnect.ca/api/v2/vehicle/trims?key=".$key ."&year=" .urlencode($year) ."&make=" .urlencode($make) ."&model=" .urlencode($model);
                    }
                } else {
                    //modelli
                    $url = "https://wl.tireconnect.ca/api/v2/vehicle/models?key=".$key ."&year=" .urlencode($year) ."&make=" .urlencode($make);
                }
            } else {
                //marche
                $url = "https://wl.tireconnect.ca/api/v2/vehicle/makes?key=".$key ."&year=" .urlencode($year);
            }
        }else{
            //anni
            $url = "https://wl.tireconnect.ca/api/v2/vehicle/years?key=".$key;
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);

        echo $data;
    }

    public function meteo (){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://pfa.foreca.com/authorize/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"user\": \"alessio-pirri99\", \"password\": \"ATz0ObWsZSnw\"}");
    

        return curl_exec($ch);
    }

    public function ipInfo($ip){
        $url = "http://api.ipstack.com/" .$ip ."?access_key=".env("KEY_IPSTACK");
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}