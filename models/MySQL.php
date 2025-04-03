<?php

//Clase para gestionar la conexio a la base de datos

class MySQL{

    private $ipServidor ="localhost";
    private $usuarioBase ="root";
    private $contrasena = "";

    private $nombreBaseDatos = "bd_servi_plus";

    private $conexion;


    //Esta funcion conecta a la base de datos
    public function conectar(){
        $this->conexion = mysqli_connect($this->ipServidor,$this->usuarioBase,$this->contrasena,$this->nombreBaseDatos);

        //Validad errores en la conexion
        if(!$this->conexion){
            die("Error al conectar a la base de adtos" . mysqli_connect_error());
        }


        mysqli_set_charset( $this->conexion,"utf8");
    }


    //Esta funcion desconecta de la base de datos para evitar consumo de recursos y ataques como inyeccion SQL
    public function desconectar(){
        if($this->conexion){
            mysqli_close($this->conexion);
        }
    }

    //Esta funcion ejecuta la consulta elegida por el desarrollador
    public function ejecutarConsulta($consulta){
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        mysqli_query($this->conexion,"SET CHARACTER SET 'utf8'");

        $resultado = mysqli_query($this->conexion, $consulta);


        //Valida errores en la consulta
        if(!$resultado){
            echo "Error en la consulta: " . mysqli_error($this->conexion);
        }


        return $resultado;
    }

    public function verificarCorreo($correo){
        $mysql = new MySQL();
        $mysql->conectar();
        $consulta = "SELECT * FROM empleados where correo_electronico='$correo'";
        $resultado = $mysql->ejecutarConsulta($consulta);

        if($resultado->num_rows>0){
            return false;
        }
        else{
            return true;
        }
    }

}

?>