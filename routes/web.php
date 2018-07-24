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
Route::get('tramite_documento/{id}', 'DocumentacionTramiteController@store');
  
 
 

////// TRAMITE ABOGADO ////
Route::get('/tramite_abogado','TramiteAbogadoController@index')->name('tramite_abogado');
Route::post('/tramite_abogado','TramiteAbogadoController@store');

//// CONSULTA USUARIO ///

Route::get('/consulta_usuario','ConsultaUsuarioController@index')->name('consulta_usuario');

///////// ASIGNAR FNCIONES /////

Route::get('/asignar_fuciones','AsignarFuncionesController@index')->name('asignar_funciones');
//Route::get('/asignar_fuciones','AsignarFuncionesController@store');
 
 
/////////// REPORTES USUARIO /////

Route::get('/reportes_usuario','ReportesUsuarioController@index')->name('reportes_usuario');
 
///////// REGISTRAR CLIENTE ////

Route::get('/registrar_cliente','RegistrarClienteController@index')->name('registrar_cliente');
Route::get('Estados_Municipios/{id}', 'RegistrarClienteController@store2'); 

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
Route::get('Clientes/{id}', 'ConsultaClienteController@store'); 

///////// EDITAR DOCUMENTO ////////

Route::get('/editar_documento', 'EditarDoumentoController@index')->name('editar_doc');
Route::get('Documentacion/{id}', 'EditarDoumentoController@store'); 
Route::patch('/editar_documento/{id}', 'EditarDoumentoController@update'); 
 
////// AGENDA //// 
Route::get('/agenda', 'AgendaController@index')->name('agenda'); 
Route::get('Citas/{id}', 'AgendaController@store');
 

//////// ALTA CITA //// 
Route::get('/alta_cita', 'AltaCitaController@index')->name('cita');
Route::post('/alta_cita', 'AltaCitaController@store'); 
 
//// EDITAR TIPOS CITAS //////
Route::get('/tipos_citas', 'TiposCitasController@index')->name('tipo');
Route::get('TipoCitas/{id}', 'TiposCitasController@store');  
Route::patch('/tipos_citas/{id}', 'TiposCitasController@update'); 

///// TARIFAS //// 
Route::get('/tarifas', 'TarifasController@index')->name('tarifas');
Route::get('ConceptoCosto/{id}/{tipo}', 'TarifasController@store'); 


///// CONSULTA TRAMITE /////
Route::get('/consulta_tramite', 'ConsultaTramiteController@index')->name('consult_tramites');
Route::get('tramite_documento/{id}', 'ConsultaTramiteControllerr@store'); 

///// VALIDA DOCUMENTACION ////
Route::get('/validacion_documentacion', 'ValidacionDocumentacionController@index')->name('valida_doc');
Route::get('tramite_documento/{id}', 'ValidacionDocumentacionController@store'); 

///////// CONCEPTO COSTO ////
 
Route::get('/concepto_costo', 'ConceptoCostoController@index')->name('costo');
Route::post('ConceptoCosto/{id}', 'ConceptoCostoController@store'); 

///////// CONCEPTO /////

Route::get('/concepto', 'ConceptoController@index')->name('concepto');
Route::post('/concepto', 'ConceptoController@store');
 

/////// EDITAR CITA ////////////////// 
Route::get('/editar_cita', 'EditarCitaController@index')->name('editarcita');

//////// Consulta Cita ///////////////

Route::get('/consulta_citas', 'ConsultaCitaController@index')->name('consultacita');

//////// CONFIRMA TRAMITE /////

Route::get('/confirma_tramite', 'ConfirmaTramiteController@index')->name('confirma');
Route::get('tramite_documento/{id}', 'ConfirmaTramiteController@store');  
Route::post('/confirma_tramite', 'ConfirmaTramiteController@store2'); 
///////////VALIDA DOCUMENTOS /////////

