<?php
session_start();
$conexion = @mysqli_connect('localhost', 'root', 'root', 'yota');

if (!$conexion) {
  $dbConexion= false;
}else{
  $dbConexion= true;
}

if(isset($_POST["login"])){
  echo 1;
  if($_POST["usuario"] != '' && $_POST["clave"] != ''){
      $usuario = $_POST["usuario"];
      $clave = $_POST["clave"];

      $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
      $resultado = mysqli_query($conexion, $consulta);
      $resu = mysqli_query($conexion, $consulta);
      echo 2;
      if(mysqli_fetch_assoc($resultado) != 0){
        echo 3;
        while($row = mysqli_fetch_array($resu)){
          echo 4;
            $cript = $row['clave'];
            if((password_verify($clave, $cript)) == true){
              echo 5;
                $_SESSION["USUARIO_ID"] = $row['usuario_id'];
                $_SESSION["USUARIO"] = $row['usuario'];
                $_SESSION["NOMBRE"] = $row['nombre'];
                $_SESSION["APELLIDO"] = $row['apellido'];
                $_SESSION["PERMISO"] = $row['permiso'];
                header('Location: ../index.php');
    
            }else{
                echo "denegado";
                header('Location: ../login.php?not=1');
            }
        } 
      }else{
        echo "denegado";
        header('Location: ../login.php?not=1');
      }
      

  }else{
    echo "incompleto";
    header('Location: ../login.php?not=2');
  }
}

?>