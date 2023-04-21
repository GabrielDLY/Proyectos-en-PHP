<?php
class Conexion
{
    private $servidor="localhost";
    private $usuario="root";
    private $contraseña= "";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion= new PDO("mysql:host=$this->servidor;dbname=album",$this->usuario,$this->contraseña);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            "Falla de conexion".$err;
        }
    }

    public function ejecutar($sql){//Insertar/Delete/Actualizar

        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql)
    {
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}
?>