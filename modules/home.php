<?php

if($_SESSION['PERMISO'] !=1){
    include_once 'modules/home_recepcion.php';
}else{
    include_once 'modules/home_soporte.php';
}