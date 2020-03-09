<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                        <span class="block m-t-xs font-bold" style="color:#ffffff;"><?php echo  $_SESSION["NOMBRE"].' '. $_SESSION["APELLIDO"] ?></span>
                   
                   
                </div>
                <div class="logo-element">
                    <img src="img/logo.png"  style="width: 80%" alt="">
                </div>
            </li>

            <?php
          
            if($_SESSION['PERMISO'] !=1){
                ?>
                <li class="active">
                    <a href="index.php"><i class="fa fa-dashboard"></i> <span class="nav-label">Inicio</span></a>
                </li>
               
                <li class="active">
                    <a href="index.php?pag=listaticket"><i class="fa fa-ticket"></i> <span class="nav-label">Ticket</span></a>
                </li>
            <?php
            }else{
                ?>
                <li class="active">
                    <a href="index.php"><i class="fa fa-dashboard"></i> <span class="nav-label">Inicio</span></a>
                </li>
                <li class="active">
                    <a href="index.php?pag=usuarios"><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span></a>
                </li>
                <li class="active">
                    <a href="index.php?pag=gestiones"><i class="fa fa-th-list"></i> <span class="nav-label">Gestiones</span></a>
                </li>
                <li class="active">
                    <a href="index.php?pag=listaticket"><i class="fa fa-ticket"></i> <span class="nav-label">Ticket</span></a>
                </li>
            <?php
            }
            ?>
        </ul>

    </div>
</nav>
