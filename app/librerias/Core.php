<?php
/**
 * Created by PhpStorm.
 * User: al0nc3ll0
 * Date: 27/02/19
 * Time: 8:40 PM
 * motor ppal del MVC
 *
 */
    //Mapear la URL ingresada en el nav
    //1-Controlador
    //2-accion o método
    //3-params
    //  http://localhost/wawawa/Controlador/accion/par
    //  http://localhost/wawawa/producto/consulta/1

    class Core
    {
        //cuando no se especifica controlador, se carga este, con su método index
        protected $controladorActual='paginas';
        protected $metodoActual     ='index';
        protected $parametros       = [];

        //constructor de Core, carga el url hacia este objeto
        public function __construct()
        {
            //print_r($this->getUrl());
            $url = $this->getUrl();
            //eval si el archivo cargado existe en path
            if(file_exists('../app/controladores/*'.ucwords($url[0]).'.php'))
            {
                //si existe el arhcivo se establece como controlador por default
                $this->controladorActual=ucwords($url[0]); //en el idx 0 esta el controlador

                //unset para el url[0] controlador
                unset($url[0]);
            }
            //inclur controlador
            require_once '../app/controladores/'.$this->controladorActual.'.php';
            //
            $this->controladorActual= new $this->controladorActual;

            ///segunda parte del array $url[1] idx 1 es el METODO o ACCION del controlador
            if(isset($url[1]))//tiene algo la seccion accion
            {   //lo extraemos
                if(method_exists($this->controladorActual, $url[1]))
                {
                    //verificamos cual es
                    $this->metodoActual = $url[1];
                    //unset para el url[1] accion del controlador
                    unset($url[1]);
                    //echo $this->metodoActual;
                }
            }//isset GET 1 accion del controlador
            //OBTENER LOS POSIBLES PAR´AMETROS
            $this->parametros = $url ? array_values($url) : [];
            //llamar callback con parametros array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

        }//construct

        public function getUrl()
        {
            //todo lo que se ingrese en URL se imprime
            //url es que capta .htaccess con su rewrite
            if(isset($_GET['url']))
            {
                //quita espacios en las orillas de cada eleemnto entre /
                $url=rtrim($_GET['url'],'/');
                $url=filter_var($url,FILTER_SANITIZE_URL); //limpia
                $url=explode('/',$url);//quita '/' y devuelve arreglo con contrl accion paramtro
                return $url;
            }
        }//getUrl

    }//class core
