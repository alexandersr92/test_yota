<?php
if(isset($_POST['num'])){
    $gestion_id = $_POST['num'];
    $ate = $_POST['at'];
    $con = "UPDATE gestioncliente set atendido = $ate Where gestion_cliente_id = $gestion_id";
    $res = mysqli_query($conexion, $con);
    
    if(!$res){
        die('fallido');
    }
}

if(isset($_GET['not'])){
    switch ($_GET['not']) {
        case 1:
          ?>
           <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                Guardado con exito
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
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    
        <div class="ibox-title">
            <h5>SISTEMA DE GESTIONES DE CLIENTES  </h5> | <a href="index.php" class="btn btn-primary btn-sm">Actualizar lista</a>
                    
        </div>
        <div class="ibox-content">
            <div class="row">
                
            <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> SIN ATENDER</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2"> ATENDIENDO </a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-3"> ATENDIDOS </a></li>
                        </ul>
                        <div class="tab-content col-lg-12">
                            <div role="tabpanel" id="tab-1" class="tab-pane active">
                                <div class="panel-body">

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
                            <div role="tabpanel" id="tab-2" class="tab-pane">
                                <div class="panel-body">
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
                                        $con= "SELECT gestion_cliente_id, nombre_gestion, creacion, atendido FROM gestioncliente, gestiones WHERE gestioncliente.gestion_id = gestiones.gestion_id and atendido = 2 ORDER by creacion asc";
                                        $res = mysqli_query($conexion, $con);
                                
                                        while($row = mysqli_fetch_array($res)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['gestion_cliente_id']; ?></td>
                                                <td><?php echo $row['nombre_gestion']; ?></td>
                                                <td><?php echo $row['creacion']; ?></td>
                                                <td><?php 
                                                if($row['atendido'] ==2){
                                                    ?>
                                
                                                    <span class="label label-warning">ATENDIENDO</span>
                                                
                                                <?php }
                                                ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-3" class="tab-pane">
                                <div class="panel-body">
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
                                        $con= "SELECT gestion_cliente_id, nombre_gestion, creacion, atendido FROM gestioncliente, gestiones WHERE gestioncliente.gestion_id = gestiones.gestion_id and atendido = 1 ORDER by creacion asc";
                                        $res = mysqli_query($conexion, $con);
                                
                                        while($row = mysqli_fetch_array($res)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['gestion_cliente_id']; ?></td>
                                                <td><?php echo $row['nombre_gestion']; ?></td>
                                                <td><?php echo $row['creacion']; ?></td>
                                                <td><?php 
                                                if($row['atendido'] ==1){
                                                    ?>
                                
                                                    <span class="label label-primary">ATENDIDO</span>
                                                
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
</div>
</div>

