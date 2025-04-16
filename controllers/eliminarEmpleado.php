<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once '../models/MySQL.php';

    $mysql = new MySQL();
    $mysql->conectar();
    $id = $_GET['id'];
    $consulta = "UPDATE empleados set estado=0 where id=$id";
    $mysql->ejecutarConsulta($consulta);

    $mysql->desconectar();

    echo "Empleado despedido";

    header("refresh:3;url=../views/dashboard.php");
}
else{
    echo "Id alterado";
}
?>