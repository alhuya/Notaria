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

////////// ELIMINAR TRAMITE ////
Route::get('/eliminar_tramite', 'EliminarTramiteController@index')->name('eliminar_tramite');
Route::delete('/eliminar_tramite/{id}', 'EliminarTramiteController@destroy'); 
Route::get('TiposTramites/{id}', 'EliminarTramiteController@store'); 

/////////  EDITAR TRAMITE /////
Route::get('/editar_tramite', 'EditarTramiteController@index')->name('editar_tramite'); 
Route::get('TiposTramites/{id}', 'EditarTramiteController@store'); 
Route::patch('/editar_tramite/{id}', 'EditarTramiteController@update');

//////// CONSULTA TRAMITES ///////////
Route::get('/Documentacion_tramite', 'DocumentacionTramiteController@index')->name('Doc_tram');





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
Route::get('Municipios/{id}', 'RegistrarClienteController@store2'); 

Route::post('/registrar_cliente', 'RegistrarClienteController@store');


/////// ALTA DOCUMENTACION ////
Route::get('/alta_documentacion','AltaDocmentacionController@index')->name('alta_documentacion');
Route::post('/alta_documentacion', 'AltaDocmentacionController@store');
//Route::post('/alta_documentacion', 'AltaDocmentacionController@Validator');

  
//// EDITAR CLIENTE ////

Route::get('/editar_cliente', 'EditarClienteController@index')->name('editar_client');
Route::get('Clientes/{id}', 'EditarClienteController@store'); 
Route::patch('/editar_cliente/{id}', 'EditarClienteController@update');
//Route::get('/editar_usuario', 'editarUsuarioController@create')->name('editar_us2');


/////// ELIMINAR CLIENTE ///
Route::get('/eliminar_cliente', 'EliminarClienteController@index')->name('eliminar_client');
Route::delete('/eliminar_cliente/{id}', 'EliminarClienteController@destroy');
Route::get('Clientes/{id}', 'EliminarClienteController@store'); 

///// ELIMINAR DOCUMENTACION ///
Route::get('/eliminar_documento', 'EliminarDoumentoController@index')->name('eliminar_doc');
Route::delete('/eliminar_documento/{id}', 'EliminarDoumentoController@destroy'); 
Route::get('Documentacion/{id}', 'EliminarDoumentoController@store'); 

////// COSNULTAR CLIENTE /////
Route::get('/consulta_cliente', 'ConsultaClienteController@index')->name('consulta_client');

///////// EDITAR DOCUMENTO ////////

Route::get('/editar_documento', 'EditarDoumentoController@index')->name('editar_doc');
Route::get('Documentacion/{id}', 'EditarDoumentoController@store'); 
Route::patch('/editar_documento/{id}', 'EditarDoumentoController@update');

////// AGENDA ////
Route::get('/agenda', 'AgendaController@index')->name('agenda');  

//////// ALTA CITA //// 
Route::get('/alta_cita', 'AltaCitaController@index')->name('cita');
Route::post('/alta_cita', 'AltaCitaController@store');
 
//// EDITAR TIPOS CITAS //////
Route::get('/tipos_citas', 'TiposCitasController@index')->name('tipo');
Route::get('TipoCitas/{id}', 'TiposCitasController@store'); 
Route::patch('/tipos_citas/{id}', 'TiposCitasController@update'); 

///// TARIFAS //// 
Route::get('/tarifas', 'TarifasController@index')->name('tarifas');


///// CONSULTA TRAMITE /////
Route::get('/consulta_tramite', 'ConsultaTramiteController@index')->name('consult_tramites');

///// VALIDA DOCUMENTACION ////
Route::get('/validacion_documentacion', 'ValidacionDocumentacionController@index')->name('valida_doc');




 



 

 
?>
  