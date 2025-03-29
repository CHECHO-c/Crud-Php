<?php
require_once '../models/MySQL.php';

   $mysql = new MySQL();
   $mysql->conectar();

   $resultado = $mysql->ejecutarConsulta("SELECT * FROM empleados");

   $mysql->desconectar();    



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
<?php if(mysqli_num_rows($resultado)>0): ?>
    <h1>Registro de empleados</h1>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombre Completo</th>
            <th>Numero de documento</th>
            <th>Cargo</th>
            <th>Area o departamento</th>
            <th>Fecha Ingreso</th>
            <th>Salario Base</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <!-- Aca vamos agregar los datos hacinedoles un mysql fetch de la consulta -->
         <?php  while ($datoEmpleado = mysqli_fetch_assoc($resultado)):    ?>
            <tr>
                <td><?php echo $datoEmpleado['id']; ?></td>
                <td><?php echo $datoEmpleado['nombre']; ?></td>
                <td><?php echo $datoEmpleado['numero_documento']; ?></td>
                <td><?php echo $datoEmpleado['cargo']; ?></td>
                <td><?php echo $datoEmpleado['area_departamento']; ?></td>
                <td><?php echo $datoEmpleado['fecha_ingreso']; ?></td>
                <td><?php echo $datoEmpleado['salario_base']; ?></td>
                <td><?php echo $datoEmpleado['correo_electronico']; ?></td>
                <td><?php echo $datoEmpleado['telefono']; ?></td>
                <td><?php echo $datoEmpleado['estado']==0? "Inactivo" : "Activo"; ?></td>
                <td>
                <a href="../views/editarEmpleado.php?id=<?php echo $datoEmpleado['id']; ?>" onclick="return confirm('Esta esguro que desea \n editar a <?php echo $datoEmpleado['nombre']; ?>? ');" ><button>Editar Empleado</button></a>
                <a href="../controllers/eliminarEmpleado.php?id=<?php echo $datoEmpleado['id']; ?>" onclick="return confirm('Esta esguro que desea \n eliminar a <?php echo $datoEmpleado['nombre']; ?>? ');" ><button>Eliminar Empleado</button></a>
                </td>
            </tr>
            <?php endwhile ?>
            
    </table>
    <a href="crearEmpleado.php" ><button>Crear Empleado</button></a>

    
    
</body>
</html>
<?php else:?>
    <h1>No Existen empleados.</h1>
<?php endif ?>