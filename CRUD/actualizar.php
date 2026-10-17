<?php
    include("conexion.php");
    $con = conectar();

    $matricula=$_POST["matricula"];
    $nombre=$_POST['nombre'];
    $apellidoP=$_POST['apellidoP'];
    $apellidoM=$_POST['apellidoM'];
    $edad=$_POST['edad'];

    $sql="update alumnos set nombre = '$nombre', apellidoP='$apellidoP', apellidoM='$apellidoM', edad='$edad' where matricula = '$matricula'";

    $query=mysqli_query($con, $sql);

    if($query){
        header("Location: alumnos.php");
        exit();
    }else{
        echo "Error al eliminar el alumno" . mysqli_error($con);
    }
?>