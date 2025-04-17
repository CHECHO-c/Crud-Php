<?php
session_start();
if(isset($_POST["contraseñaActualEmp"]) && !empty($_POST['contraseñaActualEmp'])){
require '../models/MySQL.php';
$mysql = new MySQL();

$mysql->conectar();
$id = filter_var($_SESSION['id'],FILTER_VALIDATE_INT);
$consulta ="SELECT contrasena from empleados where id=$id;";
$resultado = $mysql->ejecutarConsulta($consulta);
$contraseñaIngresada = $_POST['contraseñaActualEmp'];

if($contraseña=mysqli_fetch_assoc($resultado)){
    $hash = $contraseña['contrasena'];
    if(password_verify($contraseñaIngresada,$hash)){
        header("Location:../views/actualizarContraseña.php");
    }
    else{
        header("Location:../views/verificarContraseña.php");
        $_SESSION['errorContraseña']="Contraseña Incorrecta";
    }
}
}
else{
    header("Location:../views/verificarContraseña.php");
    $_SESSION['errorContraseña']="No enviaste ningun dato";
}
?>