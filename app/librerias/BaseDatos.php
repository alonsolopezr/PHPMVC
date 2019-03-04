<?php
/**
 * Created by PhpStorm.
 * User: al0nc3ll0
 * Date: 27/02/19
 * Time: 8:39 PM
 */
    //clase para conectarse a la BD y ejecutar querys
    class BaseDatos
    {
        private $host = DB_HOST;
        private $us   = DB_US;
        private $pwd  = DB_PWD;
        private $nombre_base = DB_NOMBRE;

        private $dbh; //datase handler
        private $stmt;
        private $error;

        public function __construct()
        {
            //config la conex
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->nombre_base;
            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //crea instancia de PDO
            try
            {
                $this->dbh = new PDO($dsn, $this->us, $this->pwd, $opciones);
                //para inclusion de caracteres español lat
                $this->dbh->exec('set names utf8');
            }
            catch(PDOException $ex)
            {
                $this->error="error al conectar ".$e->getMessage();
                echo " ".$this->error;
            }
        }//construct

        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
        }

        //vinculamos PDO con la consulta
        public function bind($paramatro, $valor, $tipo=null)
        {
            if (is_null($tipo))
            {
                switch($tipo)
                {
                    case is_int($valor):
                        $tipo=PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo=PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo=PDO::PARAM_NULL;
                        break;

                    default:
                        $tipo=PDO::PARAM_STR;
                        break;
                }//switch


            }
            $this->stmt->bindValue($paramatro, $valor, $tipo);
        }//bind

        //ejecutamos la consulta
        public function execute()
        {
            $this->stmt->execute();
        }//execute

        //SELECT de todos los registros que cumplan con el WHERE en el stmt
        public function registros()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //SELECT para un solo REGISTRO como resultado
        public function registro()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //obtener la cantidad de registros de una consulta
        public function rowCount()
        {
            return $this->stmt->rowCount();
        }//rowCount
    }