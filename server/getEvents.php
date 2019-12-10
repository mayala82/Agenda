<?php
       include('conector.php');
       session_start();
       if (isset($_SESSION['username'])){
             $con = new ConectorBD('localhost','root','');
             $response['conexion'] = $con->initConexion('agenda');
             if ($response['conexion']=='OK'){                   
                   $resultado = $con->consultar(['usuarios'],['nombre', 'id'], 'WHERE email="'.$_SESSION['username'].'"');
                   $fila = $resultado->fetch_assoc();
                   $response['nombre'] = $fila['nombre'];                   
                   $resultado = $con->getEventosUser($fila['id']);                   
                   $i=0;
                   while ($fila = $resultado->fetch_assoc()) {                        
                         $response['eventos'][$i]['id'] = $fila['id'];
                         $response['eventos'][$i]['title'] = $fila['titulo'];
                         $response['eventos'][$i]['start'] = $fila['fecha_inicio'];
                         $response['eventos'][$i]['start_hour'] = $fila['hora_inicio'];
                         $response['eventos'][$i]['end'] = $fila['fecha_fin'];                                                  
                         $response['eventos'][$i]['end_hour'] = $fila['hora_fin'];
                         if($fila['dia_completo'] == 1){
                               $response['eventos'][$i]['allDay'] = true;

                         }else{
                               $response['eventos'][$i]['allDay'] = false;
                         }
                             
                         $i++;                                                    
                   } 
                   $response['msg'] = "OK";                      
             }
             else {
                   $response['msg'] = "No se pudo conectar a la Base de Datos";
             }
       }else{
             $response['msg'] = "No se ha iniciado una sesión";
       }
       
       echo json_encode($response);
 ?>
