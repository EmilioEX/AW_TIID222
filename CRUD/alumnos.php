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
    td{
        border: 2px solid black;
    }
</style>
<body style="font-family: Arial">

    <div style= "display:grid; grid-template-columns: 2fr 1fr; gap:20px">
        <div>
            <h1>Tabla de Alumnos</h1>
            <table style="border: 2px solid black">
                <thead>
                    <tr>
                        <th >Matrícula</th>
                        <th >Nombre</th>
                        <th >Apellido Paterno</th>
                        <th >Apellido Materno</th>
                        <th >Edad</th>
                        <th >Acciones</th>
                        <th >    </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $row['matricula']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['apellidoP']?></td>
                        <td><?php echo $row['apellidoM']?></td>
                        <td><?php echo $row['edad']?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    <tr>            
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                    </tr>
                    <tr>
                        <td>1234</td>
                    </tr>
                        <td>12345</td>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <h1>Formulario</h1>
            <form action="insertar.php" method="POST">
                <div>
                    <input type="text" class="form-control" name="matricula" placeholder="Matrícula">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    <input type="text" class="form-control" name="apellidoP" placeholder="Apellido Paterno">
                    <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno">
                    <input type="number" class="form-control" name="edad" placeholder="Edad">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>