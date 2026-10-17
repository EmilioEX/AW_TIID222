<?php
include("conexion.php");
$con = conectar();

$matricula = $_GET['matricula'];

$sql = "select * from alumnos where matricula='$matricula'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <style>
        html, body{
        margin: 0px;
        }
        h1{
            text-align: center;
        }
        table{
            border: 4px solid yellow;
        }
        td, th{
            border: 4px solid #eccf2b;
            padding: 10px;
        }

        table td{
            text-align: center;
        }
        .div2{
        background-color: #ec782b;
        display:flex;
        flex-direction: column;
        align-items:center;
        flex:1;
        padding:20px;
        margin:20px;
        }
    </style>
</head>
<body style="font-family: Arial">

<div class="div2">
    <h1>Formulario de edición</h1>
    <form action="actualizar.php" method="POST">
        <div>
            <input type="hidden" name="matricula" value="<?php echo $row['matricula'];?>">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre'];?>">
            <label>Apellido Paterno:</label>
            <input type="text" name="apellidoP" value="<?php echo $row['apellidoP'];?>">
            <label>Apellido Materno:</label>
            <input type="text" name="apellidoM" value="<?php echo $row['apellidoM'];?>">
            <label>Edad:</label>
            <input type="number" name="edad" value="<?php echo $row['edad'];?>">
            <button type="submit">Actualizar</button>
        </div>
    </form>
</div>

</body>
</html>
