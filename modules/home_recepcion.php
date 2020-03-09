<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <?php
    if(isset($_GET['not'])){
        switch ($_GET['not']) {
            case 1:
              ?>
               <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    El numero de gestion es: <b><?php echo $_GET['cod'] ?></b>
                </div>
              <?php
                break;
          
        }
    }
    ?>
            <div class="ibox-title">
                <h5>SISTEMA DE GESTIONES DE CLIENTES</h5>
                        
            </div>
            <div class="ibox-content">
                <div class="row">
                    <?php
                        $con= "SELECT * From gestiones";
                        $res = mysqli_query($conexion, $con);
                
                        while($row = mysqli_fetch_array($res)){
                        ?>
                        <div class="col-lg-3" style="margin: 10px">
                        
                        
                            <form action="modules/regGestionesClientes.php" method="POST">
                                <input type="hidden"  name="gestion" value="<?php echo $row['gestion_id']; ?>">
                                <input type="submit" style="height: 60px" class="btn btn-success btn-rounded btn-block" name="generar" value="<?php echo $row['nombre_gestion']; ?>">
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                  
                    
                </div>
            </div>
        </div>
    </div>
</div>

