<?php 
 require_once '../models/MySQL.php';
session_start();

if(isset($_POST['nroDocumentoEmpLogin'],$_POST['contraseñaEmpLogin'])
 && !empty($_POST['contraseñaEmpLogin']) && !empty($_POST['nroDocumentoEmpLogin'])){


    $mysql = new MySQL();
    $mysql->conectar();

    $nroDocumento = $_POST['nroDocumentoEmpLogin'];
    $contraseña = $_POST['contraseñaEmpLogin'];

    if(!filter_var($nroDocumento,FILTER_VALIDATE_INT)){
        $_SESSION['error']="El documento ingreasado no es valido";
            $_SESSION['old']=[
                'documento'=> $nroDocumento,
                'contraseña'=> $contraseña

            ];
            header("Location:../views/login.php");
            exit();
    }
    
    $consulta = "SELECT * from empleados where numero_documento=$nroDocumento";
    $resultado = $mysql->ejecutarConsulta($consulta);

    if($usuario=mysqli_fetch_assoc($resultado)){
        if(password_verify($contraseña,$usuario['contrasena'])){
            $_SESSION["nombre"]=$usuario['nombre'];
            $_SESSION["nroDocumento"]=$usuario['numero_documento'];
            $_SESSION["id"]=$usuario['id'];

            header("Location:../views/dashboard.php");
            exit();
        }
        else{
            $mysql->desconectar();
            $_SESSION['error']="Contraseña incorrecta";
            $_SESSION['old']=[
                'documento'=> $nroDocumento
                

            ];
                header("Location:../views/login.php");
                exit();
        }
    }
    else{
        $mysql->desconectar();
            $_SESSION['error']="El documento $nroDocumento no existe";
            $_SESSION['old']=[
                'documento'=> $nroDocumento,
                'contraseña'=> $contraseña

            ];
            header("Location:../views/login.php");
            exit();
    }
}
else{
    
    $_SESSION['error']="Algunos datos fueron enviados vacios";
    $_SESSION['old']=[
        'documento'=> $nroDocumento,
        'contraseña'=> $contraseña

    ];
        header("Location:../views/login.php");
        exit();
}


?>