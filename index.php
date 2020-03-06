<?php
require_once 'cfg/config.php';
require_once 'structure/header.php';


if($dbConexion === true){


    require_once 'structure/menu_left.php';
    require_once 'structure/menu_top.php';

    if(isset($_GET['pag'])){
        switch ($_GET['pag']) {
            case 'usuarios':
                include_once 'modules/usuarios.php';
                break;
            case 1:
                echo "i es igual a 1";
                break;
            case 2:
                echo "i es igual a 2";
                break;
        }
    }else{
        require_once 'modules/home.php';
    }
   
    
    

}else{
    require_once 'modules/db_error.php';

}
require_once 'structure/footer.php';

?>
    