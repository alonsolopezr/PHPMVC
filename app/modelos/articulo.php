<?php
/**
 * Created by PhpStorm.
 * User: al0nc3ll0
 * Date: 03/03/19
 * Time: 6:59 AM
 */

    class Articulo
    {
        //props

        private $db;

        public function __construct()
        {
            $this->db = new BaseDatos;

        }

        public function obtenerArticulos()
        {
            //tabla usuarioroductoss mientras hacemos registros de articulos...
            $this->db->query("SELECT * FROM productos ");
            return $this->db->registros();
        }
    }//class

?>