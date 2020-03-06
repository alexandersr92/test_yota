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
      
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Registro de usuario</h5>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="POST" action="modules/regUsuarios.php">
                                <div class="form-group"><label>Nombre</label> <input name="nombre" type="text" placeholder="Nombre" class="form-control"></div>
                                <div class="form-group"><label>Apellido</label> <input name="apellido" type="text" placeholder="Apellido" class="form-control"></div>
                                <div class="form-group"><label>Usuario</label> <input name="usuario" type="text" placeholder="@usuario" class="form-control"></div>
                                <div class="form-group"><label>Clave</label> <input name="clave" type="password" placeholder="Clave" class="form-control"></div>    
                                <div class="form-group"><label>Confirmar clave</label> <input name="clave_v" type="password" placeholder="Clave" class="form-control"></div>      
                                <input class="btn btn-primary" type="submit" value="Guardar Usuario" name="guardar">
                       
                            </form>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
        <div class="ibox ">

                <div class="ibox-title">
                    <h5>Basic form <small>Simple login form example</small></h5>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                              $con= "SELECT * From usuarios";
                              $res = mysqli_query($conexion, $con);
                     
                              while($row = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apellido']; ?></td>
                                    <td><?php echo $row['usuario']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#editar<?php echo $row['usuario_id']; ?>">Editar</button>
                                        <?php
                                            if($_SESSION['USUARIO_ID'] == $row['usuario_id']){
                                                ?>
                                                    <button disabled type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar<?php echo $row['usuario_id']; ?>">Eliminar</button>
                                                <?php
                                            }else{
                                                ?>
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eliminar<?php echo $row['usuario_id']; ?>">Eliminar</button>
                                                <?php
                                            }
                                        ?>
                                        
                                    </td>
                                    <div class="modal inmodal fade" id="eliminar<?php echo $row['usuario_id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Eliminar usuario <?php echo $row['usuario']; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Esta apunto de eliminar un usuario del sistema, una ves realizada esta acción, no hay marcha atrás. Desea continuar?</p>
                                                    <form role="form" method="POST" action="modules/regUsuarios.php">
                                                    <div class="form-group"><label>Ingrese su contraseña</label> <input name="clave" type="password" placeholder="Clave" class="form-control"></div>    
                                                </div>
                                                <div class="modal-footer">
                                                <input type="hidden" name="id" value="<?php echo $row['usuario_id']; ?>">
                                                <input type="hidden" name="idUsuarioSesion" value="<?php echo $_SESSION['USUARIO_ID']; ?>">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-danger" name="eliminar" value="Eliminar">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal inmodal fade" id="editar<?php echo $row['usuario_id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Editar usuario <?php echo $row['usuario']; ?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST" action="modules/regUsuarios.php">
                                                        <div class="form-group"><label>Nombre</label> <input name="nombre" type="text" placeholder="Nombre" class="form-control" value="<?php echo $row['nombre']; ?>"></div>
                                                        <div class="form-group"><label>Apellido</label> <input name="apellido" type="text" placeholder="Apellido" class="form-control" value="<?php echo $row['apellido']; ?>"></div>
                                                        <div class="form-group"><label>Usuario</label> <input disabled name="usuario" type="text" placeholder="@usuario" class="form-control" value="<?php echo $row['usuario']; ?>"></div>
                                                        <div class="form-group"><label>Clave</label> <input name="clave" type="password" placeholder="Clave" class="form-control"></div>
                                                        <div class="form-group"><label>Confirmar clave</label> <input name="clave_v" type="password" placeholder="Clave" class="form-control"></div>                                        
    
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?php echo $row['usuario_id']; ?>">
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
