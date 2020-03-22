<?php
//----------BACKEND----------------
    class Articulos_model{
        private $db;
        private $articulos;

        //constructor
        public function __construct(){
            
            require_once("Model/Connection.php");
            
            //utilizamos la clase Conexion y llamamos al metodo estatico conexion().
            //Recordar que el $this hace referencia a la variable encapsulada
            $this->db=Conectar::conexion();

            $this->articulos=array();

        }

        //metodo getter
        public function get_articulos(){
            
            $consulta=$this->db->query("SELECT * FROM articulos");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->articulos[]=$filas;

            }
 
            return $this->articulos;

        }
        
            
        

    }


?>