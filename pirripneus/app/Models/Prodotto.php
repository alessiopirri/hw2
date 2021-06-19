<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    protected $table = "prodotto";

    protected $primaryKey = "ID";

    public $timestamps = false;

    public function cerchio(){
        return $this->belongsTo("App\Models\Cerchio", "ID", "Codice");
    }

    public function pneumatico(){
        return $this->belongsTo("App\Models\Pneumatico", "ID", "Codice");
    }

    public function operazione(){
        return $this->belongsToMany("Cliente", "operazione", "ID", "Codice");
    }
}