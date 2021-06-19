<?php
namespace App\Http\Controllers;
use App\Models\Carrello;
use App\Models\Cerchio;
use App\Models\Pneumatico;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class CarrelloController extends BaseController{

    public function quantitaCarrello($prodotto){
        if(session('codice')){
            $quantita = Carrello::where('CodiceProdotto', $prodotto)
                            ->where('CodiceCliente', session('codice'))
                            ->first("quantita");
            return $quantita ? $quantita : ["quantita" => "0"];
        }            
        else 
            return ["quantita" => "0"];        
    }

    public function inserisci ($prodotto, $quantita){
        if(session('codice')){       
            try{
                $nuovoElemento = Carrello::updateOrCreate([
                    'CodiceCliente' => session('codice'),
                    'CodiceProdotto' => $prodotto
                ],[                    
                    'Quantita' => $quantita
                ]);
                $nuovoElemento->save();
                return "true";
             }
             catch(\Exception $e){
                return "false";
             }
        }
    }

    public function rimuovi ($prodotto){
        if(session('codice')){
            try{
                Carrello::where("CodiceProdotto", $prodotto)
                            ->where("CodiceCliente", session('codice'))
                            ->delete();
                return "true";    
            }       
            catch(\Exception $e){
                return "false";
            }
        }
    }

    public function carrello(){
        return view('carrello');
    }

    public function getCarrello(){
        return Carrello::where("CodiceCliente", session('codice'))->with("prodotto")->get()->map(function ($item){
            return [
                'id' => $item->CodiceProdotto,
                'img' => $item->prodotto[0]->Img,
                'prezzo' => $item->prodotto[0]->Prezzo,
                'quantita' => $item->Quantita,
                'marca' => Cerchio::find($item->CodiceProdotto) ? Cerchio::find($item->CodiceProdotto)->Marca : Pneumatico::find($item->CodiceProdotto)->Marca,
                'modello' => Cerchio::find($item->CodiceProdotto) ? Cerchio::find($item->CodiceProdotto)->Modello : Pneumatico::find($item->CodiceProdotto)->Modello,
                'type' => Cerchio::find($item->CodiceProdotto) ? "c": "p"
            ];
        });        
    }

    public function inserisciOrdine(){
        try{
            DB::select('call inserisciOrdine(?)', array(session('codice')));
            return "false";
        }
        catch(\Exception $e){
            return json_encode($e->errorInfo[2]);
        }
    }


}