<?php
/**
 * Created by PhpStorm.
 * User: al0nc3ll0
 * Date: 27/02/19
 * Time: 8:40 PM
 * controlador base para heredar a los demas
 */

    //Clase conrolador principal
    //Carga los modelos y las vistas, en general
    class Controlador
    {
        //cargar el modelo
        public function modelo($modelo)
        {
            //carga modelo
            require_once '../app/modelos/'.$modelo.'.php';
            //instanciar el modelo
            return new $modelo();
        }
        //cargar la vista
        public function vista($vista, $datos=[])
        {
            //verificar que si exista el archivo de la vista
            if(file_exists('../app/vistas/'.$vista.'.php'))
            {
                //carga modelo
                require_once '../app/vistas/'.$vista.'.php';
            }else{
                //si el arch de la vista no existe, truena el asunto
                die("La vista $vista no existe");
            }
        }
    }
?>