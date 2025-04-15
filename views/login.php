<?php
session_start();
$error = $_SESSION['error'] ?? null;
$old = $_SESSION['old'] ?? [];

unset($_SESSION['error'], $_SESSION['old']);

?>
<?php if ($error): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<h1>Iniciar Sesion</h1>
<form action="../controllers/login.php" method="POST">
    <label for="">Ingresa tu numero de documento</label>
    <br>
    <input type="number" required name="nroDocumentoEmpLogin" value=<?= htmlspecialchars($old['documento']?? '');?>>    <br>
    <br>

    <label for="">Ingresa tu contraseña</label>
    <br>
    <input type="password" required name="contraseñaEmpLogin" value=<?= htmlspecialchars($old['contraseña']?? '');?>>
    <br><br>

    <button type="submit">Iniciar Sesion</button>
</form>

