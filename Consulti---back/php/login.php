<?php

  require ('connect-admins.php');

  $con = new ConectorBD();

  $response['conexion'] = $con->initConexion('consulti test');
    if ($response['conexion'] === 'OK'){
        $response['acceso'] = $con->login($_POST['fname'],$_POST['fpass']);
        if ($response['acceso'] == 'OK'){
            echo json_encode($response['acceso']);
          }else {
            echo("Error de credenciales");
          }
    }

  $con -> cerrarConexion();


 ?>
