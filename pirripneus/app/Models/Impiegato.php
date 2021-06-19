<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Impiegato extends Model
{
    protected $table = "impiegato";

    protected $primaryKey = "Codice";

    public $timestamps = false;

}