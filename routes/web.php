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
Route::get('/usuarios', 'NotariaController@index')->name('registro')->middleware('auth'); 
Route::post('/usuarios', 'NotariaController@store');



///// ELIMINAR USUARIO //////

Route::get('/eliminar_usuario', 'EliminarUsuarioController@index')->name('eliminar_us')->middleware('auth'); 
Route::delete('/eliminar_usuario', 'EliminarUsuarioController@destroy');
Route::get('User/{id}', 'EliminarUsuarioController@store'); 

 

////////   EDITAR USUARIO ///////
Route::get('/editar_usuario', 'editarUsuarioController@index')->name('editar_us')->middleware('auth');  
//Route::get('User/{id}', 'editarUsuarioController@store'); // Se esta usando el de eliminarusuario
Route::post('/editar_usuario', 'editarUsuarioController@update')->name('ed'); 
 
////// PUESTOS USUARIOS ///
Route::get('/puestos', 'PuestosController@index')->name('puestos_us')->middleware('auth');  
Route::post('/puestos', 'PuestosController@store');

///////////  ALTA TRAMITE //////
Route::get('/alta_tramite', 'AltaTramiteController@index')->name('alta_tramite')->middleware('auth'); 
Route::post('/alta_tramite', 'AltaTramiteController@store');

////////// ELIMINAR TRAMITE ////
Route::get('/eliminar_tramite', 'EliminarTramiteController@index')->name('eliminar_tramite')->middleware('auth'); 
Route::delete('/eliminar_tramite', 'EliminarTramiteController@destroy'); 
Route::get('TiposTramites/{id}', 'EliminarTramiteController@store'); 

/////////  EDITAR TRAMITE ///// 
Route::get('/editar_tramite', 'EditarTramiteController@index')->name('editar_tramite')->middleware('auth');  
Route::get('TiposTramites/{id}', 'EditarTramiteController@store'); 
Route::patch('/editar_tramite', 'EditarTramiteController@update');
 
//////// CONSULTA TRAMITES ///////////
Route::get('/Documentacion_tramite', 'DocumentacionTramiteController@index')->name('Doc_tram')->middleware('auth'); 
Route::get('tramite_documento/{id}', 'DocumentacionTramiteController@store');

Route::get('/requisitos_terceros', 'RequisitosTercerosController@index')->name('req_ter')->middleware('auth'); 
  
 
 

////// TRAMITE ABOGADO ////
Route::get('/tramite_abogado','TramiteAbogadoController@index')->name('tramite_abogado')->middleware('auth'); 
Route::POST('/tramite_abogado','TramiteAbogadoController@store');

//// CONSULTA USUARIO /// 
 
Route::get('/consulta_usuario','ConsultaUsuarioController@index')->name('consulta_usuario')->middleware('auth'); 
Route::get('User/{id}', 'ConsultaUsuarioController@store');  

///////// ASIGNAR FNCIONES /////

Route::get('/asignar_fuciones','AsignarFuncionesController@index')->name('asignar_funciones')->middleware('auth'); 
Route::get('categoriaPuesto/{id}', 'AsignarFuncionesController@store');

///// FUNCIONES ////
Route::get('/funciones/{id}/{puesto}','FuncionesController@index')->name('funcion')->middleware('auth'); 
Route::patch('/funciones/{id}/{puesto}','FuncionesController@store');
 
 
/////////// REPORTES USUARIO ///// 

Route::get('/reportes_usuario','ReportesUsuarioController@index')->name('reportes_usuario')->middleware('auth'); 
Route::get('/reporte_us','ReportesUsController@index')->name('rep_us')->middleware('auth'); 
 
Route::get('pdf', 'ReportesUsPDFController@index')->middleware('auth');
Route::get('pdf/reporte_uspdf','ReportesUsPDFController@getGenerar');

