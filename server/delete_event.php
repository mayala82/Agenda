<?php
       include('conector.php');
       session_start();
       if (isset($_SESSION['username'])){
             $con = new ConectorBD('localhost','root','');
             $response['conexion'] = $con->initConexion('agenda');
             if ($response['conexion']=='OK'){
                   $id = $_POST['id']; 
                   
                   if(isset($id)){
                         if ($con->deleteEvento($id)){
                               $response['msg'] = "OK";
                         }
                   }
             }else {
                   $response['msg'] = "No se pudo conectar a la Base de Datos";
             }

       }else{
            $response['msg'] = "No se ha iniciado una sesión";
       }
       echo json_encode($response);
 ?>
