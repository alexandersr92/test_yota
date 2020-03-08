<?php
require_once '../cfg/config.php';

if(isset($_POST['generar'])){


        $id_gestion = $_POST['gestion'];
        $f_creacion = new DateTime();
        $f_creacion->modify('-6 hours');
        $f = $f_creacion->format('Y-m-d H:i:s');

        $con = "INSERT INTO gestioncliente(gestion_id, creacion) VALUES ('$id_gestion', '$f')";

        $res = mysqli_query($conexion, $con);
        
        if(!$res){
            die('fallido'); 
            echo 1;
        }else{
            $con= "SELECT gestion_cliente_id FROM gestioncliente ORDER BY gestion_cliente_id desc LIMIT 1";
            $res = mysqli_query($conexion, $con);
    
            while($row = mysqli_fetch_array($res)){
                $cod = $row['gestion_cliente_id'];
            }
            
            header('Location: ../index.php?&not=1&cod='.$cod);
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