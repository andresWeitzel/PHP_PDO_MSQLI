<?php

    require "Conexion2.php";

    //Llamamos a otra clase ya creada en ekl archivo conexion2.php para reutilizarla mediante la sentencia extends
    class ConsultaPaises extends Conexion{

        public function ConsultaPaises(){
            //Llamamomos al constructor de la calase padre(en este3 caso de la clase conexion)
            //Lo hacemos con lasentecnia parent::_construct(); 
            parent::__construct();
        }

        //Creamos una funcion
        public function get_country(){
            //podemos utilizar conexion_db gracias a que heredamos eso de la clase Conexion.(HERENCIA)
            $resultado=$this->conexion_db->query('SELECT * FROM country' );
            //La consulta que hagamos la guardamos en un array asociativo
            $consulta=$resultado->fetch_all(MYSQLI_ASSOC);
            //Con el return indicamo que nos devuelva el array que construimos 
            return $consulta;

        }
    }



?>