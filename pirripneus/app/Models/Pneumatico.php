<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pneumatico extends Model
{
    protected $table = "pneumatico";

    protected $primaryKey = "Codice";
    protected $autoIncrement = false;

    public $timestamps = false;

    public function prodotto(){
        return $this->hasOne("App\Models\Prodotto", "ID", "Codice");
    }

    public function indice(){
        return $this->hasOne("App\Models\IndiceVelocita", "IndiceVelocita", "Velocita");
    }
}