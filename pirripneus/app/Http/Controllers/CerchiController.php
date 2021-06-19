<?php
namespace App\Http\Controllers;
use App\Models\Cerchio;

use Illuminate\Routing\Controller as BaseController;

class CerchiController extends BaseController{
    public function cerchi(){
        return view("Cerchi");
    }
    public function trovacerchi(){
        //return Cerchio::select("marca", "modello", "prezzo", "descrizione", "diametro", "img as immagine", "codice")->join("Prodotto", "Prodotto.ID", "=", "Cerchio.Codice")->get();
        return Cerchio::get()->map(function ($item){
            return [
                'marca' => $item->Marca,
                'modello' => $item->Modello,
                'diametro' => $item->Diametro,
                'codice' => $item->Codice,
                'prezzo' => $item->prodotto->Prezzo,
                'descrizione' => $item->prodotto->Descrizione,
                'immagine' => $item->prodotto->Img
            ];
        });
    }
}