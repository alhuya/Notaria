<?php

namespace Notaria;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kinegramas extends Model
{
    protected $table = 'kinegramas'; 

    protected $fillable = ['cliente_id','kinegrama'];

   //consulta que verifica que ya se hayan realizado todos los pagos 
    public static function valor($id){    
        
        
     

         $consultas = DB::table('control_tramites')
            ->where('control_tramites.numero_escritura', '=', $id)
            ->select( 'control_tramites.*')
            ->get();  

           $carpeta;
            $tramite;
            foreach($consultas as $consulta){

                $carpeta = $consulta->carpeta_id;
                $tramite = $consulta->tramite_id;
            }

            $presupuestos = DB::table('presupuestos')
            ->where('presupuestos.carpeta_id', '=', $carpeta)
            ->select('presupuestos.*')
            ->get();           


            $costo;
            foreach($presupuestos as $presupuesto){

                $costo = $presupuesto->costo_tramite_id;
            }

            $valores = DB::table('conceptos_costos')
            ->where('conceptos_costos.costo_tramite_id', '=', $costo)
            ->where('conceptos_costos.tramite_id', '=', $tramite)
            ->select('conceptos_costos.*')
            ->get(); 
            
        

            $valores2 = DB::table('recepcion_pagos')
            ->where('recepcion_pagos.carpeta_id', '=', $carpeta)
            ->select('recepcion_pagos.*')
            ->get(); 

                
          $suma = 0;
          $suma2 = 0;

         foreach($valores2 as $valore2){
            $var2=  $valore2->cantidad;
            $suma2 += $var2;
  
          }

          foreach($valores as $valor){
            $var=  $valor->costo;
            $suma += $var;
  
          }   

            if($suma == $suma2 ){

               return  DB::table('control_tramites')
            ->Join('clientes', 'control_tramites.cliente_id', '=', 'clientes.id')
            ->Join('tipos_tramites', 'control_tramites.tramite_id', '=', 'tipos_tramites.id')
            ->where('control_tramites.numero_escritura', '=', $id)        
            ->select( 'control_tramites.*','clientes.nombre','clientes.apellido_paterno','clientes.apellido_materno','tipos_tramites.tramite')
            ->get();  


            }



        }  
}