Route::get('/menu_usuarios','UsuariosMenuController@index')->name('menu_us')->middleware('auth');
Route::get('Menu/{id}', 'UsuariosMenuController@store');   
Route::get('pdf', 'MenuPDFuController@index')->middleware('auth');
Route::get('pdf/menu_pdf/{id}','MenuPDFuController@getGenerar');
  
Route::get('UsActivos', 'ReportesUsuarioController@store1'); 
Route::get('UsInactivos', 'ReportesUsuarioController@store2'); 
Route::get('allUs', 'ReportesUsuarioController@store3');
 
Route::get('pdf', 'ActivosPdfController@index')->middleware('auth');
Route::get('pdf/pdf_estado/{id}','ActivosPdfController@getGenerar');

Route::get('/reporte_abogado','ReporteAbogadoController@index')->name('r_abog')->middleware('auth'); 
Route::get('HorarioAbogado/{id}', 'ReporteAbogadoController@store');  


 
///////// REGISTRAR CLIENTE ////

Route::get('/registrar_cliente','RegistrarClienteController@index')->name('registrar_cliente')->middleware('auth'); 
Route::get('Estados_Municipios/{id}', 'RegistrarClienteController@store2'); 

Route::post('/registrar_cliente', 'RegistrarClienteController@store');
 

/////// ALTA DOCUMENTACION ////
Route::get('/alta_documentacion','AltaDocmentacionController@index')->name('alta_documentacion')->middleware('auth'); 
Route::post('/alta_documentacion', 'AltaDocmentacionController@store');
//Route::post('/alta_documentacion', 'AltaDocmentacionController@Validator');

   
//// EDITAR CLIENTE ////

Route::get('/editar_cliente', 'EditarClienteController@index')->name('editar_client')->middleware('auth'); 
Route::get('Clientes/{id}', 'EditarClienteController@store'); 
Route::post('/editar_cliente', 'EditarClienteController@update')->name('client'); 
//Route::get('/editar_usuario', 'editarUsuarioController@create')->name('editar_us2');
 

 
/////// ELIMINAR CLIENTE ///
Route::get('/eliminar_cliente', 'EliminarClienteController@index')->name('eliminar_client')->middleware('auth'); 
Route::delete('/eliminar_cliente', 'EliminarClienteController@destroy');
Route::get('Clientes/{id}', 'EliminarClienteController@store');  

/// Reportes Clientes // 
Route::get('/Reportes_clientes', 'ReportesClientesController@index')->name('rep')->middleware('auth');
Route::get('/reportes_allclientes','ReportesallclientesController@index')->name('reportes_cliente')->middleware('auth');
Route::get('pdf', 'MPDFController@index')->name('mpdf')->middleware('auth'); 
Route::get('pdf/generar','MPDFController@getGenerar');
  
  
  
///// ELIMINAR DOCUMENTACION ///
Route::get('/eliminar_documento', 'EliminarDoumentoController@index')->name('eliminar_doc')->middleware('auth'); 
Route::delete('/eliminar_documento', 'EliminarDoumentoController@destroy'); 
Route::get('Documentacion/{id}', 'EliminarDoumentoController@store'); 
  
 
////// COSNULTAR CLIENTE ///// 
Route::get('/consulta_cliente', 'ConsultaClienteController@index')->name('consulta_client')->middleware('auth'); 
Route::get('Clientes/{id}', 'ConsultaClienteController@store'); 
  
//// VITACORA ////////////
Route::get('/Bitacora', 'VitacoraController@index')->name('vitacora')->middleware('auth');
Route::post('/Bitacora', 'VitacoraController@store')->name('insertvit');

///////// EDITAR DOCUMENTO //////// 
 
Route::get('/editar_documento', 'EditarDoumentoController@index')->name('editar_doc')->middleware('auth'); 
Route::get('Documentacion/{id}', 'EditarDoumentoController@store'); 
Route::patch('/editar_documento', 'EditarDoumentoController@update'); 

