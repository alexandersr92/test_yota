<?php
require_once '../cfg/config.php';

if(isset($_POST['guardar'])){


    if($_POST['nombre']!='' && $_POST['apellido']!='' && $_POST['direccion']!=''  && $_POST['telefono']!=''  && $_POST['problema']!=''  && $_POST['solucion']!=''  && $_POST['gestion_id']!=''  && $_POST['gestion_cliente_id']!='' ){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $problema = $_POST['problema'];
        $solucion = $_POST['solucion'];
        $gestion_id = $_POST['gestion_id'];
        $gestion_cliente_id = $_POST['gestion_cliente_id'];

       echo $con = "INSERT INTO tickets(gestion_cliente_id, nombre, apellido, direccion, telefono, gestion_id, problema, solucion) VALUES ($gestion_cliente_id, '$nombre', '$apellido', '$direccion', '$telefono', $gestion_id, '$problema', '$solucion')";

        $res = mysqli_query($conexion, $con);
        
        if(!$res){
            die('fallido'); 

          header('Location: ../index.php?not=3');
        }else{
            $con = "UPDATE gestioncliente set atendido = 1 Where gestion_cliente_id = $gestion_cliente_id";
            $cc = mysqli_query($conexion, $con);
            
            if(!$cc){
             
                die('fallido');
            }
            header('Location: ../index.php?not=1');
       
        }
    

    }else{
      
        header('Location: ../index.php?not=2');
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
                $consulta = "DELETE FROM tickets WHERE ticket_id = $id";
                $resultado = mysqli_query($conexion, $consulta);
                var_dump($consulta);
                if(!$resultado){
                    die('fallido'); 
                }else{
                    header('Location: ../index.php?pag=listaticket&not=1');
                }
            }else{
                header('Location: ../index.php?pag=listaticket&not=2');
            }
        }
    
    }
}

?>