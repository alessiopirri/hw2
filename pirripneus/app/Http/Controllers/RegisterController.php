<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Routing\Controller as BaseController;

class RegisterController extends BaseController{

    public function signin(){
        if(session("email") != null){
            return redirect("home");
        }
        else{
            return view("registrazione")
                ->with("csrf_token", csrf_token());
        }
    }

    public function signup(){
        $email = request("email");
        $password = request ("password");
        $ripetipassword = request ("ripetipassword");
        $nome = request ("nome");
        $cognome = request ("cognome");
        $cf = request ("cf");
        if(isset($email) && isset($password) && isset($ripetipassword) && isset($nome) && isset($cognome) && isset($cf)){

            if(strlen($password) < 8)
                $errors[] = "Password troppo corta!";

            if(strcmp($password, $ripetipassword) !=0)
                $errors[] = "Le password non coincidono";

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                $errors[] = "Email non valida";
            
            else{
                $esistemail = Cliente::where("Email", $email)->exists();
                if($esistemail)
                    $errors[] = "Email già in uso";
            }

            if(!isset($errors)){
                $new_user = new Cliente;
                $new_user->Nome = $nome;
                $new_user->Cognome = $cognome;
                $new_user->Email = $email;
                $new_user->CF = $cf;
                $new_user->Password = bcrypt($password);
                $new_user->save();
                Session::flush();
                Session::put("email", $email);
                Session::put("nome", $nome);
                Session::put("codice", $new_user->Codice);
                return redirect('/');
            }
            else{
                return redirect("registrazione")->withErrors($errors)->withInput();
            }                  
        }
        else {
            return redirect("registrazione")->withErrors("Riempi tutti i campi")->withInput();
        }
    }

    public function checkemail($email){
        $existsemail = Cliente::where("Email", $email)->exists();
        return ['exists'=>$existsemail];
    }
}