/// REPORTES TRAMITES ///////////
Route::get('/reportes_tramites', 'ReportesTramitesController@index')->name('rep_tram')->middleware('auth');
Route::get('/reporte_doctram', 'ReporteDOCTRAMController@index')->name('rep_doctram')->middleware('auth');
Route::get('RepTramites/{id}', 'ReporteDOCTRAMController@store');  

Route::get('pdf', 'DocTramPDFController@index')->name('mpdf')->middleware('auth');
Route::get('pdf/doctram_pdf/{tram}/{client}','DocTramPDFController@getGenerar'); 
  

////// AGENDA //// 
Route::get('/agenda', 'AgendaController@index')->name('agenda')->middleware('auth'); 
Route::get('Citas/{id}', 'AgendaController@store');
   
 
//////// ALTA CITA //// 
Route::get('/alta_cita', 'AltaCitaController@index')->name('cita')->middleware('auth');  
Route::post('/alta_cita', 'AltaCitaController@store'); 
  
//// EDITAR TIPOS CITAS //////
Route::get('/tipos_citas', 'TiposCitasController@index')->name('tipo')->middleware('auth'); 
Route::get('TipoCitas/{id}','TiposCitasController@store');  
Route::post('/tipos_citas', 'TiposCitasController@update')->name('tipoedit');   
 
/// REPORTES RECEPCION CLIENTES ///
Route::get('/reportes_recepcion', 'ReportesRecepcionController@index')->name('rep_recepcion')->middleware('auth'); 
Route::get('/reporte_vitacora', 'ReporteVitacoraController@index')->name('rep_vitacora')->middleware('auth');     
Route::get('Vitacora/{fechain}/{fechafin}','ReporteVitacoraController@store');  
Route::get('pdf', 'VitacoraPDFController@index')->middleware('auth');
Route::get('pdf/vitacora_pdf/{fechain}/{fechafin}','VitacoraPDFController@getGenerar');  
Route::get('/Reporte_cita_abogado','ReporteCitaAbogadoController@index')->name('rep_citabog')->middleware('auth');
Route::get('Citas/{id}','ReporteCitaAbogadoController@store');
Route::get('pdf/vitacora_pdf/{fechain}/{fechafin}','VitacoraPDFController@getGenerar');



Route::get('pdf', 'ReporteCitaPDFController@index')->middleware('auth');
Route::get('pdf/reporte_citapdf/{id}','ReporteCitaPDFController@getGenerar'); 

///// TARIFAS //// 
Route::get('/tarifas', 'TarifasController@index')->name('tarifas')->middleware('auth'); 
Route::get('ConceptoCosto2/{id}/{tipo}', 'TarifasController@store'); 


///// CONSULTA TRAMITE ///// 
Route::get('/consulta_tramite', 'ConsultaTramiteController@index')->name('consult_tramites')->middleware('auth'); 
Route::get('tramite_documento/{id}', 'ConsultaTramiteControllerr@store'); 

///// VALIDA DOCUMENTACION ////
Route::get('/validacion_documentacion', 'ValidacionDocumentacionController@index')->name('valida_doc')->middleware('auth'); 
Route::get('tramite_documento/{id}', 'ValidacionDocumentacionController@store'); 
Route::post('/validacion_documentacion', 'ValidacionDocumentacionController@store2'); 
 

///////// CONCEPTO COSTO //// 
 
Route::get('/concepto_costo', 'ConceptoCostoController@index')->name('costo')->middleware('auth'); 
Route::post('/concepto_costo','ConceptoCostoController@store'); 

///////// CONCEPTO /////  

Route::get('/concepto', 'ConceptoController@index')->name('concepto')->middleware('auth'); 
Route::post('/concepto', 'ConceptoController@store');
 
//// Reportes Tarifas /// 
Route::get('/Reportes_Tarifario','ReportesTarifarioController@index')->name('reptarif')->middleware('auth'); 
Route::get('/Reporte_Tarifa','ReporteTarifaController@index')->name('rtarifa')->middleware('auth'); 
Route::get('pdf', 'PDFTarifasaController@index')->name('mpdf')->middleware('auth');
Route::get('pdf/reporte_tarifas/{tramite}/{client}/{valor}','PDFTarifasaController@getGenerar');  
 
