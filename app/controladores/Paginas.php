<?php
/**
 * Created by PhpStorm.
 * User: al0nc3ll0
 * Date: 28/02/19
 * Time: 12:00 AM
 */

    class Paginas extends Controlador
    {
        public function __construct()
        {
            //echo 'Controlador Paginas cargado';
            $this->articuloModelo = $this->modelo('Articulo');
        }

        public function index()
        {
            $articulos = $this->articuloModelo->obtenerArticulos();
            print_r($articulos[0]);
            //pars que le pasamos a la vista inicio
            $datos= [
                'titulo'    => 'Bienvenidos al Portal MVC'//,
                //'articulos' => $articulos
            ];
            $this->vista("paginas/inicio", $datos);
        }//index



//        public function articulo()
//        {
//            $this->vista("paginas/articulo");
//
//            $this->actualizar(32);
//            try {
//                 //bloque try
//                echo "  ";
//            } catch (PDOException $ex) {
//                Logger::log($ex);
//
//            }
//        }
//
//
//        public function actualizar($numRegistro)
//        {
//            echo numRegistro;
//
//        }
    }//class paginas