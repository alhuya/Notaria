<?php
 
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
    return view('welcome'); 
});

Auth::routes();  

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuarios', 'NotariaController@index')->name('registro');
Route::post('/usuarios', 'NotariaController@store');
Route::resource('tasks', 'TasksController');

///// ELIMINAR USUARIO //////

Route::get('/eliminar_usuario', 'EliminarUsuarioController@index')->name('eliminar_us');
Route::delete('/eliminar_usuario/{id}', 'EliminarUsuarioController@destroy');
//Route::get('User/{id}', 'EliminarUsuarioController@store');

////////   EDITAR USUARIO ///////
Route::get('/editar_usuario', 'editarUsuarioController@index')->name('editar_us');
Route::get('User/{id}', 'editarUsuarioController@store'); 
Route::patch('/eliminar_usuario/{id}', 'editarUsuarioController@update');
//Route::get('/editar_usuario', 'editarUsuarioController@create')->name('editar_us2');

////// PUESTOS USUARIOS ///
Route::get('/puestos', 'PuestosController@index')->name('puestos_us');
//Route::get('/puestos', 'PuestosController@create');
Route::post('/puestos', 'PuestosController@store');
// Route::get('/editar_usuario', 'editarUsuarioController@create')->name('editar_usuario');

///////////  ALTA TRAMITE //////
Route::get('/alta_tramite', 'AltaTramiteController@index')->name('alta_tramite');
Route::post('/alta_tramite', 'AltaTramiteController@store');

////// TRAMITE ABOGADO ////
Route::get('/tramite_abogado','TramiteAbogadoController@index')->name('tramite_abogado');

//// CONSULTA USUARIO ///

Route::get('/consulta_usuario','ConsultaUsuarioController@index')->name('consulta_usuario');






///////// ASIGNAR FNCIONES /////

Route::get('/asignar_fuciones','AsignarFuncionesController@index')->name('asignar_funciones');


/////////// REPORTES USUARIO /////

Route::get('/reportes_usuario','ReportesUsuarioController@index')->name('reportes_usuario');

///////// REGISTRAR CLIENTE ////

Route::get('/registrar_cliente','RegistrarClienteController@index')->name('registrar_cliente');
Route::post('/registrar_cliente', 'RegistrarClienteController@store');

/////// ALTA DOCUMENTACION ////


Route::get('/alta_documentacion','AltaDocmentacionController@index')->name('alta_documentacion');
Route::post('/alta_documentacion', 'AltaDocmentacionController@store');
//Route::post('/alta_documentacion', 'AltaDocmentacionController@Validator');
?>
