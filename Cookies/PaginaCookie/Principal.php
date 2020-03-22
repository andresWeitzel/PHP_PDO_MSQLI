<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>

        <?php
            //Si la cookie idioma a sido creada o no lo ha sido, en caso de que lo este que tipo de isidoma ha sido seleccionado
            if(isset($_COOKIE["idioma"])){
                
                if($_COOKIE["idioma"] == "es" ){

                        header("Location:español.html");
                
                    }else if($_COOKIE["idioma"] == "us" ){
                
                        header("Location:unitedstate.html");
                    }
                }
            


        ?>

        <table width="25%" border="0" align="center">
            <tr>
                <td colspan="2" align="center">
                    <h1>Elige un idioma</h1>
                </td>
            </tr>

            <tr>
                <!--Con "creaCookie.php?idioma=es" linkeamos el directorio en el que nos mandara una vez tocada la bandera argentina, con el interrogativo hacemos referencia a que parametro vamos a utilizar(idioma), con su valor(es)-->
                <td align="center">
                    <a href="creaCookie.php?idioma=es"><img src="img/arg.jpg" width="100" height="80"></a>
                </td>

                <td align="center">
                    <a href="creaCookie.php?idioma=us"><img src="img/eeuu.png" width="100" height="80"></a>
                </td>

            </tr>

        </table>
</body>

</html>