<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../model  s/MySQL.php';

    $mysql = new MySQL();
    $mysql->conectar();
    $id = $_GET['id'];
    $consulta = "UPDATE empleados set estado=0 where id=$id";
    $mysql->ejecutarConsulta($consulta);

    $mysql->desconectar();

    echo "Empleado despedido";

    header("refresh:3;url=../views/dashboard.php");
}

?>