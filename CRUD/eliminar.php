<?php
    include("conexion.php");

    $con = conectar();

    $matricula = $_GET['matricula'];

    $sql="delete from alumnos where matricula='$matricula'";

    $query=mysqli_query($con,$sql);

    if($query){
        header("Location: alumnos.php");
        exit();
    }else{
        echo "Error al eliminar el alumno: " . mysqli_error($con);
    }
?>