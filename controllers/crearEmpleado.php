<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../models/MySQL.php';

    $mysql = new MySQL();

    $mysql->conectar();


    //Obtener los datos de formulario

    if (
        !filter_var($_POST['correoEmp'], FILTER_VALIDATE_EMAIL) ||
        !filter_var($_POST['salarioBaseEmp'], FILTER_VALIDATE_INT) ||
        !filter_var($_POST['telefonoEmp'], FILTER_VALIDATE_INT) ||
        !filter_var($_POST['nroDocumentoEmp'], FILTER_VALIDATE_INT)
    ) {
        echo 'algunos datos fueron enviado en el  formato incorrecto';
        header("refresh:3;url=../views/crearEmpleado.php");

    } else {



        $nombre = $_POST['nombreEmp'] ?? "";
        $documento = $_POST['nroDocumentoEmp'] ?? "";
        $cargo = $_POST['cargoEmp'] ?? "";
        $areaDep = $_POST['areaEmp'] ?? "";
        $fechaIngreso = $_POST['fechaIngresoEmp'] ?? "";
        $salario = $_POST['salarioBaseEmp'] ?? "";
        $correo = $_POST['correoEmp'] ?? "";
        $telefono = $_POST['telefonoEmp'] ?? "";
        $contraseña = $_POST['contraseñaEmp'] ?? "";


        //Encryptar contraseña
        $hash = password_hash($contraseña,PASSWORD_DEFAULT);
        

        //Guardar archivo en la otra carpeta
        $archivoImagen = $_FILES['imgEmp'];

        $nombreImagen = $archivoImagen["name"];
        $temporalImagen = $archivoImagen["tmp_name"];
        $tipoImagen = $archivoImagen["type"];
        $rutaCarpeta = "../imagenes_usuarios/" . $nombreImagen;




        if ($tipoImagen != "image/jpg" && $tipoImagen != "image/png" && $tipoImagen != "image/jpeg") {

            if ($mysql->verificarCorreo($correo) && $mysql->verificarDocumento($documento)) {
                if (!empty($nombre) && !empty($documento) && !empty($cargo) && !empty($areaDep) && !empty($fechaIngreso) && !empty($salario) && !empty($correo) && !empty($telefono) && !empty($nombreImagen)) {


                    $consulta = "INSERT INTO empleados (nombre, numero_documento, cargos_id, area_departamento_id, fecha_ingreso, salario_base, estado, correo_electronico, telefono,imagen,contrasena)
                     VALUES ('$nombre','$documento','$cargo','$areaDep','$fechaIngreso',$salario,1,'$correo','$telefono',null,'$hash');";

                    $mysql->ejecutarConsulta($consulta);

                    $mysql->desconectar();

                    echo "<h1>Empleado Registrado con exito </h1> <br> <br>";



                    header("refresh:3;url=../views/dashboard.php");



                } else {
                    echo "<h1>Algunos datos fueron enviados vacios </h1>";
                }
            } else {
                echo "<h1>ESTE CORREO O EL NUMERO DE DOCUMENTO YA ESTAN EN USO";
                header("refresh:3;url=../views/crearEmpleado.php");
            }


        } else {


            if ($mysql->verificarCorreo($correo) && $mysql->verificarDocumento($documento)) {
                if (!empty($nombre) && !empty($documento) && !empty($cargo) && !empty($areaDep) && !empty($fechaIngreso) && !empty($salario) && !empty($correo) && !empty($telefono) && !empty($nombreImagen)) {


                    $consulta = "INSERT INTO empleados (nombre, numero_documento, cargos_id, area_departamento_id, fecha_ingreso, salario_base, estado, correo_electronico, telefono,imagen,contrasena)
                 VALUES ('$nombre','$documento','$cargo','$areaDep','$fechaIngreso',$salario,1,'$correo','$telefono','$rutaCarpeta','$hash');";

                    $mysql->ejecutarConsulta($consulta);

                    $mysql->desconectar();

                    echo "<h1>Empleado Registrado con exito </h1> <br> <br>";

                    if (move_uploaded_file($temporalImagen, $rutaCarpeta)) {
                    } else {
                        echo "Imagen no subida a la carpeta";
                        exit();
                    }

                    header("refresh:3;url=../views/dashboard.php");



                } else {
                    echo "<h1>Algunos datos fueron enviados vacios </h1>";
                }
            } else {
                echo "<h1>ESTE CORREO O EL NUMERO DE DOCUMENTO YA ESTAN EN USO";
                header("refresh:3;url=../views/crearEmpleado.php");
            }
        }









    }




} else {
    echo "Sin hackear papi";
}


?>