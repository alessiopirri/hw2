<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cerchio extends Model
{
    protected $table = "cerchio";

    protected $primaryKey = "Codice";
    protected $autoIncrement = false;

    public $timestamps = false;

    public function prodotto(){
        return $this->hasOne("App\Models\Prodotto", "ID", "Codice");
    }
}