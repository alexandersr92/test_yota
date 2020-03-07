<?php
require_once '../cfg/config.php';

if(isset($_POST['guardar'])){

    if($_POST['nombre']!='' && $_POST['visita']!='' && $_POST['usuario']!='' ){
        $nombre = $_POST['nombre'];
        $visita = $_POST['visita'];
        $usuario = $_POST['usuario'];
   
        $f_creacion = new DateTime();
        $f_creacion->modify('-6 hours');
        $f = $f_creacion->format('Y-m-d');

        $con = "INSERT INTO gestiones(nombre_gestion, visita, usuario_id, fecha_creacion) VALUES ('$nombre', $visita, $usuario, '$f')";

        $res = mysqli_query($conexion, $con);
        
        if(!$res){
            die('fallido'); 
            header('Location: ../index.php?pag=gestiones&not=3');
        }else{
            header('Location: ../index.php?pag=gestiones&not=1');
        }
    

    }else{
        header('Location: ../index.php?pag=gestiones&not=2');
    }
    
}elseif(isset($_POST['editar'])){
    
    if($_POST['nombre']!='' && $_POST['visita']!='' ){
        $nombre = $_POST['nombre'];
        $visita = $_POST['visita'];
        $id = $_POST['gestion_id'];
        $con = "UPDATE gestiones set nombre_gestion = '$nombre', visita = $visita Where gestion_id=$id";

        $res = mysqli_query($conexion, $con);
        
        if(!$res){
            die('fallido'); 
            header('Location: ../index.php?pag=gestiones&not=3');
        }else{
            header('Location: ../index.php?pag=gestiones&not=1');
        }
    

    }else{
        header('Location: ../index.php?pag=gestiones&not=2');
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
                $consulta = "DELETE FROM gestiones WHERE gestion_id = $id";
                $resultado = mysqli_query($conexion, $consulta);
                var_dump($consulta);
                if(!$resultado){
                    die('fallido'); 
                }else{
                    header('Location: ../index.php?pag=gestiones&not=5');
                }
            }else{
                header('Location: ../index.php?pag=gestiones&not=6');
            }
        }
    
    }else{
        header('Location: ../index.php?pag=gestiones&not=2');
    }
}

?>