<div class="wrapper wrapper-content animated fadeInRight">
    <?php
    if(isset($_GET['not'])){
        switch ($_GET['not']) {
            case 1:
              ?>
               <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Guardado exitosamente 
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
                <div class="alert alert-danger  alert-dismissable">
                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                     Error al guardar
                 </div>
               <?php
                break;

        }
    }
    ?>

    <div class="row">
      
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Registro de gestiones</h5>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="modules/regGestiones.php">
                                <div class="form-group"><label>Nombre de gestón</label> <input name="nombre" type="text" placeholder="Nombre" class="form-control"></div>
                                <div class="form-group"><label>Aplica visita?</label>
                                    <select class="form-control m-b" name="visita">
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                        
                                    </select>
                                </div>
                                <input type="hidden" name="usuario" value="<?php echo $_SESSION['USUARIO_ID']; ?>">
                               
                                <input class="btn btn-primary" type="submit" value="Guardar Gestión" name="guardar">
                         
                            </form>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
        <div class="ibox ">

                <div class="ibox-title">
                    <h5>Lista de gestiones</h5>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nombre de gestión</th>
                                <th>Aplica visita</th>
                                <th>Fecha de creación</th>
                                <th>Usuario</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                              $con= "SELECT gestion_id, nombre_gestion, visita, usuarios.usuario as usuario, fecha_creacion From gestiones, usuarios WHERE gestiones.usuario_id = usuarios.usuario_id";
                              $res = mysqli_query($conexion, $con);
                     
                              while($row = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td><?php echo $row['nombre_gestion']; ?></td>
                                    <td>
                                        <?php
                                            if( $row['visita']==1){
                                                echo "Si";
                                            }else{
                                                echo "NO";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row['fecha_creacion']; ?></td>
                                    <td><?php echo $row['usuario']; ?></td>
                                    <td><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar<?php echo $row['gestion_id']; ?>">Eliminar</button>
                                        <button type="button" class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#editar<?php echo $row['gestion_id']; ?>">Editar</button> </td>
                                    <div class="modal inmodal fade" id="eliminar<?php echo $row['gestion_id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Eliminar la gestión <?php echo $row['nombre_gestion']; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Esta apunto de eliminar una gestion del sistema, una ves realizada esta acción, no hay marcha atrás. Desea continuar?</p>
                                                    <form role="form" method="POST" action="modules/regGestiones.php">
                                                    <div class="form-group"><label>Ingrese su contraseña</label> <input name="clave" type="password" placeholder="Clave" class="form-control"></div>    
                                                </div>
                                                <div class="modal-footer">
                                                <input type="hidden" name="id" value="<?php echo $row['gestion_id']; ?>">
                                                <input type="hidden" name="idUsuarioSesion" value="<?php echo $_SESSION['USUARIO_ID']; ?>">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-danger" name="eliminar" value="Eliminar">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal inmodal fade" id="editar<?php echo $row['gestion_id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Editar gestión <?php echo $row['nombre_gestion']; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="modules/regGestiones.php">
                                                    <div class="form-group"><label>Nombre de gestón</label> <input value="<?php echo $row['nombre_gestion']; ?>" name="nombre" type="text" placeholder="Nombre" class="form-control"></div>
                                                    <div class="form-group"><label>Aplica visita?</label>
                                                        <select class="form-control m-b" name="visita">
                                                            <?php
                                                                if( $row['visita']==1){
                                                                    ?>
                                                                    <option selectedvalue="1">Si</option>
                                                                    <option value="0">No</option>
                                                                <?php
                                                                }else{
                                                                    ?>
                                                                        <option value="1">Si</option>
                                                                        <option selected value="0">No</option>
                                                                    <?php
                                                                }
                                                            ?>
                                                           
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="gestion_id" value="<?php echo $row['gestion_id']; ?>">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-primary" name="editar" value="Editar">
                                                    </form>
                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </tr>
                                  <?php
                              }
                            ?>
                   
                            </tbody>
                        </table>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
