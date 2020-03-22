<?php
    //------INTERMEDIARIO-------
    require_once("Model/Articulos_model.php");

    //instanciamos la clase Articulos_model, al instanciarla estamos llamando al constructor
    $articulos=new Articulos_model();

    //Creamos un array para almacenar los articulos con la funcion get
    $array_articulos=$articulos->get_articulos();


    require_once("View/Articulos_view.php");
?>