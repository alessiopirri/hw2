<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController{

    public function login($ritorno = "/"){
        if(session("email") != null){
            return redirect($ritorno);
        }
        else{
            return view("login")
                ->with("csrf_token", csrf_token());
        }
    }

    public function checkLogin($ritorno = "/"){
        $email = request("email");
        $password = request ("password");
        if(isset($email) && isset($password)){
            $cliente = Cliente::where("Email", request("email"))->first();

            if(isset($cliente)){
                if(Hash::check(request("password"), $cliente->Password)){
                    Session::flush();
                    Session::put("email", $cliente->Email);
                    Session::put("nome", $cliente->Nome);
                    Session::put("codice", $cliente->Codice);
                    return redirect($ritorno); 
                }
                else{
                    return redirect("login/".$ritorno)->withErrors("E-mail o password errati")->withInput();
                }
            }  
            else{
                return redirect("login/".$ritorno)->withErrors("Utente non registrato")->withInput(); 
            }    
        }
        else{
            return redirect("login/".$ritorno)->withErrors("Inserisci e-mail e password")->withInput(); 
        }             
    }

    public function logout(){
        Session::flush();
        return redirect ('/');
    }

}