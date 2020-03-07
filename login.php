<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>YOTA | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
                <?php
            if(isset($_GET['not'])){
                switch ($_GET['not']) {
                    case 1:
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            Contraseña incorrecta o usuario no encontrado.
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
                    
                }
            }
            ?>
   
            <h3>YOTA NICARAGUA</h3>
            <p>Sistema de registro de casos
            </p>
            <p>Inicie sesión con su usuario asignado</p>
            <form class="m-t" role="form" action="cfg/config.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="usuario">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="clave">
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" name="login" value="Entrar">

        
            </form>
        
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
