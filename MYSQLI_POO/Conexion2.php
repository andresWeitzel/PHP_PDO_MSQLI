<?php

    require "Config.php";

    class Conexion{
        protected $conexion_db;

        public function Conexion(){

            $this->conexion_db=new mysqli(DB_HOST, DB_US, DB_PASSW, DB_NAME);    

            if($this->conexion_db->connect_errno){

                echo "Fallo al conectar la base de datos MYSQL: ".$this->conexion_db->connect_errno;
                return;
            
            }

            $this->conexion_db->set_charset(DB_CHARSET);//INCLUIMOS EL ARCHIVO UTF PARA NO TENER PROBLEMAS DE  CONEXION
        
        
        }
    }


?>