/////// EDITAR CITA ////////////////// 
Route::get('/editar_cita', 'EditarCitaController@index')->name('editarcita')->middleware('auth'); 
Route::post('/editar_cita','EditarCitaController@update')->name('edcit');  
   

//////// Consulta Cita ///////////////
 
Route::get('/consulta_citas', 'ConsultaCitaController@index')->name('consultacita')->middleware('auth'); 

//////// CONFIRMA TRAMITE /////

Route::get('/confirma_tramite', 'ConfirmaTramiteController@index')->name('confirma')->middleware('auth'); 
Route::get('tramite_documento/{id}', 'ConfirmaTramiteController@store');  
Route::post('/confirma_tramite', 'ConfirmaTramiteController@store2'); 
///////////VALIDA DOCUMENTOS ///////// 
  
Route::get('/apertura_carpetas', 'AperturaCarpetasController@index')->name('apertura')->middleware('auth'); 
Route::post('apertura_carpetas', 'AperturaCarpetasController@store');

 ///////////// APERTURA CARPETAS ////  
 Route::get('/valida_documentos', 'ValidaDocumentosController@index')->name('validacion')->middleware('auth');   
  
 
 //////////// ASIGNACION DE FOLIO //////////////
 Route::get('/asignacion_folio','AsignacionFolioController@index')->name('folio')->middleware('auth');  
 Route::get('ControlTramitesFolio/{cliente}/{carpeta}','AsignacionFolioController@store');  
 Route::get('GuiaCliente/{cliente}','AsignacionFolioController@store2');  

   

 
 ////////// ELABORACION DE PRESUPUESTO ///////
 Route::get('/elaboracion_presupuesto','TarifasPresupuestoController@index')->name('elab_prep')->middleware('auth'); 
 //Route::get('ElaboracionPresupuesto/{id}', 'TarifasPresupuestoController@store2'); 
 Route::post('/elaboracion_presupuesto','TarifasPresupuestoController@store')->name('insertprep'); 
 Route::get('ElaboraPresupuesto/{id}/{tipo}','TarifasPresupuestoController@store3');
 
 
 ////// EDITAR CONCEPTO COSTO ////
 Route::get('/editar_concepto_costo','EditarConceptoCostoController@index')->name('editcc')->middleware('auth'); 
 Route::post('/editar_concepto_costo', 'EditarConceptoCostoController@update');
  
 /////// PAGO DEPENDENCIAS //////// 
 Route::get('/pago_dependencias','PagoDependenciasController@index')->name('pago')->middleware('auth'); 
 
 /////////  ENVIO CONTROL CALIDAD //////
 Route::get('/envio_control_calidad','EnvioCalidadController@index')->name('envio')->middleware('auth');  
 Route::post('/envio_control_calidad','EnvioCalidadController@store') ;

 ///////// CONSULTA REVISIONES ///////// 
 Route::get('/Consulta_Revisiones','ConsultaRevicionesController@index')->name('consult_rev')->middleware('auth');
 Route::get('/Consulta_rev1','ConsultaRev1Controller@index')->name('c_rev1')->middleware('auth'); 
 Route::get('ConsultaRevisiones/{id}','ConsultaRev1Controller@store');      

   
 ////////// PRESUPUESTO CONTROLER /////////
 Route::get('/presupuesto','PresupuestoController@index')->name('presupuesto')->middleware('auth');  
 Route::get('PresupuestoConsulta/{numero}','PresupuestoController@store');   
 
 //////////// REVICION 1 //////
 Route::get('/revicion1','Revicion1Controller@index')->name('rev1')->middleware('auth');  
 Route::get('ControlTramites/{id}','Revicion1Controller@store');   
 Route::post('/revicion1','Revicion1Controller@update')->name('insertrev');  
 
 //////////// REVICION 2 /////////////// 
 Route::get('/revicion2','Revicion2Controller@index')->name('rev2')->middleware('auth'); 
 Route::post('/revicion2','Revicion2Controller@update');

 ///////// REVICION 3 ///////////
 Route::get('/revicion3','Revicion3Controller@index')->name('rev3')->middleware('auth'); 
 Route::post('/revicion3','Revicion3Controller@update');

 ///// REPORTES ABOGADOS ///
 Route::get('/reportes_abogados','ReportesAbogadosController@index')->name('rep_abogados')->middleware('auth'); 
 
 

 ///////// EDITA PRESUPUESTO ///////
 Route::get('/revicion3','Revicion3Controller@index')->name('rev3')->middleware('auth'); 

