<?php
/*Creación de una función llamada conectar*/
/*Función -> Bloque de codigoq que podemos mandar a llamar cuando lo necesita*/
function conectar(){
      /*Informacion del servidor*/
    $host = "localhost";
    $user = "root";
    $password = "";

    /*Base de Datos*/
    $db="aw_crud";

    /*Función de php, que permite conectar con MySQL*/
    $con = mysqli_connect($host,$user,$password);

    mysqli_select_db($con,$db);

    return $con;
}
?>