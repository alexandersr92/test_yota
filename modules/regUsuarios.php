<?php
require_once '../cfg/config.php';

if(isset($_POST['guardar'])){
    if($_POST['nombre']!='' && $_POST['apellido']!='' && $_POST['usuario']!='' && $_POST['clave']!=''){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $Userclave = $_POST['clave'];
        $Userclave_v = $_POST['clave_v'];
        $permiso = $_POST['permiso'];
        if($Userclave == $Userclave_v){
            $clave = password_hash($Userclave, PASSWORD_DEFAULT, array('cost' => 15));
        }else{
            header('Location: ../index.php?pag=usuarios&not=4');
            die();
        }
       

        $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexion, $consulta);
        
        if(mysqli_fetch_assoc($resultado) == 0){

            $con = "INSERT INTO usuarios(usuario, clave, nombre, apellido, permiso) VALUES ('$usuario', '$clave', '$nombre', '$apellido', $permiso)";
            var_dump($con);
            $res = mysqli_query($conexion, $con);
            
            if(!$res){
                die('fallido'); 
            }else{
                header('Location: ../index.php?pag=usuarios&not=3');
            }
        }else{
            header('Location: ../index.php?pag=usuarios&not=1');
        }

    }else{
        header('Location: ../index.php?pag=usuarios&not=2');
    }
    
}elseif(isset($_POST['editar'])){
    if($_POST['nombre']!='' && $_POST['apellido']!='' &&$_POST['id']!='' ){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $permiso = $_POST['permiso'];
        $Userclave = $_POST['clave'];
        $Userclave_v = $_POST['clave_v'];
        $id = $_POST['id'];
      
        if($Userclave!=''){
            if($Userclave == $Userclave_v){
                $clave = password_hash($Userclave, PASSWORD_DEFAULT, array('cost' => 15));
                $con = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', clave='$clave' where usuario_id=$id";
            }else{
                header('Location: ../index.php?pag=usuarios&not=4');
            }
            
        }else{
            $con = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', permiso=$permiso where usuario_id=$id";
        }
        
        var_dump($con);
        $res = mysqli_query($conexion, $con);
        
        if(!$res){
            die('fallido'); 
        }else{
            header('Location: ../index.php?pag=usuarios&not=3');
        }  

    }else{
        header('Location: ../index.php?pag=usuarios&not=2');
    }

}elseif(isset($_POST['eliminar'])){
    if($_POST['id']!='' && $_POST['clave']!='' && $_POST['idUsuarioSesion']!='' ){
        $idUsuario = $_POST['idUsuarioSesion'];
        $id = $_POST['id'];
        $Userclave = $_POST['clave'];
        
        $consulta = "SELECT * FROM usuarios WHERE usuario_id = '$idUsuario'";
        $resultado = mysqli_query($conexion, $consulta);
 
        while($row = mysqli_fetch_array($resultado)){
            $cript = $row['clave'];
            if((password_verify($Userclave, $cript)) == true){
                $consulta = "DELETE FROM usuarios WHERE usuario_id = $id";
                $resultado = mysqli_query($conexion, $consulta);
                var_dump($consulta);
                if(!$resultado){
                    die('fallido'); 
                }else{
                    header('Location: ../index.php?pag=usuarios&not=5');
                }
            }else{
                header('Location: ../index.php?pag=usuarios&not=6');
            }
        }
    
    }else{
        header('Location: ../index.php?pag=usuarios&not=2');
    }
}

?>