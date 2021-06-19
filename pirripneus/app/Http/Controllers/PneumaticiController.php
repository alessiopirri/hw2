<?php
namespace App\Http\Controllers;
use App\Models\Pneumatico;
use App\Models\IndiceVelocita;

use Illuminate\Routing\Controller as BaseController;

class PneumaticiController extends BaseController{

    public function pneumatici(){
        return view("Pneumatici");
    }

    public function trovapneumatici(){
        return Pneumatico::get()->map(function ($item){
            return [
                'marca' => $item->Marca,
                'modello' => $item->Modello,
                'codice' => $item->Codice,
                'prezzo' => $item->prodotto->Prezzo,
                'descrizione' => $item->Misura,
                'immagine' => $item->prodotto->Img
            ];
        });
    }

    public function trovapneumaticifilter($largezza, $altezza, $diametro, $carico, $velocita){

        return Pneumatico:: where('Larghezza', $largezza)
                            ->where('Altezza', $altezza)
                            ->where('Diametro', $diametro)
                            ->where('IndiceCarico', '>=', $carico)
                            ->whereHas('indice', function ($q) use($velocita) {
                                $q->where('VelocitaNumerica', '>=', IndiceVelocita::find($velocita)->VelocitaNumerica);
                            })
                            ->get()->map(function ($item){
                                return [
                                    'marca' => $item->Marca,
                                    'modello' => $item->Modello,
                                    'codice' => $item->Codice,
                                    'prezzo' => $item->prodotto->Prezzo,
                                    'descrizione' => $item->Misura,
                                    'immagine' => $item->prodotto->Img
                                ];
                            });
    }
}