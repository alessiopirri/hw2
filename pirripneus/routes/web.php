<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login/{ritorno?}', 'LoginController@login')->where('ritorno', '(.*)');
Route::post('/login/{ritorno?}', 'LoginController@checkLogin')->where('ritorno', '(.*)');

Route::get('/loginriservata', 'LoginRiservataController@login');
Route::post('loginriservata', 'LoginRiservataController@checkLogin');

Route::get('registrazione', 'RegisterController@signin');
Route::post('registrazione', 'RegisterController@signup');

Route::get('/logout', 'LoginController@logout');

Route::get('checkemail/{email}', 'RegisterController@checkemail');

Route::get('meteo', 'ExternalApiController@meteo');
Route::get('ipinfo/{ip}', 'ExternalApiController@ipInfo');
Route::get('getsedi/{limit?}', 'IndexController@getsedi');
Route::get('getservizi/{limit?}', 'IndexController@getservizi');
Route::get('getcerchi', 'IndexController@getcerchi');
Route::get('getpneumatici', 'IndexController@getpneumatici');

Route::get('sedi', function(){
    return view ("sedi");
});

Route::get('servizi', function(){
    return view ("servizi");
});

Route::get("cerchi", "CerchiController@cerchi");
Route::get("trovacerchi", "CerchiController@trovacerchi");


Route::get("pneumatici", "PneumaticiController@pneumatici");
Route::get("trovapneumatici", "PneumaticiController@trovapneumatici");
Route::get("trovapneumatici/{l}/{a}/{d}/{c}/{v}", "PneumaticiController@trovapneumaticifilter");
Route::get("apibridgestone/{year?}/{make?}/{model?}/{trim?}", 'ExternalApiController@bridgestone');

Route::get("paginaprodotto/{type?}/{code?}", "PaginaProdottoController@paginaprodotto");
Route::get("sessione", 'PaginaProdottoController@sessione');
Route::get("prodotto/{type}/{code}", "PaginaProdottoController@prodotto");

Route::get('getquantitacarrello/{prodotto}', 'CarrelloController@quantitaCarrello');
Route::get('disponibilita/{codice}', 'PaginaProdottoController@disponibilita');
Route::get('inseriscicarrello/{prodotto}/{quantita}', 'CarrelloController@inserisci');
Route::get('rimuovicarrello/{prodotto}', 'CarrelloController@rimuovi');

Route::get('profilo', 'ProfiloController@profilo');
Route::get('getdaticliente', 'ProfiloController@datiCliente');
Route::get('getordini', 'ProfiloController@ordini');

Route::get('carrello', 'CarrelloController@carrello');
Route::get('getcarrello', 'CarrelloController@getCarrello');
Route::get('inserisciordine', 'CarrelloController@inserisciOrdine');

Route::get('areariservata', 'AreaRiservataController@areaRiservata');
Route::get('operazioni/1/{num}', 'AreaRiservataController@operazione1');
Route::get('operazioni/2/{str}', 'AreaRiservataController@operazione2');
Route::get('operazioni/3/{cf}/{nome}/{cognome}/{datanascita}', 'AreaRiservataController@operazione3');
Route::get('operazioni/4', 'AreaRiservataController@operazione4');

