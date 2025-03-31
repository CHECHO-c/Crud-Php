<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once '../models/MySQL.php';

    $mysql = new MySQL();
    
    $mysql->conectar();
    
    if( !filter_var($_POST['correoEmp'],FILTER_VALIDATE_EMAIL) ||
        !filter_var($_POST['salarioBaseEmp'],FILTER_VALIDATE_INT)||
        !filter_var($_POST['telefonoEmp'],FILTER_VALIDATE_INT)||
        !filter_var($_POST['nroDocumentoEmp'],FILTER_VALIDATE_INT)){
        echo 'algunos datos fueron enviado en el  formato incorrecto';
        header("refresh:3;url=../views/editarEmpleado.php?id=" . $_POST['idEmp']);
        
    }
    else{
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
        
        if (!empty($nombre) && !empty($documento) && !empty($cargo)  && !empty($areaDep) && !empty($fechaIngreso) && !empty($salario) && !empty($correo) && !empty($telefono)  ) {
            $consulta = "UPDATE empleados set nombre='$nombre',numero_documento = '$documento',cargo='$cargo',area_departamento='$areaDep',fecha_ingreso='$fechaIngreso',salario_base=$salario,estado=$estado,correo_electronico='$correo',telefono='$telefono' where id=$id; ";
        
            $mysql->ejecutarConsulta($consulta);
            
            $mysql->desconectar();      
            if($consulta){
                echo " <h1> EDITADO CON EXITO </h1>";
            }
            
            header("refresh:3;url=../views/dashboard.php");
        }
        else{
            echo "<h1>Algunos datos fueron enviados vacios </h1>";
        }
    }

   

    }
    else{
        echo "<h1>Metodo no identifcado <h1>";
    }
    



?>