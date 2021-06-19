<?php
namespace App\Http\Controllers;
use App\Models\Sede;
use App\Models\Servizio;
use App\Models\Cerchio;
use App\Models\Pneumatico;
use App\Models\Prodotto;

use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController{

    public function getsedi($limit = -1){
        if($limit >0)
            return Sede::where('Codice', '!=', Sede::where("Citta", 'e-commerce')->first()->Codice)->orderBy('Codice')->take($limit)->get(); //take(n)
        else 
            return Sede::where('Codice', '!=', Sede::where("Citta", 'e-commerce')->first()->Codice)->orderBy('Codice')->get();
    }

    public function getservizi($limit = -1){
        if($limit >0)
            return Servizio::take($limit)->get();
        else 
            return Servizio::get();
    }

    public function getcerchi(){
        /*
        // Query builder
        $cerchi = Cerchio::select("marca", "modello", "img")->join("Prodotto", "Prodotto.id", "=", "Cerchio.Codice")->groupBy("Marca", "Modello", "Img")->orderBy("Codice", "desc")->limit(3)->get();
        foreach($cerchi as $cerchio){
            $diametriquery = Prodotto::select("Diametro")->join("Cerchio", "Cerchio.Codice", "=", "Prodotto.ID")->where("Marca", $cerchio->marca)->where("Modello", $cerchio->modello)->get();
            $diametri = array();
            foreach($diametriquery as $diametro)
                $diametri[] = $diametro->Diametro;  
            $cerchio->diametri = $diametri;
        }
        return $cerchi;
        */    

        // ORM PURO
        $cerchi = Cerchio::groupBy("Marca", "Modello")->orderByDesc('Codice')->take(3)->get(['Marca', 'Modello']);
        $prodotti = array();
        foreach ($cerchi as $cerchio){
            $prodotto = Prodotto::whereHas('cerchio',  function($q) use ($cerchio)
            {
                $q->where('Marca', $cerchio['Marca'])->where('Modello', $cerchio['Modello']);            
            })->get();                   
            $diametri = array();            
            foreach ($prodotto as $p)            
                array_push($diametri, Cerchio::find($p->ID)->Diametro);              
            array_push($prodotti,   [   'marca' => $cerchio['Marca'], 
                                        'modello' => $cerchio['Modello'],
                                        'img' => $prodotto[0]['Img'],
                                        'diametri' =>$diametri
                                    ]);
        }
        return $prodotti;       
    }

    public function getpneumatici(){
        /*
        $pneumatici = Pneumatico::select("marca", "modello", "img")->join("Prodotto", "Prodotto.id", "=", "Pneumatico.Codice")->groupBy("Marca", "Modello", "Img")->orderBy("Codice", "desc")->limit(3)->get();
        //return $cerchi;
        foreach($pneumatici as $pneumatico){
            $diametriquery = Prodotto::select("Diametro")->join("Pneumatico", "Pneumatico.Codice", "=", "Prodotto.ID")->where("Marca", $pneumatico->marca)->where("Modello", $pneumatico->modello)->get();
            $diametri = array();
            foreach($diametriquery as $diametro)
                $diametri[] = $diametro->Diametro;  
            $pneumatico->diametri = $diametri;
        }
        return $pneumatici;
        */
        $pneumatici = Pneumatico::groupBy("Marca", "Modello")->orderByDesc('Codice')->take(3)->get(['Marca', 'Modello']);
        $prodotti = array();
        foreach ($pneumatici as $pneumatico){
            $prodotto = Prodotto::whereHas('pneumatico',  function($q) use ($pneumatico)
            {
                $q->where('Marca', $pneumatico['Marca'])->where('Modello', $pneumatico['Modello']);            
            })->get();                   
            $diametri = array();            
            foreach ($prodotto as $p)            
                array_push($diametri, Pneumatico::find($p->ID)->Diametro);              
            array_push($prodotti,   [   'marca' => $pneumatico['Marca'], 
                                        'modello' => $pneumatico['Modello'],
                                        'img' => $prodotto[0]['Img'],
                                        'diametri' =>$diametri
                                    ]);
        }
        return $prodotti; 
    }


}