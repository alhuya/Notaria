<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

<div id="wrapper"> 
  
        <div id="sidebar-wrapper" class="menu">
            <ul class="sidebar-nav">
              <li  data-toggle="collapse" data-target="#homr" class="btn-menu collapsed active">
                  <a  href="{{ route('home') }}" >
                   Home</a>
                </li>
                <li  data-toggle="collapse" data-target="#usuarios" class="btn-menu collapsed active">
                  <a  href="#" >
                   Usuario</a>
                </li>
                <ul class="sub-menu collapse" id="usuarios">
                    <li><a href="{{ route('register') }}">Registrar usuario</a></li>
                    <li><a href="{{ route('eliminar_us') }}">Eliminar Usuario</a></li>
                    <li><a href="{{ route('editar_us') }}">Editar Usuario</a></li>
                    <li><a href="{{ route('consulta_usuario') }}">Consulta Usuario</a></li>
                    <li><a href="{{ route('puestos_us') }}">Puestos</a></li>
                    <li><a href="{{ route('asignar_funciones') }}">Asignar Funciones</a></li>
                    <li><a href="{{ route('reportes_usuario') }}">Reportes</a></li> 
                </ul>              
  <li data-toggle="collapse" data-target="#clientes" class="btn-menu collapsed ">
                  <a href="#"> Clientes</a>
                </li>  
               <!-- for(categorias){}
                if(categoriaID[i] == 0){
                        }-->
                  <ul class="sub-menu collapse" id="clientes">
                    <li style="border-top = 1px solid #fff"><a href="{{ route('registrar_cliente') }}">Registrar Cliente</a></li>
                    <li><a href="{{ route('editar_client') }}">Editar Cliente</a></li>
                    <li><a href="{{ route('eliminar_client') }}">Eliminar Cliente</a></li>
                    <li><a href="#">Reportes</a></li>
                  </ul>

          
                <ul class="sub-menu collapse" id="clientes">

                  <li style="border-top = 1px solid #fff"><a href="{{ route('registrar_cliente') }}">Registrar Cliente</a></li>
                  <li><a href="{{ route('editar_client') }}">Editar Cliente</a></li>
                  <li><a href="{{ route('eliminar_client') }}">Eliminar Cliente</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>
                <li data-toggle="collapse" data-target="#tramites" class="btn-menu collapsed ">
                  <a href="#">Trámites</a>
                </li>   
                <ul class="sub-menu collapse" id="tramites">
                  <li><a href="{{ route('alta_tramite') }}">Alta Trámite</a></li>
                  <li><a href="{{ route('eliminar_tramite') }}">Eliminar Trámite</a></li>
                  <li><a href="{{ route('editar_tramite') }}">Editar Trámite</a></li>
                   <li data-toggle="collapse" data-target="#documento" class=" collapsed "><a  class="dropdown-toggle" href="#" >
                   Documentación<span  class="caret"></span> 
                  </a></li>
                        <ul class="sub-menu collapse" id="documento">
                            <li><a href="{{ route('alta_documentacion') }}">Alta Documento</a></li>
                            <li><a href="{{ route('eliminar_doc') }}">Eliminar Documento</a></li>
                            <li><a href="{{ route('editar_doc') }}">Editar Documento</a></li>
                        </ul>
                   <li><a href="{{ route('Doc_tram') }}">Documentación por Tramite</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>
            
            <li data-toggle="collapse" data-target="#tarifas" class="btn-menu collapsed ">
                  <a href="#">Tarifario de Honorarios</a>
                </li>  
                <ul class="sub-menu collapse" id="tarifas"> 
                  <li><a href="{{ route('tarifas') }}">Tarifas</a></li>
                  <li><a href="{{ route('concepto') }}">Alta Concepto</a></li>
                  <li><a href="{{ route('costo') }}">Concepto Costo</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>
          
            <li data-toggle="collapse" data-target="#recepcion" class="btn-menu collapsed ">
                  <a href="#">Recepción de Clientes</a>
                </li>  
                <ul class="sub-menu collapse" id="recepcion">
                  <li><a href="{{ route('consulta_client') }}">Consulta Cliente</a></li>
                  <li data-toggle="collapse" data-target="#realizar"><a  class="dropdown-toggle" href="#" >
                   Trámites a Realizar<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="realizar">
                            <li ><a href="{{ route('consult_tramites') }}">Consulta Tramite</a></li>
                            <li><a href="{{ route('valida_doc') }}">Validacion Documentación</a></li>
                        </ul>
                  <li data-toggle="collapse" data-target="#programacion"  collapsed ><a  class="dropdown-toggle" href="#" >
                   Programación de citas<span  class="caret"></span>
                  </a></li> 
                   <ul class="sub-menu collapse" id="programacion">
                            <li ><a href="{{ route('agenda') }}">Selección de Agenda</a></li>
                            <li><a href="{{ route('cita') }}">Alta de cita</a></li>
                            <li><a href="{{ route('editarcita') }}">Editar Cita</a></li>
                            <li><a href="{{ route('tipo') }}">Tipos de cita</a></li>
                   </ul>
                  <li><a href="#">Reportes</a></li> 
                </ul>
 
                <li data-toggle="collapse" data-target="#abogado" class="btn-menu collapsed ">
                  <a href="#">Abogados</a>
                </li>  
                <ul class="sub-menu collapse" id="abogado">
                  <li><a href="{{ route('consultacita') }}">Consulta Citas</a></li>
                    <li data-toggle="collapse" data-target="#rep"><a  class="dropdown-toggle" href="#" >
                   Recepcion de clientes<span  class="caret"></span> 
                  </a></li>
                  <ul class="sub-menu collapse" id="rep">
                            <li ><a href="{{ route('confirma') }}">Confirma Tramite</a></li>
                            <li><a href="{{ route('validacion') }}">Validacion Documentos</a></li>
                        </ul>
                        <li data-toggle="collapse" data-target="#tram"><a  class="dropdown-toggle" href="#" >
                   Creacion de Tramites<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="tram">
                            <li ><a href="{{ route('apertura') }}">Apertura de Carpetas</a></li>
                            <li><a href="{{ route('folio') }}">Consulta de Folio Interno</a></li>
                            <li><a href="{{ route('elab_prep') }}">Elaboracion de Presupuesto</a></li>
                        </ul>
                        <li data-toggle="collapse" data-target="#guia"><a  class="dropdown-toggle" href="#" >
                   Actualizacion de Guia<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="guia">
                            <li ><a href="{{ route('pago') }}">Registro de Tramite a Pago a Dependencia</a></li>
                            <li ><a href="{{ route('envio') }}">Envio a Control de Calidad</a></li>
                            <li ><a href="{{ route('finiquitar') }}">Finiquito de Trámites</a></li>
                            
                        </ul>

                 <li data-toggle="collapse" data-target="#calidad"><a  class="dropdown-toggle" href="#" >
                   Control de Calidad<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="calidad">
                            <li ><a href="{{ route('rev1') }}">Primera Revisiòn de Expediente</a></li>
                            <li><a href="{{ route('rev2') }}">Segunda Revicion de Expediente</a></li>
                            <li><a href="{{ route('rev3') }}">Tercera Revicion de Expediente</a></li>
                        </ul>
                  
                  <li><a href="#">Reportes</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#caja" class="btn-menu collapsed ">
                  <a href="#">Caja</a>
                </li>  
                <ul class="sub-menu collapse" id="caja">
                <li data-toggle="collapse" data-target="#prep"><a  class="dropdown-toggle" href="#" >
                   Presupuesto<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="prep">
                            <li ><a href="{{ route('presupuesto') }}">Consulta Presupuesto</a></li>
                            <li><a href="{{ route('updateprep') }}">Edita Presupuesto</a></li>
                            <li><a href="{{ route('prepa') }}">Autorizacion Presupuesto</a></li> 
                        </ul>
                        <li data-toggle="collapse" data-target="#cuent"><a  class="dropdown-toggle" href="#" >
                   Cuentas por Cobrar<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="cuent">
                            <li ><a href="{{ route('pago') }}">Recepcion de Pagos</a></li>
                            <li><a href="{{ route('cortes') }}">Cortes</a></li>
                        </ul> 
                        <li data-toggle="collapse" data-target="#gk"><a  class="dropdown-toggle" href="#" >
                   Guía<span  class="caret"></span>
                  </a></li> 
                  <ul class="sub-menu collapse" id="gk">
                            <li><a href="{{ route('registro') }}">Registro de Guía</a></li>
                            <li data-toggle="collapse" data-target="#term"><a  class="dropdown-toggle" href="#" >
                   Termino de Trámites<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="term">
                            <li ><a href="{{ route('entki') }}">Registro y Entregas de Kinegramas</a></li>
                            
                        </ul>
                        </ul>
                  <li><a href="#">Reportes</a></li>
                </ul>
                

                 <li data-toggle="collapse" data-target="#cuentas" class="btn-menu collapsed ">
                  <a href="#">Cuentas por pagar</a>
                </li>   
                <ul class="sub-menu collapse" id="cuentas">
                <li data-toggle="collapse" data-target="#dep"><a  class="dropdown-toggle" href="#" >
                   Pago a Dependencias<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="dep">
                            <li ><a href="{{ route('CPD') }}">Control de Pago a Dependencias</a></li>
                            <li ><a href="{{ route('CPI') }}">Control de Pago a Impuestos</a></li>
                        </ul>
                    <li><a href="{{ route('CCP') }}">Corte </a></li>
                    <li><a href="#">Reportes </a></li>
                </ul>

                 <li data-toggle="collapse" data-target="#archivo" class="btn-menu collapsed ">
                  <a href="#">Archivo</a>
                </li>  
                <ul class="sub-menu collapse" id="archivo">
                  <li><a href="{{ route('TT') }}">Tramites Terminados</a></li>
                 <li data-toggle="collapse" data-target="#proyecto"><a  class="dropdown-toggle" href="#" >
                   Proyecto Dependencia<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="proyecto">
                            <li ><a href="{{ route('in') }}">Ingreso</a></li>
                            <li ><a href="{{ route('egreso') }}">Egreso</a></li>
                        </ul> 
                  <li><a href="#">Reportes</a></li>
                </ul>






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
