<?php
/**
 * Created by PhpStorm.
 * User: al0nc3ll0
 * Date: 27/02/19
 * Time: 8:38 PM
 * Inicia con la carga de todas las libs necesiarios
 */
    //cargamos librerias

    require_once 'config/configurar.php';
    require_once 'librerias/BaseDatos.php';
    require_once 'librerias/Controlador.php';
    require_once 'librerias/Core.php';


    //autoload
    spl_autoload_register(function ($nombreClase)
    {
       require_once 'librerias/'.$nombreClase.'.php';
    });

?>


