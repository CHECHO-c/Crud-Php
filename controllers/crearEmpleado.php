<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../models/MySQL.php';

    $mysql = new MySQL();
    
    $mysql->conectar();
    
    //Obtener los datos de formulario
    
    
    $nombre = $_POST['nombreEmp'];
    $documento = $_POST['nroDocumentoEmp'];
    $cargo = $_POST['cargoEmp'];
    $areaDep = $_POST['areaEmp'];
    $fechaIngreso = $_POST['fechaIngresoEmp'];
    $salario = $_POST['salarioBaseEmp'];
    $correo = $_POST['correoEmp'];
    $telefono = $_POST['telefonoEmp'];
    
    if (!empty($nombre) && !empty($documento) && !empty($cargo)  && !empty($areaDep) && !empty($fechaIngreso) && !empty($salario) && !empty($correo) && !empty($telefono)  ) {
    
    
        $consulta = "INSERT INTO empleados (nombre, numero_documento, cargo, area_departamento, fecha_ingreso, salario_base, estado, correo_electronico, telefono)
        VALUES ('$nombre','$documento','$cargo','$areaDep','$fechaIngreso',$salario,1,'$correo','$telefono');";
    
        $mysql->ejecutarConsulta($consulta);
    
        $mysql->desconectar();
    
        echo "<h1>Empleado Registrado con exito</h1> <br> <br>";
    
        header("refresh:3;url=../views/dashboard.php");
    }
    else{
        echo "<h1>Algunos datos fueron enviados vacios </h1>";
    }
    
}
else{
 echo "Sin hackear papi";       
}


?>