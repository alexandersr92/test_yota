<?php

if(isset($_POST['num'])){
    $gestion_id = $_POST['num'];
    $con = "UPDATE gestioncliente set atendido = 2 Where gestion_cliente_id = $gestion_id";
    $res = mysqli_query($conexion, $con);
    
    if(!$res){
        die('fallido');
    }

?>
<div class="wrapper wrapper-content animated fadeInRight">
    <?php
    if(isset($_GET['not'])){
        switch ($_GET['not']) {
            case 1:
              ?>
               <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Usuario ya registrado 
                </div>
              <?php
                break;
            case 2:
                ?>
                <div class="alert alert-danger alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     Campos incompletos.
                 </div>
               <?php
                break;
            case 3:
                ?>
                <div class="alert alert-success  alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     Guardado exitosamente 
                 </div>
               <?php
                break;
            case 4:
                ?>
                <div class="alert alert-danger  alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Las contraseñas no son iguales
                    </div>
                <?php
                break;
            case 5:
                ?>
                <div class="alert alert-success  alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Eliminado con exito
                    </div>
                <?php
                break;
            case 6:
                ?>
                <div class="alert alert-danger  alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Las contraseñas no es correcta
                    </div>
                <?php
                break;
        }
    }
    ?>

    <div class="row">
      
        <div class="col-lg-9">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="row" style="margin: 10px">
                    <h5 class="col-3">Ticket # <?php echo $_POST['num'] ?> | <?php echo $_POST['nom'] ?></h5>
                    <form action="index.php" method="POST" class="col-3">
                        <input type="hidden"  name="num" value="<?php echo $_POST['num']; ?>">
                        <input type="hidden"  name="at" value="1">
                        <input type="submit" class="btn btn-warning btn-xs" name="generar" value="Marcar como atendido">
                    </form>
                    <form action="index.php" method="POST" class="col-3">
                        <input type="hidden"  name="num" value="<?php echo $_POST['num']; ?>">
                        <input type="hidden"  name="at" value="0">
                        <input type="submit" class="btn btn-danger btn-xs" name="generar" value="Marcar como no atendido">
                    </form>
                    </div>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="modules/regTicket.php">
                                <input type="hidden" name="gestion_cliente_id" value="<?php echo $_POST['num']; ?>">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group"><label>Nombre</label> <input required autocomplete="off" name="nombre" type="text" placeholder="Nombre" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group"><label>Apellido</label> <input required  autocomplete="off" name="apellido" type="text" placeholder="Apellido" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group"><label>Dirección</label> <input  required autocomplete="off" name="direccion" type="text" placeholder="Dirección" class="form-control"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group"><label>Teléfono</label> <input required  autocomplete="off" name="telefono" type="text" placeholder="Teléfono" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group"><label>Gestión real realizada</label>
                                            <select class="form-control m-b" name="gestion_id" required>
                                                <option value="">--</option>
                                                <?php
                                                $con= "SELECT * From gestiones";
                                                $res = mysqli_query($conexion, $con);
                                        
                                                while($row = mysqli_fetch_array($res)){
                                                ?>
                                                    <option value="<?php echo $row['gestion_id'] ?>"><?php echo $row['nombre_gestion'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>      
                                </div>
                                   
                
                             
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group"><label>Problema expuesto por el cliente</label> <textarea required  autocomplete="off" name="problema" type="text" placeholder="Problema expuesto" class="form-control"></textarea></div>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group"><label>Solución brindada</label> <textarea  required autocomplete="off" name="solucion" type="text" placeholder="Solución brindada" class="form-control"></textarea></div>
                                    </div>

                                </div>

                                <input class="btn btn-success" type="submit" value="Guardar Gestion" name="guardar">
                       
                            </form>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="ibox ">

                <div class="ibox-title">
                    <h5>Lista de usuarios </h5>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                       
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Num. Gestion</th>
                                    <th>Nombre de Gestión</th>
                                    <th>Hora y Fecha de solicitud</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $con= "SELECT gestion_cliente_id, nombre_gestion, creacion, atendido FROM gestioncliente, gestiones WHERE gestioncliente.gestion_id = gestiones.gestion_id and atendido = 0 ORDER by creacion asc";
                                $res = mysqli_query($conexion, $con);
                        
                                while($row = mysqli_fetch_array($res)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['gestion_cliente_id']; ?></td>
                                        <td><?php echo $row['nombre_gestion']; ?></td>
                                        <td><?php echo $row['creacion']; ?></td>
                                        <td><?php 
                                        if($row['atendido'] ==0){
                                            ?>
                                                <form action="index.php?pag=ticket" method="POST">
                                                    <input type="hidden"  name="num" value="<?php echo $row['gestion_cliente_id']; ?>">
                                                    <input type="hidden"  name="nom" value="<?php echo $row['nombre_gestion']; ?>">
                                                    <input type="submit" class="btn btn-success btn-xs" name="generar" value="Atender">
                                                </form>
                                        <?php }
                                        ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

}else{
    header('Location: index.php');

}
?>
