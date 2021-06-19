<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Carrello extends Model
{
    protected $table = "carrello";

    protected $primaryKey = "Codice";

    public $timestamps = false;

    protected $fillable = [
        'CodiceCliente',
        'CodiceProdotto',
        'Quantita'
    ];

    public function prodotto(){
        return $this->hasMany("App\Models\Prodotto", "ID", "CodiceProdotto");
    }

    public function cliente(){
        return $this->hasMany("App\Models\Cliente", "Codice", "CodiceCliente");
    }
}