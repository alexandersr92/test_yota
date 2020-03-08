<div class="wrapper wrapper-content animated fadeInRight">
<?php
    if(isset($_GET['not'])){
        switch ($_GET['not']) {
            case 1:
              ?>
               <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Eliminado exitosamente 
                </div>
              <?php
                break;
            case 2:
                ?>
                <div class="alert alert-danger alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     Error al eliminar
                 </div>
               <?php
                break;
          

        }
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5>LISTA DE TICKETS ATENDIDOS</h5>
                        
            </div>
            <div class="ibox-content">
                <div class="row">
                 
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th># Ticket</th>
                                    <th># Gestión solicitada</th>
                                    <th>Nombre de gestión realizada</th>
                                    <th>Nombre cliente</th>
                                    <th>Apellido cliente</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Problema planteado</th>
                                    <th>Solución brindada</th>
                                    <th>Fecha de solicitod</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $con= "SELECT ticket_id, tickets.gestion_cliente_id as cod_gest, gestiones.nombre_gestion, nombre, apellido, direccion, telefono, problema, solucion, creacion FROM tickets, gestiones, gestioncliente WHERE tickets.gestion_id = gestiones.gestion_id AND tickets.gestion_cliente_id = gestioncliente.gestion_cliente_id";
                                        $res = mysqli_query($conexion, $con);
                                
                                        while($row = mysqli_fetch_array($res)){
                                        ?>
                                    <tr>
                                        <td><?php echo $row['ticket_id'];?></td>
                                        <td><?php echo $row['cod_gest'];?></td>
                                        <td><?php echo $row['nombre_gestion'];?></td>
                                        <td><?php echo $row['nombre'];?></td>
                                        <td><?php echo $row['apellido'];?></td>
                                        <td><?php echo $row['direccion'];?></td>
                                        <td><?php echo $row['telefono'];?></td>
                                        <td><?php echo $row['problema'];?></td>
                                        <td><?php echo $row['solucion'];?></td>
                                        <td><?php echo $row['creacion'];?></td>
                                        <td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar<?php echo $row['ticket_id']; ?>">Eliminar</button>
                                            <div class="modal inmodal fade" id="eliminar<?php echo $row['ticket_id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title">Eliminar el ticket <?php echo $row['ticket_id']; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Esta apunto de eliminar un Ticket del sistema, una ves realizada esta acción, no hay marcha atrás. Desea continuar?</p>
                                                            <form role="form" method="POST" action="modules/regTicket.php">
                                                            <div class="form-group"><label>Ingrese su contraseña</label> <input name="clave" type="password" placeholder="Clave" class="form-control"></div>    
                                                        </div>
                                                        <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?php echo $row['ticket_id']; ?>">
                                                        <input type="hidden" name="idUsuarioSesion" value="<?php echo $_SESSION['USUARIO_ID']; ?>">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                                            <input type="submit" class="btn btn-danger" name="eliminar" value="Eliminar">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                 
                                        <tr><?php } ?>
                                </tbody>
                            </table>
                 
                        </div>
                 
                  
                    
                </div>
            </div>
        </div>
    </div>
</div>

