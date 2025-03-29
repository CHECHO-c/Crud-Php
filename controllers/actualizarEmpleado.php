<?php
require_once '../models/MySQL.php';

$mysql = new MySQL();

$mysql->conectar();

$id = $_POST['idEmp'];
$nombre = $_POST['nombreEmp'];
$documento = $_POST['nroDocumentoEmp'];
$cargo = $_POST['cargoEmp'];
$areaDep = $_POST['areaEmp'];
$fechaIngreso = $_POST['fechaIngresoEmp'];
$salario = $_POST['salarioBaseEmp'];
$correo = $_POST['correoEmp'];
$estado = $_POST['estadoEmp'];
$telefono = $_POST['telefonoEmp'];


$consulta = "UPDATE empleados set nombre='$nombre',numero_documento = '$documento',cargo='$cargo',area_departamento='$areaDep',fecha_ingreso='$fechaIngreso',salario_base=$salario,estado=$estado,correo_electronico='$correo',telefono='$telefono' where id=$id; ";

$mysql->ejecutarConsulta($consulta);

$mysql->desconectar();      
if($consulta){
    echo " <h1> EDITADO CON EXITO </h1>";
}

header("refresh:3;url=../views/dashboard.php");


?>