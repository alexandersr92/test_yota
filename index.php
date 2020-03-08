<?php
require_once 'cfg/config.php';
require_once 'structure/header.php';

if($dbConexion === true){
    if(isset($_SESSION["USUARIO_ID"])){

        require_once 'structure/menu_left.php';
        require_once 'structure/menu_top.php';

        if(isset($_GET['pag'])){
            switch ($_GET['pag']) {
                case 'usuarios':
                    include_once 'modules/usuarios.php';
                    break;
                case 'gestiones':
                    include_once 'modules/gestiones.php';
                    break;
                case 'ticket':
                    include_once 'modules/tickets.php';
                    break;
                case 'listaticket':
                    include_once 'modules/listaTickets.php';
                    break;

            }
        }else{
            require_once 'modules/home.php';
        }
    
    }else{
       header("Location:login.php");
    }
        

}else{
    require_once 'modules/db_error.php';

}
require_once 'structure/footer.php';

?>
    