<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";

    protected $primaryKey = "Codice";

    public $timestamps = false;
    // classe della entita, nomecampo della relazione, chiave primaria
    public function carrello(){
        return $this->belongsTo("App\Models\Carrello", "Codice", "CodiceCliente");
    }

    public function operazione(){
        return $this->belongsToMany("App\Models\Prodotto", "operazione", "CodiceCliente", "CodiceProdotto")->withPivot("Data", "Quantita", "CodiceSede");
    }

    public function sede(){
        return $this->belongsToMany("App\Models\Sede", "operazione", "CodiceCliente", "CodiceSede");
    }
}