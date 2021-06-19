<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Sede;
use App\Models\Cerchio;
use App\Models\Pneumatico;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class ProfiloController extends BaseController{

    public function profilo(){
        return view("profilo");
    }
    
    public function datiCliente(){
        return Cliente::where('Codice', session('codice'))->first(['cf', 'nome', 'cognome', 'email', 'totalespeso']);
    }

    public function ordini(){
        $ordini = Cliente::find(session('codice'))->operazione->map(function ($item){
            return [
                'data' => $item->pivot->Data,
                'quantita' => $item->pivot->Quantita,
                'citta' => Sede::find($item->pivot->CodiceSede)->Citta,
                'prezzo' => $item->Prezzo,
                'marca' => Cerchio::find($item->ID) ? Cerchio::find($item->ID)->Marca : (Pneumatico::find($item->ID) ? Pneumatico::find($item->ID)->Marca : ""),
                'modello' => Cerchio::find($item->ID) ? Cerchio::find($item->ID)->Modello : (Pneumatico::find($item->ID) ? Pneumatico::find($item->ID)->Modello: "")
            ];
        });

        $out = array();
        foreach ($ordini as $ordine){
            if($ordine['marca'])
                $out[] = $ordine;
        }
        
        return $out ? $out : "false";
    }
}