////////// FINIQUITO DE TRAMITES ////////
Route::get('/finiquito_tramites','FiniquitoTramitesController@index')->name('finiquitar')->middleware('auth');   

///////// EDITA PRESUPUESTO //////
Route::get('/edita_presupuesto','EditaPresupuestoController@index')->name('updateprep')->middleware('auth'); 
Route::post('/edita_presupuesto','EditaPresupuestoController@store'); 
  

//////// AUTORIZA PRESUPUESTO ////
Route::get('/autoriza_presupuesto','AutorizaPresupuestoController@index')->name('prepa')->middleware('auth');   
Route::post('/autoriza_presupuesto','AutorizaPresupuestoController@store'); 
  
///////// RECEPCCION DE PAGOS /////
 
Route::get('/recepcion_pagos','RecepcionPagosController@index')->name('pago')->middleware('auth');  
Route::post('/recepcion_pagos','RecepcionPagosController@store')->name('insert_pago');     

//////// CORTES //// 
Route::get('/cortes','CortesController@index')->name('cortes')->middleware('auth'); 
Route::post('/cortes','CortesController@store')->name('insert_corte'); 

//////////  Corte Impuesto //// 
Route::get('/corteimp','CortesImpuestoController@index')->name('cortes_imp')->middleware('auth'); 
Route::post('/corteimp','CortesImpuestoController@store');

 /////// Reportes Cuentas por Pagar ///
 Route::get('/reportes_cuentas_pagar','ReportesCuentasPagarController@index')->name('rep_cuent_pag')->middleware('auth'); 
 
///////// ACTUALIZA ////////
Route::get('/actualiza','ActualizaController@index')->name('ac')->middleware('auth');   

///////// REGISTRO_GUIA //////// 
Route::get('/registro_guia','RegistroGuiaController@index')->name('registro')->middleware('auth');  
Route::post('/registro_guia','RegistroGuiaController@update');
//Route::post('/registro_guia','RegistroGuiaController@store')->name('insert_reg'); 

  
//////// ENTREGA KINEGRAMAS ///// 
Route::get('/entrega_kinegramas','EntregaKinegramasController@index')->name('entki')->middleware('auth'); 
Route::get('Kinegramas/{id}', 'EntregaKinegramasController@store'); 
Route::post('/entrega_kinegramas','EntregaKinegramasController@store2');
//Route::post('/entrega_kinegramas', 'EntregaKinegramasController@update');
     
///// TRAMITES TERMINADOS ///////// 
Route::get('/Entregas','EntregasController@index')->name('entregas')->middleware('auth'); 
Route::get('Entregas/{id}', 'EntregasController@store'); 
Route::post('/Entregas','EntregasController@store2');

 
   
//// Reportes Caja ///
Route::get('/reportes_caja','ReportesCajaController@index')->name('rep_caja')->middleware('auth'); 
Route::get('/reporte_presupuesto','ReportePresupuestoController@index')->name('rep_presupuesto')->middleware('auth');

Route::get('pdf','PresupuestoPDFController@index')->name('mpdf')->middleware('auth');
Route::get('pdf/pdf_presupuesto/{n}/{cantidad}/{total}','PresupuestoPDFController@getGenerar');  

