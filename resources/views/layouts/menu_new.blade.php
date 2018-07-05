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
                <ul class="sub-menu collapse" id="clientes">
                  <li style="border-top = 1px solid #fff"><a href="{{ route('registrar_cliente') }}">Registrar Cliente</a></li>
                  <li><a href="#">Editar Cliente</a></li>
                  <li><a href="#">Eliminar Cliente</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>
                <li data-toggle="collapse" data-target="#tramites" class="btn-menu collapsed ">
                  <a href="#">Trámites</a>
                </li>  
                <ul class="sub-menu collapse" id="tramites">
                  <li><a href="{{ route('alta_tramite') }}">Alta Trámite</a></li>
                  <li><a href="#">Eliminar Trámite</a></li>
                  <li><a href="#">Editar Trámite</a></li>
                   <li data-toggle="collapse" data-target="#documento" class=" collapsed "><a  class="dropdown-toggle" href="#" >
                   Documentación<span  class="caret"></span>
                  </a></li>
                        <ul class="sub-menu collapse" id="documento">
                            <li><a href="{{ route('alta_documentacion') }}">Alta Documento</a></li>
                            <li><a href="#">Eliminar Documento</a></li>
                            <li><a href="#">Editar Documento</a></li>
                        </ul>
                   <li><a href="#">Documentación por Tramite</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>
          
            <li data-toggle="collapse" data-target="#tarifas" class="btn-menu collapsed ">
                  <a href="#">Tarifario de Honorarios</a>
                </li>  
                <ul class="sub-menu collapse" id="tarifas">
                  <li><a href="#">Tarifas</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>
          
            <li data-toggle="collapse" data-target="#recepcion" class="btn-menu collapsed ">
                  <a href="#">Recepción de Clientes</a>
                </li>  
                <ul class="sub-menu collapse" id="recepcion">
                  <li><a href="#">Consulta Cliente</a></li>
                  <li data-toggle="collapse" data-target="#realizar"><a  class="dropdown-toggle" href="#" >
                   Trámites a Realizar<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="realizar">
                            <li ><a href="#">Consulta Tramite</a></li>
                            <li><a href="#">Validacion Documentación</a></li>
                        </ul>
                  <li data-toggle="collapse" data-target="#programacion"  collapsed ><a  class="dropdown-toggle" href="#" >
                   Programación de citas<span  class="caret"></span>
                  </a></li>
                   <ul class="sub-menu collapse" id="programacion">
                            <li ><a href="#">Selección de Agenda</a></li>
                            <li><a href="#">Registro de cita</a></li>
                            <li><a href="#">Editar Cita</a></li>
                            <li><a href="#">Tipos de cita</a></li>
                            <li><a href="#">Reportes</a></li>
                   </ul>
                  <li><a href="#">Tipos de Cita</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#abogado" class="btn-menu collapsed ">
                  <a href="#">Abogados</a>
                </li>  
                <ul class="sub-menu collapse" id="abogado">
                  <li><a href="#">Consulta Citas</a></li>
                    <li data-toggle="collapse" data-target="#rec"><a  class="dropdown-toggle" href="#" >
                   Recepcion de clientes<span  class="caret"></span>
                  </a></li>
                  <ul class="sub-menu collapse" id="rec">
                            <li ><a href="#">Confirma Tramite</a></li>
                            <li><a href="#">Validacion Documentos</a></li>
                        </ul>
                  <li><a href="#">Reportes</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#caja" class="btn-menu collapsed ">
                  <a href="#">Caja</a>
                </li>  
                <ul class="sub-menu collapse" id="caja">
                  <li><a href="#">Tarifas</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>

                 <li data-toggle="collapse" data-target="#cuentas" class="btn-menu collapsed ">
                  <a href="#">Cuentas por pagar</a>
                </li>  
                <ul class="sub-menu collapse" id="cuentas">
                  <li><a href="#">Tarifas</a></li>
                  <li><a href="#">Reportes</a></li>
                </ul>

                 <li data-toggle="collapse" data-target="#archivo" class="btn-menu collapsed ">
                  <a href="#">Archivo</a>
                </li>  
                <ul class="sub-menu collapse" id="archivo">
                  <li><a href="#">Tramites Terminados</a></li>
                  <li><a href="#">Proyecto Dependencia</a></li>
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
