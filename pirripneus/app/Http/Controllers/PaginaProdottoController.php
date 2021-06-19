<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Prodotto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class PaginaProdottoController extends BaseController{

    public function paginaprodotto($type = null, $code= null){
        return view("paginaprodotto")->with("type", $type)->with("code", $code);
    }

    public function sessione(){
        return json_encode(session("email") ? true : false);
    }

    public function prodotto($type, $code){
        if ($type == "p")
            return Prodotto::where("ID", $code)->get()->map(function ($item){
                return [
                    "Img" => $item->Img,
                    "Prezzo" => $item->Prezzo,
                    "Misura" => $item->pneumatico->Misura,
                    "Marca" => $item->pneumatico->Marca,
                    "Modello" => $item->pneumatico->Modello
                ];
            });
        if ($type == "c")
            return Prodotto::where("ID", $code)->get()->map(function ($item){
                return [
                    "Img" => $item->Img,
                    "Prezzo" => $item->Prezzo,
                    "Diametro" => $item->cerchio->Diametro,
                    "Marca" => $item->cerchio->Marca,
                    "Modello" => $item->cerchio->Modello
                ];
            });
    }

    public function disponibilita($codice){
        return Prodotto::where('ID', $codice)->first("QuantitaEcommerce");
    }
}