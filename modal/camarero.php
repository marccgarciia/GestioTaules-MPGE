<?php

class Camarero{

    private $id;
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;
    private $password;

    public function __construct($id,$nombre,$apellido,$dni,$telefono,$password){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
        $this->telefono=$telefono;
        $this->password=$password;
    
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public  function updateEstado (int $id, string $est){
        if ($est == 'ocupada' || $est =='libre' || $est=='mantenimiento' ){
            require "../controller/conexion.php";
            try {
                $stmt=$pdo->prepare("UPDATE `tbl_mesa` SET `Estado`=? WHERE Id_mesa=?");
                $stmt -> bindparam( 1,$est);
                $stmt -> bindparam( 2,$id );
                $stmt->execute();
                return $stmt;
            }catch (Exception $e){
                echo "<script>alert('Error al actualizar el estado de la mesa '.$id)</script>";
            }

        }else{
            echo "<script>alert('Estado introducido no válido')</script>";
            exit();
        }
        require "../controller/conexion.php";

    }
}