Route::get('/reporte_guia','ReporteGuiaController@index')->name('rep_guia')->middleware('auth'); 
Route::get('Guia/{id}','ReporteGuiaController@store');
Route::get('Carpetas','ReporteGuiaController@store1');  
Route::get('GuiaCliente/{id}','ReporteGuiaController@store2'); 
Route::get('GuiaCarpeta/{id}','ReporteGuiaController@store3'); 

Route::get('pdf','GuiaEscrituraPDFController@index')->name('mpdf')->middleware('auth');
Route::get('pdf/pdf_guiaesc/{id}','GuiaEscrituraPDFController@getGenerar');  

Route::get('pdf','GuiaCarpetaPDFController@index')->name('mpdf')->middleware('auth');
Route::get('pdf/pdf_guiacarp/{id}','GuiaCarpetaPDFController@getGenerar');  


Route::get('pdf','GuiaClientePDFController@index')->name('mpdf')->middleware('auth');
Route::get('pdf/pdf_guiaclient/{id}','GuiaClientePDFController@getGenerar'); 



 
 
////////// CONTROL PAGO DEPENDENCIAS ////
Route::get('/control_pago_dependencias','ControlPagoDependenciasController@index')->name('CPD')->middleware('auth'); 
Route::post('/control_pago_dependencias','ControlPagoDependenciasController@store')->name('pagodep');

/////// CONTROL PAGO IMPUESTOS ////////
Route::get('/control_pago_impuestos','ControlPagoImpuestosController@index')->name('CPI')->middleware('auth'); 
Route::post('/control_pago_impuestos','ControlPagoImpuestosController@store')->name('pagoimp');
 

/////// CORTE CUENTAS POR PAGAR ////

Route::get('/corte_cp','CorteCPController@index')->name('CCP')->middleware('auth');  
Route::post('/corte_cp','CorteCPController@store');

/////// TRAMITES TERMINADOS ////

Route::get('/tramites_terminados','TramitesTerminadosController@index')->name('TT')->middleware('auth');
Route::get('TramitesTerminados/{id}','TramitesTerminadosController@store');    

Route::get('pdf','TramTermPDFController@index')->name('mpdf')->middleware('auth');
Route::get('pdf/pdf_tramterm2/{id}/{dato}','TramTermPDFController@getGenerar');  
   
/////// INGRESO ////

Route::get('/ingreso','ingresoController@index')->name('in')->middleware('auth'); 
Route::post('/ingreso','ingresoController@store');

 
///// EGRESO //// 
Route::get('/egreso','egresoController@index')->name('egreso')->middleware('auth'); 
Route::get('ProyectoDependencia/{id}','egresoController@store'); 
Route::post('/egreso','egresoController@store2');  
 
////// REPORTES ARCHIVO // 
Route::get('/reportes_archivo','ReportesArchivorController@index')->name('rep_archiv')->middleware('auth'); 
Route::get('/reporte_tramterm','ReporteTramTermController@index')->name('rep_tramter')->middleware('auth'); 

Route::get('TramitesTerminados/{id}','ReporteTramTermController@store');
Route::get('CarpetasTerm','ReporteTramTermController@store1');  
Route::get('TramTermClient/{id}','ReporteTramTermController@store2'); 
Route::get('TramTermCarpet/{id}','ReporteTramTermController@store3');  

// pdf tramites terminados



//////// ASIGNAR HORARIO LABORAL //////
Route::get('/asignar_horario_laboral','AsignarHorarioLaboralController@index')->name('horario')->middleware('auth');  
Route::post('/asignar_horario_laboral','AsignarHorarioLaboralController@store')->name('hi');  ;  

///////// HORARIO   CLIENTE /////////

Route::get('/horario_atencion_clientes','HorarioAtencionClienteController@index')->name('atc')->middleware('auth');   
Route::post('/horario_atencion_clientes','HorarioAtencionClienteController@store')->name('hora_cliente'); 


//Route::get("/test/{x}",function($x){
 //   return "El valor es: ".$x;
//});



  




  

 
 



 
 


 

 



 

 
?>
  