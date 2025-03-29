
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
            <option value="Tecnico">Tecnico</option>
            <option value="Administrador">Administrador</option>
            <option value="Operario">Operario</option>
            <option value="Asistente">Asistente</option>
        </select>
        <br><br>

        <fieldset>
            <legend>Area o departamento</legend>

            <input type="radio" value="Electricidad" name="areaEmp" required>
            <label for="">Electricidad</label>

            <input type="radio" value="Mantenimiento" name="areaEmp">
            <label for="">Mantenimiento</label>

            <input type="radio" value="Recursos Humanos" name="areaEmp">
            <label for="">Recursos Humanos</label>

            <input type="radio" value="Contabilidad" name="areaEmp">
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