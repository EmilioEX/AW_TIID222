<?php
    include("conexion.php");

    $c=conectar();

    $id=$_POST['id'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $anio=$_POST['anio'];
    $precio=$_POST['precio'];

    $sql="insert into autos(id, marca, modelo, anio, precio)
    values ('$id','$marca','$modelo','$anio','$precio')";
    $query =mysqli_query($c, $sql);


    if($query){
        header("Location: examen.php");
    }else{
        echo "ERROR al insertar auto";
        }

?>