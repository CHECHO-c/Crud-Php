<?php
require_once '../models/MySQL.php';

//Verifico que el id mandado sea valido o exista
if(!isset($_GET['id'])){
    echo "Id de empleado no identificado";
    exit();
}




    $id = $_GET['id'];


$mysql= new MySQL();
$mysql->conectar();

$consultaCargos = "SELECT * FROM cargos;";
$consultaAreas = "SELECT * FROM area_departamento;";
$resultadoCargos= $mysql->ejecutarConsulta($consultaCargos);
$resultadoAreas= $mysql->ejecutarConsulta($consultaAreas);
$resultado = $mysql->ejecutarConsulta("SELECT * FROM empleados WHERE id=$id");

$empleado = mysqli_fetch_assoc($resultado);

$mysql->desconectar();
if(!$resultado){
    echo "Error en la consulta";
}








?>


<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>

<body>

<h1>Actualizar datos del empleado </h1>
    <form action="../controllers/actualizarEmpleado.php" method="POST">
    
        <input type="hidden" name="idEmp" id="idEmp" readonly required value="<?php echo $empleado['id']; ?>">
        
        <input type="text" name="nombreEmp" id="nombreEmp" readonly required value="<?php echo $empleado['nombre'] ?>" >
        <br>
        <br>

        <input type="number" name="nroDocumentoEmp" id="nroDocumentoEmp" readonly required value="<?php echo $empleado['numero_documento'] ?>" >
        <br>
        <br>


       


        

        <label for="">Cargo</label>
        <select name="cargoEmp">
            <?php 
                echo $empleado['cargos_id'];
                 $valorOpcion = 1;
                 while($datosCargos = mysqli_fetch_assoc($resultadoCargos)){
                    if($empleado["cargos_id"]===$datosCargos["id_cargo"]){
                        echo "<option value=$valorOpcion selected> ".$datosCargos["nombre_cargo"]."</option> \n";
                    }
                    else{
                        echo "<option value=$valorOpcion>".$datosCargos["nombre_cargo"]."</option> \n";
                    }
                
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
                if($empleado["cargos_id"]===$datosAreas["id_area"]){
                    echo "<input type=radio value=$valorRadio name=areaEmp required checked >
                    <label>".$datosAreas["nombre_area"]."</label> \n";
                }
                else{
                    echo "<input type=radio value=$valorRadio name=areaEmp required >
                    <label>".$datosAreas["nombre_area"]."</label> \n";
                }
            $valorRadio++;
            }
            
            ?>
            




        </fieldset>
        <br>
        <br>
        <label for="">Fecha de ingreso</label>
        <input type="date" name="fechaIngresoEmp" required value="<?php echo $empleado['fecha_ingreso'] ?>">
            <br>
            <br>
        

        <label for="">Salario Base</label>
        <input type="number" name="salarioBaseEmp"  required value="<?php echo $empleado['salario_base'] ?>">

        <br>
        <br>

        <label for="">Correo</label>
        <input type="text" name="correoEmp" required value="<?php echo $empleado['correo_electronico'] ?>">
        <br>
        <br>
        <label for="">Telefono</label>
        <input type="number" name="telefonoEmp" required value="<?php echo $empleado['telefono'] ?>">
        <br>
        <br>

        <fieldset>
            <legend>Estado</legend>

            <input type="radio" value="0" name="estadoEmp" <?php echo $empleado["estado"]==0?  'checked':'';  ?>>
            <label for="">Inactivo</label>

            <input type="radio" value="1" name="estadoEmp" <?php echo $empleado["estado"]==1?  'checked':'';  ?>>
            <label for="">Activo</label>

            




        </fieldset>
        <br>
        <button type="submit">Actualizar Empledo</button>


    </form>
</body>

</html>