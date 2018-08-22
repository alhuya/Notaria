<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

<div id="wrapper"> 
  
        <div id="sidebar-wrapper" class="menu">
            <ul class="sidebar-nav">
              <li  data-toggle="collapse" data-target="#homr" class="btn-menu collapsed active">
                  <a  href="{{ route('home') }}" >
                   Inicio</a>
                </li>
                 <!-- C L I E N T E S -->
               
                 @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 1)                       
             <li data-toggle="collapse" data-target="#clientes" class="btn-menu collapsed ">
                  <a href="#"> Clientes</a>
                </li>               
                   <ul class="sub-menu collapse" id="clientes">
                <!-- r e g i s t r a r  c l i e n t e -->
                   @foreach($funciones as $funcion)
                @if($funcion->funcion_id == 1)
                    <li style="border-top = 1px solid #fff"><a href="{{ route('registrar_cliente') }}">Registrar Cliente</a></li>
                    @endif
                  @endforeach
                  <!--  e d i t a r   c l i e n t e -->
                  @foreach($funciones as $funcion)
                @if($funcion->funcion_id == 2)
                    <li><a href="{{ route('editar_client') }}">Editar Cliente</a></li>
                    @endif
                  @endforeach
                  <!-- e l i m i n a r  c l i e n t e -->
                  @foreach($funciones as $funcion)
                @if($funcion->funcion_id == 3)
                    <li><a href="{{ route('eliminar_client') }}">Eliminar Cliente</a></li>
                  @endif
                  @endforeach
                  <!-- r e p o r t e s -->
                  @foreach($funciones as $funcion)
                @if($funcion->funcion_id == 4)
                    <li><a href="{{ route('rep') }}">Reportes</a></li>
                    @endif
                  @endforeach
                  </ul>
                  @endif
                   @endforeach

                <!-- T R A M I T E S  -->
                @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 2)                
                <li data-toggle="collapse" data-target="#tramites" class="btn-menu collapsed ">
                  <a href="#">Trámites</a>
                </li>   
                <ul class="sub-menu collapse" id="tramites">
                @foreach($funciones as $funcion)
                @if($funcion->funcion_id == 5)
                <!-- a l t a   d e   t r a m i t e -->
                  <li><a href="{{ route('alta_tramite') }}">Alta Trámite</a></li>
                  @endif
                  @endforeach
                  <!-- e l i m i n a r  t r a m i t e -->
                  @foreach($funciones as $funcion)
                @if($funcion->funcion_id == 6)
                  <li><a href="{{ route('eliminar_tramite') }}">Eliminar Trámite</a></li>
                  @endif
                  @endforeach
                  <!-- e d i t a r   t r a m i t e -->
                  @foreach($funciones as $funcion)
                @if($funcion->funcion_id == 7)
                  <li><a href="{{ route('editar_tramite') }}">Editar Trámite</a></li>
                  @endif
                  @endforeach
                   <li data-toggle="collapse" data-target="#documento" class=" collapsed "><a  class="dropdown-toggle" href="#" >
                   Documentación<span  class="caret"></span> 
                  </a></li>
                        <ul class="sub-menu collapse" id="documento">
                        <!-- a l t a   d o c u m e n t o -->
                        @foreach($funciones as $funcion)
                     @if($funcion->funcion_id == 8)
                            <li><a href="{{ route('alta_documentacion') }}">Alta Documento</a></li>
                            @endif
                        @endforeach
                        <!-- e l i m i n a r   d o c u m e n t o -->

                         @foreach($funciones as $funcion)
                         @if($funcion->funcion_id == 9)
                            <li><a href="{{ route('eliminar_doc') }}">Eliminar Documento</a></li>
                            @endif
                        @endforeach
                        <!-- e d i t a r  d o c u m e n t o -->
                        @foreach($funciones as $funcion)
                         @if($funcion->funcion_id == 10)
                            <li><a href="{{ route('editar_doc') }}">Editar Documento</a></li>
                            @endif
                        @endforeach
                        </ul>
                      <!-- Requisitos al Cliente -->
                      @foreach($funciones as $funcion)
                         @if($funcion->funcion_id == 11)
                   <li><a href="{{ route('Doc_tram') }}">Requisitos al Cliente</a></li>
                   @endif
                    @endforeach 
                    <!-- Requisitos de Terceros -->
                    @foreach($funciones as $funcion)
                         @if($funcion->funcion_id == 65)
                   <li><a href="{{ route('req_ter') }}">Requisitos con Terceros</a></li>
                   @endif
                    @endforeach 
                  <!-- r e p o r t e s -->
                  @foreach($funciones as $funcion)
                         @if($funcion->funcion_id == 12)
                  <li><a href="{{ route('rep_tram') }}">Reportes</a></li> 
                  @endif
                    @endforeach
                </ul>
                
                @endif
                   @endforeach
               <!-- T A R I F A R I O S  D E  H O N O R A R I O S  -->
               @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 3)
            <li data-toggle="collapse" data-target="#tarifas" class="btn-menu collapsed ">
                  <a href="#">Tarifario de Honorarios</a>
                </li>  
                <ul class="sub-menu collapse" id="tarifas"> 
                <!-- t a r i f a s -->
                @foreach($funciones as $funcion)
                         @if($funcion->funcion_id == 13)
                  <li><a href="{{ route('tarifas') }}">Tarifas</a></li>
                  @endif
                  @endforeach
                  <!-- a l t a  c o n c e p t o -->
                  @foreach($funciones as $funcion)
                         @if($funcion->funcion_id == 14)
                  <li><a href="{{ route('concepto') }}">Alta Concepto</a></li>
                  @endif
                  @endforeach
                  <!-- c o n c e p t o  c o s t o -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 15)
                  <li><a href="{{ route('costo') }}">Concepto Costo</a></li>
                 <!-- <li><a href="{{ route('editcc') }}">Editar Concepto Costo</a></li>-->
                 @endif
                  @endforeach
                  <!--  r e p o r t e s -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 16) 
                  <li><a href="{{ route('reptarif') }}">Reportes</a></li>
                  @endif
                  @endforeach
                </ul>
                @endif
                   @endforeach
 
                  <!-- R E C E P C I O N   D E   C L I E N T E S -->
                  @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 4) 
          
            <li data-toggle="collapse" data-target="#recepcion" class="btn-menu collapsed ">
                  <a href="#">Recepción de Clientes</a>
                </li>  
                <ul class="sub-menu collapse" id="recepcion">
                <!-- c o n s u l t a  c l i e n t e -->
                @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 17)
                  <li><a href="{{ route('consulta_client') }}">Consulta Cliente</a></li>
                  <!-- v i t a c o r a -->
                  <li><a href="{{ route('vitacora') }}">Bitácora</a></li>
                  @endif
                   @endforeach
                   
                  <li data-toggle="collapse" data-target="#realizar"><a  class="dropdown-toggle" href="#" >
                   Trámites a Realizar<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="realizar">
                   <!-- c  o n s u l t a  t r a m i t e -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 18)
                   <li ><a href="{{ route('consult_tramites') }}">Consulta Tramite</a></li>
                   @endif
                   @endforeach
                    <!-- v a l i d a  d o c u m e n t a c i o n -->
                    @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 19)
                    <li><a href="{{ route('valida_doc') }}">Validacion Documentación</a></li>
                    @endif
                   @endforeach
                   </ul>
                  <li data-toggle="collapse" data-target="#programacion"  collapsed ><a  class="dropdown-toggle" href="#" >
                   Programación de citas<span  class="caret"></span>
                  </a></li> 
                   <ul class="sub-menu collapse" id="programacion">
                   <!-- s e l e c c i o n  d e   a g e n d a -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 20)
                            <li ><a href="{{ route('agenda') }}">Selección de Agenda</a></li>
                   @endif
                   @endforeach
                   <!-- a l t a   d e  c i t a -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 21)
                            <li><a href="{{ route('cita') }}">Alta de cita</a></li>
                   @endif
                   @endforeach
                   <!-- e d i t a r  c i t a -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 22)
                            <li><a href="{{ route('editarcita') }}">Editar Cita</a></li>
                    @endif
                   @endforeach
                  <!-- t i p o s  d e  c i t a -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 23)
                            <li><a href="{{ route('tipo') }}">Tipos de cita</a></li>
                  @endif
                   @endforeach
                   </ul>
                   <!-- r e p o r t e s -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 24)
                  <li><a href="{{ route('rep_recepcion') }}">Reportes</a></li> 
                  @endif
                   @endforeach
                </ul>
                @endif
                   @endforeach

                 <!-- A B O G A D O S -->
                 @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 5)
                <li data-toggle="collapse" data-target="#abogado" class="btn-menu collapsed ">
                  <a href="#">Abogados</a>
                </li>  
                <ul class="sub-menu collapse" id="abogado">
                <!-- c o n s u l t a  c i t a -->
                @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 25)
                  <li><a href="{{ route('consultacita') }}">Consulta Citas</a></li>
                  @endif
                   @endforeach
                    <li data-toggle="collapse" data-target="#rep"><a  class="dropdown-toggle" href="#" >
                   Recepcion de clientes<span  class="caret"></span> 
                  </a></li>
                  <ul class="sub-menu collapse" id="rep">
                  <!-- c o n f i r m a r   t r a m i t e -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 26)
                            <li ><a href="{{ route('confirma') }}">Confirma Tramite</a></li>
                   @endif
                   @endforeach
                           <!-- <li><a href="{{ route('validacion') }}">Validacion Documentos</a></li>-->
                        </ul>
                        <li data-toggle="collapse" data-target="#tram"><a  class="dropdown-toggle" href="#" >
                   Creacion de Tramites<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="tram">
                   <!-- a p e r t u r a  d e  c a r p e t a s -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 28)
                            <li ><a href="{{ route('apertura') }}">Apertura de Carpetas</a></li>
                   @endif
                   @endforeach
                   <!-- c o n s u l t a  d e  f o l i o  i n t e r n o -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 29)
                            <li><a href="{{ route('folio') }}">Consulta de Folio Interno</a></li>
                   @endif
                   @endforeach
                   <!-- e l a b o r a c i o n  d e  p r e s u p u e s t o -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 30)
                            <li><a href="{{ route('elab_prep') }}">Elaboracion de Presupuesto</a></li>
                   @endif
                   @endforeach
                        </ul>
                        <li data-toggle="collapse" data-target="#guia"><a  class="dropdown-toggle" href="#" >
                   Actualizacion de Guia<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="guia">
                   <!-- r e g i s t r o  t r a m i t e  p a g o  d e p e n d en c i a s -->
                 <!--  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 31)
                            <li ><a href="{{ route('pago') }}">Registro de Tramite a Pago a Dependencia</a></li>
                   @endif
                   @endforeach-->
                   <!-- e n v i o  a  c o n t r o l  d e   c a  l i d a d -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 32)
                            <li ><a href="{{ route('envio') }}">Envio a Control de Calidad</a></li>
                           
                   @endif
                   @endforeach 
                   <!-- c o n s u l t a   r e v i s i o n e s -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 63)
                   <li ><a href="{{ route('c_rev1') }}">Consulta Revisiones</a></li>
                   @endif
                   @endforeach
                   <!-- f i n i q u i t o  d e  t r a m i t e s --> 
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 33)
                            <li ><a href="{{ route('finiquitar') }}">Finiquito de Trámites</a></li>
                   @endif
                   @endforeach
                            
                        </ul>

                 <li data-toggle="collapse" data-target="#calidad"><a  class="dropdown-toggle" href="#" >
                   Control de Calidad<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="calidad">
                  <!-- p r i m e r a  r e v i c i o n  d e  c a l i d a d -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 34)
                            <li ><a href="{{ route('rev1') }}">Primera Revisiòn de Expediente</a></li>
                   @endif
                   @endforeach
                   <!-- s e g u n d a  r e vi c i o n -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 35)
                            <li><a href="{{ route('rev2') }}">Segunda Revicion de Expediente</a></li>
                  @endif
                   @endforeach
                   <!-- t e r c e r a  r e v i c i o n -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 36)
                            <li><a href="{{ route('rev3') }}">Tercera Revicion de Expediente</a></li>
                           
                   @endif
                   @endforeach
                        </ul>
                        @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 67)
                        <li><a href="{{ route('rep_abogados') }}">Reportes</a></li>
                        @endif
                   @endforeach
                  
                 
                </ul>
                @endif
                   @endforeach
                      <!-- C A J A -->
                      @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 6)
                <li data-toggle="collapse" data-target="#caja" class="btn-menu collapsed ">
                  <a href="#">Caja</a>
                </li>  
                <ul class="sub-menu collapse" id="caja">
                <li data-toggle="collapse" data-target="#prep"><a  class="dropdown-toggle" href="#" >
                   Presupuesto<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="prep">
                  <!-- c o n s u l t a   p r e s u p u e s t o -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 37)
                            <li ><a href="{{ route('presupuesto') }}">Consulta Presupuesto</a></li>
                  @endif
                   @endforeach

                   <!-- e d i t a  p r e s u pu e s t o -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 38)
                           <li><a href="{{ route('updateprep') }}">Edita Presupuesto</a></li>
                    @endif
                   @endforeach
                    <!--  a u t o r i z a  p r e s u p u e s t o -->
                    @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 39)
                  
                            <li><a href="{{ route('prepa') }}">Autorizacion Presupuesto</a></li> 
                    @endif
                   @endforeach
                        </ul>
                        <li data-toggle="collapse" data-target="#cuent"><a  class="dropdown-toggle" href="#" >
                   Cuentas por Cobrar<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="cuent">
                  <!-- r e c e p c i o n  d e  p a g o s -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 40)
                            <li ><a href="{{ route('pago') }}">Recepcion de Pagos</a></li>
                  @endif
                   @endforeach
                   <!-- c o r t e s -->
                    @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 41)
                            <li><a href="{{ route('cortes') }}">Cortes</a></li>
                   @endif
                   @endforeach
                        </ul> 
                        <li data-toggle="collapse" data-target="#gk"><a  class="dropdown-toggle" href="#" >
                   Guía<span  class="caret"></span>
                  </a></li> 
                  <ul class="sub-menu collapse" id="gk">
                  <!-- r e g i s t r o  g u i a -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 43) 
                            <li><a href="{{ route('registro') }}">Registro de Guía</a></li>
                   @endif
                   @endforeach
                 
                  
                 <li data-toggle="collapse" data-target="#term"><a  class="dropdown-toggle" href="#" >
                   Termino de Trámites<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="term">
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 44) 
                   <!-- r e g i s t r o   y  e n t r e g a s  d e  k i n e g r a m a s -->
                            <li ><a href="{{ route('entki') }}">Registro de Kinegramas</a></li>
                            <li ><a href="{{ route('entregas') }}">Entregas</a></li>
                   @endif
                   @endforeach      
                        </ul>
                        </ul>
                    <!-- r e p o r t e s -->
                    @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 45)
                  <li><a href="{{ route('rep_caja') }}">Reportes</a></li> 
                  @endif
                   @endforeach
                </ul>
                @endif
                   @endforeach
                 <!-- C U E N T A S  P O R   P A G A R -->
                 @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 7)
                 <li data-toggle="collapse" data-target="#cuentas" class="btn-menu collapsed ">
                  <a href="#">Cuentas por pagar</a>
                </li>   
                <ul class="sub-menu collapse" id="cuentas">
                <li data-toggle="collapse" data-target="#dep"><a  class="dropdown-toggle" href="#" >
                   Pago a Dependencias<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="dep">
                  <!-- c o n t r o l   p a g o  d e p e n d e n c i a s -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 46)
                            <li ><a href="{{ route('CPD') }}">Control de Pago a Dependencias</a></li>
                    @endif
                   @endforeach
                   <!-- c o n t r o l  p a g o  a  d e p e n d e n c i a s -->
                            <li ><a href="{{ route('CPI') }}">Control de Pago a Impuestos</a></li>
                        </ul>
                        <!-- c o r t e  d e p e n d e n c i a s -->
                        @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 48)
                    <li><a href="{{ route('CCP') }}">Corte Dependencias</a></li>
                    @endif
                   @endforeach
                   <!-- c o r t e  i m p u e s t o s -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 61)
             <li><a href="{{ route('cortes_imp') }}">Corte Impuestos </a></li>
                   @endif
                   @endforeach
                  <!-- r e p o  r t e s -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 49)
                    <li><a href="{{ route('rep_cuent_pag') }}">Reportes </a></li>
                    @endif
                   @endforeach
                </ul>

                 @endif
                   @endforeach

                      <!-- A R C H I V O-->
                      @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 8)

                 <li data-toggle="collapse" data-target="#archivo" class="btn-menu collapsed ">
                  <a href="#">Archivo</a>
                </li>  
                <ul class="sub-menu collapse" id="archivo">
                <!-- t r a m i t e s   t e r m i n a d o s -->
                @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 50)
                  <li><a href="{{ route('TT') }}">Tramites Terminados</a></li>
                   @endif
                   @endforeach
                 <li data-toggle="collapse" data-target="#proyecto"><a  class="dropdown-toggle" href="#" >
                   Proyecto Dependencia<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="proyecto">
                  <!-- i n g r e s o  -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 51)
                            <li ><a href="{{ route('in') }}">Ingreso</a></li>
                   @endif
                   @endforeach
                   <!-- e g r e s o -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 52)
                            <li ><a href="{{ route('egreso') }}">Egreso</a></li>
                   @endif
                   @endforeach
                        </ul> 
                  <!-- r e p o r t e s -->
                  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 53)
                  <li><a href="{{ route('rep_archiv') }}">Reportes</a></li>
                  @endif
                   @endforeach
                </ul>
                @endif
                   @endforeach
                 <!-- U S U A R I O S-->
                 @foreach($conceptos as $concepto)
                  @if($concepto->categoria_funcion_id == 8)
                <li  data-toggle="collapse" data-target="#usuarios" class="btn-menu collapsed active">
                  <a  href="#" >
                   Usuario</a>
                </li>
                <ul class="sub-menu collapse" id="usuarios">
                <!-- r e g i s t r a r  u s u s u a r i o -->
                @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 54)
                    <li><a href="{{ route('register') }}">Registrar usuario</a></li>
                    @endif
                   @endforeach
                   <!-- e l i m i n a r  u s u a r i o s -->
                 <!--  @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 55)
                    <li><a href="{{ route('eliminar_us') }}">Eliminar Usuario</a></li>
                    @endif
                   @endforeach-->
                   <!-- e d i t a r  u s u a r i o s -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 58)
                    <li><a href="{{ route('editar_us') }}">Editar Usuario</a></li>
                    @endif
                   @endforeach
                   <!-- c o n s u l t a  u s u a r i o s-->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 59)
                    <li><a href="{{ route('consulta_usuario') }}">Consulta Usuario</a></li>
                    @endif
                   @endforeach
                   <!-- p u e s t o s -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 60)
                    <li><a href="{{ route('puestos_us') }}">Puestos</a></li>
                    @endif
                   @endforeach
                   <!-- a s i g n a r  f u n c i o n e s -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 56)
                    <li><a href="{{ route('asignar_funciones') }}">Asignar Funciones</a></li>
                    @endif
                   @endforeach
                   <!-- r e p o r t e s  u s u a r i o -->
                   @foreach($funciones as $funcion)
                   @if($funcion->funcion_id == 57)
                    <li><a href="{{ route('reportes_usuario') }}">Reportes</a></li> 
                    @endif
                   @endforeach
                </ul>      


                 @endif
                   @endforeach


            </ul>


         
             

        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
       <!-- <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Simple Sidebar</h1>
                <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
             <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>-->
           <!-- </div>
        </div>-->
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
   <!-- <script src="vendor/jquery/jquery.min.js"></script>-->
   <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
