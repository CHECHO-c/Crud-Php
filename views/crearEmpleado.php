<?php 
require_once '../models/MySQL.php';
$mysql = new MySQL();

$consultaCargos = "SELECT * FROM cargos;";
$consultaAreas = "SELECT * FROM area_departamento;";

$mysql->conectar();

$resultadoCargos= $mysql->ejecutarConsulta($consultaCargos);
$resultadoAreas= $mysql->ejecutarConsulta($consultaAreas);

$mysql->desconectar();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>

<body>
    <form action="../controllers/crearEmpleado.php" method="POST">
        <label for="">Nombre completo</label>
        <input type="text" name="nombreEmp" required>
        <br><br>

        <label for="">Numero de documento</label required>
        <input type="number" name="nroDocumentoEmp">
        <br><br>

        <label for="">Cargo</label>
        <select name="cargoEmp" required>
            <?php
            $valorOpcion = 1;
             while($datosCargos = mysqli_fetch_assoc($resultadoCargos)){
            echo "<option value=$valorOpcion>".$datosCargos["nombre_cargo"]."</option> \n";
            $valorOpcion++;
            }
            ?>
        </select>
        <br><br>

        <fieldset>
            <legend>Area o departamento</legend>
            <?php 
            $valorRadio = 1;
            while($datosAreas=mysqli_fetch_assoc($resultadoAreas)){
                echo "<input type=radio value=$valorRadio name=areaEmp required >
            <label>".$datosAreas["nombre_area"]."</label> \n";
            $valorRadio++;
            }
            
            ?>


        </fieldset>
        <br>

        <label for="">Fecha de ingreso</label>
        <input type="date" name="fechaIngresoEmp" required>
        <br>
        <br>

        <label for="">Salario Base</label>
        <input type="number" name="salarioBaseEmp" required>

        <br>
        <br>

        <label for="">Correo</label>
        <input type="text" name="correoEmp" required>
        <br>
        <br>
        <label for="">Telefono</label>
        <input type="number" name="telefonoEmp" required>
        <br>
        <br>
        <button type="submit">Agregar Empledo</button>


    </form>
</body>

</html>