Route::get('/apertura_carpetas', 'AperturaCarpetasController@index')->name('apertura'); 
Route::post('apertura_carpetas', 'AperturaCarpetasController@store');

 ///////////// APERTURA CARPETAS ////  
 Route::get('/valida_documentos', 'ValidaDocumentosController@index')->name('validacion');  
 

 //////////// ASIGNACION DE FOLIO //////////////
 Route::get('/asignacion_folio','AsignacionFolioController@index')->name('folio');  
 Route::get('ControlTramites/{id}', 'AsignacionFolioController@store');    


 ////////// ELABORACION DE PRESUPUESTO ///////
 Route::get('/elaboracion_presupuesto','TarifasPresupuestoController@index')->name('elab_prep'); 
 

 /////// PAGO DEPENDENCIAS ////////
 Route::get('/pago_dependencias','PagoDependenciasController@index')->name('pago'); 

 /////////  ENVIO CONTROL CALIDAD //////
 Route::get('/envio_control_calidad','EnvioCalidadController@index')->name('envio'); 
 Route::post('/envio_control_calidad','EnvioCalidadController@store');
  
 ////////// PRESUPUESTO CONTROLER /////////

 Route::get('/presupuesto','PresupuestoController@index')->name('presupuesto');

 //////////// REVICION 1 //////
 Route::get('/revicion1','Revicion1Controller@index')->name('rev1');
 
 //////////// REVICION 2 ///////////////
 Route::get('/revicion2','Revicion2Controller@index')->name('rev2');

 ///////// REVICION 3 ///////////
 Route::get('/revicion3','Revicion3Controller@index')->name('rev3');

 ///////// EDITA PRESUPUESTO ///////
 Route::get('/revicion3','Revicion3Controller@index')->name('rev3');

////////// FINIQUITO DE TRAMITES ////////
Route::get('/finiquito_tramites','FiniquitoTramitesController@index')->name('finiquitar');  

///////// EDITA PRESUPUESTO //////
Route::get('/edita_presupuesto','EditaPresupuestoController@index')->name('updateprep');  

//////// AUTORIZA PRESUPUESTO ////
Route::get('/autoriza_presupuesto','AutorizaPresupuestoController@index')->name('prepa');  

///////// RECEPCCION DE PAGOS /////

Route::get('/recepcion_pagos','RecepcionPagosController@index')->name('pago');   

//////// CORTES ////
Route::get('/cortes','CortesController@index')->name('cortes');

///////// ACTUALIZA ////////
Route::get('/actualiza','ActualizaController@index')->name('ac');   

///////// REGISTRO_GUIA //////// 
Route::get('/registro_guia','RegistroGuiaController@index')->name('registro');  
Route::patch('/registro_guia/{id}', 'RegistroGuiaController@update');   


//////// ENTREGA KINEGRAMAS /////
Route::get('/entrega_kinegramas','EntregaKinegramasController@index')->name('entki'); 
Route::get('ControlTramites/{id}', 'EntregaKinegramasController@store'); 
Route::post('/entrega_kinegramas','EntregaKinegramasController@store2')->name('kin'); 
Route::patch('/entrega_kinegramas/{id}', 'EntregaKinegramasController@update');
 
 

////////// CONTROL PAGO DEPENDENCIAS ////
Route::get('/control_pago_dependencias','ControlPagoDependenciasController@index')->name('CPD');

/////// CONTROL PAGO IMPUESTOS ////////
Route::get('/control_pago_impuestos','ControlPagoImpuestosController@index')->name('CPI');


/////// CORTE CUENTAS POR PAGAR ////

Route::get('/corte_cp','CorteCPController@index')->name('CCP'); 

/////// TRAMITES TERMINADOS ////

Route::get('/tramites_terminados','TramitesTerminadosController@index')->name('TT');
  
/////// INGRESO ////

Route::get('/ingreso','ingresoController@index')->name('in'); 

///// EGRESO //// 
Route::get('/egreso','egresoController@index')->name('egreso');   
//////// ASIGNAR HORARIO LABORAL //////
Route::get('/asignar_horario_laboral','AsignarHorarioLaboralController@index')->name('horario');  
Route::post('/asignar_horario_laboral','AsignarHorarioLaboralController@store')->name('hi');  ;  

///////// HORARIO ATENCION CLIENTE /////////

Route::get('/horario_atencion_clientes','HorarioAtencionClienteController@index')->name('atc');  
Route::post('/horario_atencion_clientes','HorarioAtencionClienteController@store')->name('hora_cliente');  ;  
  




  

 
 



 
 


 

 



 

 
?>
  