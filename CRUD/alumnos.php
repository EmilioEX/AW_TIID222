<?php
    /*Incluye la informacipon del archivo conexion.php*/
    include("conexion.php");

    $con=conectar();

    /*Solicita todo lo que tenga la tabla de alumnos*/
    $sql = "SELECT * from alumnos";
    $query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIID-222 CRUD Alumnos</title>
</head>
<style>
    th{
        border: 2px solid black;
    }
</style>
<body>
    <table>
        <tr>
            <th >Matrícula</th>
            <th >Nombre</th>
            <th >Apellido Paterno</th>
            <th >Apellido Materno</th>
            <th >Acciones</th>
            <th >    </th>
        </tr>
            <th>123</th>
        <tr>
            <th>1234</th>
        </tr>
            <th>12345</th>
        <tr>
        </tr>
        <tr>
        </tr>
   
    </table>
</body>
</html>