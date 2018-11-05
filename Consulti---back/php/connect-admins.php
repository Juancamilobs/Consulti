<?php

class ConectorBD
{
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $conexion;

  function initConexion ($nombre_db){
    $this->conexion = new mysqli ($this->host, $this->user, $this->password, $nombre_db);
    if ($this->conexion->connect_error) {
      return "Error:".$this->conexion->connect_error;
    }else {
      return "OK";
    }
  }

  function cerrarConexion(){
    $this->conexion->close();
  }

  function ejecutarQuery($query){
    return $this->conexion->query($query);
  }
  function login($user,$password){
      $sql = "SELECT `username`,`password` FROM `admins` WHERE `username` = '".$user."'";
      $result = $this->ejecutarQuery($sql);
      if ($result){
      while ($data = $result->fetch_assoc())
      if ($data['username'] == $user & password_verify($password,$data['password'])){
          return 'OK';
        }else{
          return 'error';
        }
      }
    }
}
 ?>
