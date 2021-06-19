<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;


class AreaRiservataController extends BaseController{

    public function areaRiservata(){
        return view ('areariservata');
    }

    public function operazione1($num){
        if(is_numeric($num)){
            try{
                DB::select('call OP1(?)', array($num));
                return DB::select('select * from TEMP');
            }
            catch(\Exception $e){
                return json_encode($e->errorInfo[2]);
            }
        }
        else {
            return json_encode("Il parametro inserito non è un numero");
        }
    }

    public function operazione2($str){
        try{
            DB::select('call OP2(?)', array($str));
            return DB::select('select * from TEMP');
        }
        catch(\Exception $e){
            return json_encode($e->errorInfo[2]);
        }  
    }

    public function operazione3($cf, $nome, $cognome, $datanascita){
        try{
            $ris = DB::select('call OP3(?, ?, ?, ?)', array($cf, $nome, $cognome, $datanascita));
            
            return "Inserimento andato a buon fine";
        }
        catch(\Exception $e){
            return json_encode("Inserimento non andato a buon fine. Errore: " . $e->errorInfo[2]);
        }  
    }

    public function operazione4(){
        try{
            DB::select('call OP4');
            return DB::select('select * from TEMP');
        }
        catch(\Exception $e){
            return json_encode($e->errorInfo[2]);
        }  
    }
}