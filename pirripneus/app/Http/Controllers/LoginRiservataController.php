<?php
namespace App\Http\Controllers;
use App\Models\Impiegato;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class LoginRiservataController extends BaseController{

    public function login(){
        if(session("cf") != null){
            return redirect("/areariservata");
        }
        else{
            return view("loginriservata")
                ->with("csrf_token", csrf_token());
        }
    }

    public function checkLogin(){
        $cf = request("cf");
        $password = request ("password");
        if(isset($cf) && isset($password)){
            $impiegato = Impiegato::where("CF", request("cf"))->first();

            if(isset($impiegato)){
                if(md5(request("password")) == $impiegato->Password){
                    Session::flush();
                    Session::put("cf", $impiegato->CF);
                    return redirect("/areariservata"); 
                }
                else{
                    return redirect("loginriservata/")->withErrors("Codice fiscale o password errati")->withInput();
                }
            }  
            else{
                return redirect("loginriservata/")->withErrors("Utente non registrato")->withInput(); 
            }    
        }
        else{
            return redirect("loginriservata/")->withErrors("Inserisci codice fiscale e password")->withInput(); 
        }            
    }
}