<?php
    /*Conexion*/
    include("conexion.php");
    $con= conectar();
    /*Recibimos info del form*/
    $matricula=$_POST['matricula'];
    $nombre=$_POST['nombre'];
    $apellidoP=$_POST['apellidoP'];
    $apellidoM=$_POST['apellidoM'];
    $edad=$_POST['edad'];
    /*Construimos la consulta para insertar info en la bd*/
    $sql="insert into alumnos (matricula, nombre, apellidoP, apellidoM , edad)
        values ('$matricula','$nombre','$apellidoP','$apellidoM','$edad')
        ";
    /*Ejecutamos la consulta*/
    $query = mysqli_query($con,$sql);

    /*Comprobamos si se insertó o no el alumno*/
    if($query){
        header("Location: alumnos.php");
    } else{
        echo "Error al insertar al alumno";
    }
?>