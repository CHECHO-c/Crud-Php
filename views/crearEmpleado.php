
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>

<body>
    <form action="../controllers/crearEmpleado.php" method="POST">
        <label for="">Nombre completo</label>
        <input type="text" name="nombreEmp" required>
        <br><br>

        <label for="">Numero de documento</label required>
        <input type="number" name="nroDocumentoEmp">
        <br><br>

        <label for="">Cargo</label>
        <select name="cargoEmp" required>
            <option value="1">Tecnico</option>
            <option value="2">Administrador</option>
            <option value="3">Operario</option>
            <option value="4">Asistente</option>
        </select>
        <br><br>

        <fieldset>
            <legend>Area o departamento</legend>

            <input type="radio" value="1" name="areaEmp" required>
            <label for="">Electricidad</label>

            <input type="radio" value="2" name="areaEmp">
            <label for="">Mantenimiento</label>

            <input type="radio" value="3" name="areaEmp">
            <label for="">Recursos Humanos</label>

            <input type="radio" value="4" name="areaEmp">
            <label for="">Contabilidad</label>




        </fieldset>
        <br>

        <label for="">Fecha de ingreso</label>
        <input type="date" name="fechaIngresoEmp" required>
        <br>
        <br>

        <label for="">Salario Base</label>
        <input type="number" name="salarioBaseEmp" required>

        <br>
        <br>

        <label for="">Correo</label>
        <input type="text" name="correoEmp" required>
        <br>
        <br>
        <label for="">Telefono</label>
        <input type="number" name="telefonoEmp" required>
        <br>
        <br>
        <button type="submit">Agregar Empledo</button>


    </form>
</body>

</html>