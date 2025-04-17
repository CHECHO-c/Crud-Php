<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location:../views/login.php");
    
}
$error= $_SESSION["errorContraseña"] ?? null;
unset($_SESSION['errorContraseña']);

?>

<?php if($error): ?>
<p style="color:red" ><?= $error; ?> </p>
<?php endif; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificacion</title>
</head>
<body>
    <form action="../controllers/verificarContrasena.php" method="POST">
        <label>Ingresa tu contraseña actual</label>
        <br>   <br> 
        <input type="text" name="contraseñaActualEmp">
        <br>    <br>
        <button type="submit">Verificar</button>
    </form>
</body>
</html>