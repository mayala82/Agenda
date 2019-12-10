 <?php      
       include('conector.php');
       $con = new ConectorBD('localhost','root','');
       $response['conexion'] = $con->initConexion('agenda');
       if ($con->recordCount('usuarios')>0){ //Invoca la función recordCount para saber si la tabla contiene registros
             echo "<h3>La tabla usuarios ya contiene registros</h3>";
             exit;
       }
       if ($response['conexion']=='OK') {
             $data = array();
             $data = [
                         [
                               'email' => "'miguelayala.mendoza@gmail.com'",
                               'nombre' => "'MIGUEL AYALA'",
                               'psw' => "'".password_hash('maam', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1982-10-07'"
                         ],
                         [
                               'email' => "'inesvilladiego@gmail.com'",
                               'nombre' => "'INES VILLADIEGO'",
                               'psw' => "'".password_hash('INES86', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1986-09-26'",
                         ],
                         [
                               'email' => "'zila2020@email.com'",
                               'nombre' => "'ZILA MENDOZA'",
                               'psw' => "'".password_hash('zilona', PASSWORD_DEFAULT)."'",
                               'fecha_nacimiento' => "'1948-01-30'",
                         ]
              ];             
             echo "<h3>Usuarios</h3><br>";
             foreach($data as $d){
                   if($con->insertData('usuarios', $d)){
                         echo $d["nombre"]." - ". $d["email"] ."... Registro creado <br>";
                   }else {
                         echo "Hubo un error y los datos no han sido guardados...<br>";
                   }    
             }             
       }else {
             echo "No se pudo conectar a la base de datos";
       }
       
?>
