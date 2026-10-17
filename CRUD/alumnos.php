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
    .div1{
        background-color: #ec9f2b;
        display:flex;
        flex-direction: column;
        /*flex:1;*/
        padding: 20px;
    }
    .div2{
        background-color: #ec782b;
        display:flex;
        flex-direction: column;
        align-items:center;
        flex:1;
    }
</style>
<body style="font-family: Arial">

    <div style= "display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin: 20px;">
        <div class="div1">
            <h1>Tabla de Alumnos</h1>
            <table>
                <thead>
                    <tr>
                        <th >Matrícula</th>
                        <th >Nombre</th>
                        <th >Apellido Paterno</th>
                        <th >Apellido Materno</th>
                        <th >Edad</th>
                        <th colspan="2">Acciones</th>
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
                        <td> <a href="eliminar.php?matricula=<?php echo $row['matricula']; ?>">Eliminar</a></td>
                        <td> <a href="editar.php?matricula=<?php echo $row['matricula']; ?>">Editar</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="div2">
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