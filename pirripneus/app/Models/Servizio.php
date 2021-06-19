<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Servizio extends Model
{
    protected $table = "servizio";

    protected $primaryKey = "Codice";
    protected $autoIncrement = false;

    public $timestamps = false;

}