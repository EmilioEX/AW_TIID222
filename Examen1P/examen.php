<?php
    include("conexion.php");
    $c=conectar();
    $sql = "SELECT * from autos";
    $query = mysqli_query($c, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    input{
        width: 200px;
    }
    th{
        border: 2px solid black;
    }
    </style>
</head>
<body>
    <!-- PRINCIPAL-->
    <div style="display: flex; flex-direction: column;">
        <header>
        <!-- TITULAR-->
            <div style=" align-items: center; display: grid; grid-template-columns: 1fr ; align-content: center; background-color: aquamarine; padding: 20px; text-align: center;">

                    <h1 style="text-align: center;">EXAMEN 1ER PARCIAL - APLICACIONES WEB</h1>

            </div>
        </header>
        <main>
            <!-- SEGUNDO NIVEL-->
            <div style="display: grid; grid-template-columns: 1fr 1fr;">
                <!-- Formulario-->
                <div>
                    <form action="insertar.php" method="POST">
                        <div style="display: flex; flex-direction: column; background-color: cadetblue; width: 50%; align-items: center;padding: 20px;">
                            <h2>Formulario</h2>
                            <label for="id">ID: </label>
                            <input type="text" class="form-control" name="id" placeholder="ID">
                            <label for="marca">Marca: </label>
                            <input type="text" class="form-control" name="marca" placeholder="Marca">

                            <label for="modelo">Modelo: </label>
                            <input type="text" class="form-control" name="modelo" placeholder="Modelo">
                            <label for="anio">Año: </label>
                            <input type="number" class="form-control" name="anio" placeholder="Año">
                            <label for="precio">Precio: </label>
                            <input type="number" class="form-control" name="precio" placeholder="Precio">
                            <button style="margin: 20px">Ingresar</button>
                        </div>
                    </form>
                </div>
                <!-- TABLA -->
                <div>
                    <table style="border: 2px solid black">
                        <thead>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                            <th>Precio</th>
                        </thead>
                        <tbody>
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['marca']?></td>
                                <td><?php echo $row['modelo']?></td>
                                <td><?php echo $row['anio']?></td>
                                <td><?php echo $row['precio']?></td>
                            </tr>
                            <?php
                                }   
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- tercer nivel-->
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; padding: 20px">
                <div style="text-align: center; align-items: center; align-content: center; background-color: chocolate;">
                    <p><strong>R1 - Introducción a Git y GitHub</strong></p>
                    <a href="C:\Users\carri\Downloads\Reporte AppWebYEstDatos_Bri.pdf">R1 en pdf</a>
                </div>
                <div style="text-align: center; align-items: center; align-content: center; background-color: chocolate;">
                    <p><strong>R2 - HTML + CSS + Box Model</strong></p>
                    <a href="C:\Users\carri\Downloads\AW_1R_HTML, CSS, Box Model.pdf">R2 en pdf</a>
                </div>
                <div style="text-align: center; align-items: center; align-content: center; background-color: chocolate;">
                    <p><strong>R3 - Flex - grid</strong></p>
                    <a href="C:\Users\carri\Downloads\AW_RX_P2_FlexGrid.pdf">R3 en pdf</a>
                </div>
            </div>
        </main>
        <footer>
            <!-- Último nivel-->
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; background-color: blueviolet; align-content: center; align-items: center;">
                <!-- imagen-->
                <div>
                    <img src="img\perro.png" alt="iamgen" style="width: 200px;">
                </div>
                <!-- texto-->
                <div style="text-align: center; align-items: center; align-content: center; ">
                    <p><strong>EMILIO RIVERA GARCÍA</strong></p>
                    <p>muy buena</p>
                </div>
                <!-- UPQ-->
                <div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/UPQ-Logo.png?utm_source=es.wikipedia.org&utm_campaign=index&utm_content=original" alt="Otra imagen" style="width: 200px;">
                </div>
            </div>
        </footer>
    </div>
</body>
</html>