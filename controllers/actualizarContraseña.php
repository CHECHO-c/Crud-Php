<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (
        isset($_POST['nuevaContraseña'], $_POST['confirmarNuevaContraseña']) &&
        !empty($_POST['confirmarNuevaContraseña']) && !empty($_POST['nuevaContraseña'])
    ) {
        session_start();
        require_once '../models/MySQL.php';
        $nuevaContraseña = $_POST['nuevaContraseña'];
        $confirmacionContraseña = $_POST['confirmarNuevaContraseña'];

        if ($nuevaContraseña == $confirmacionContraseña) {
            $mysql = new MySQL();
            $mysql->conectar();
            $hash = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
            $id = $_SESSION['id'];
            $consulta = "UPDATE empleados set contrasena='$hash' where id=$id;";
            $resultado =  $mysql->ejecutarConsulta($consulta);

            if ($resultado) {

                header("Location:../views/dashboard.php");
            } else {
                $_SESSION['error'] = "Hubo un error en la consulta";
                header("Location:../views/actualizarContraseña.php");
            }
        } else {

            $_SESSION['error'] = "Las contraseñas no coinciden";
            header("Location:../views/actualizarContraseña.php");
        }
    }
} else {
    header("Location:../controllers/logout.php");
}
