<?php
session_start();
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza tu contraseña</title>
</head>

<body>

    <h1>Verificar contraseña</h1>
    <?php if ($error): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form action="../controllers/actualizarContraseña.php" method="POST">
        <label>Ingresa tu nueva contraseña</label><br>
        <input type="text" name="nuevaContraseña">
        <br><br>
        <label>Confirma tu nueva contraseña</label><br>
        <input type="text" name="confirmarNuevaContraseña">
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
</body>

</html>