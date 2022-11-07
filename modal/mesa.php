<?php

class Mesa{
    private $id;
    private $capacidad;
    private $estado;
    private $sala;

    public function __construct($id,$capacidad,$estado,$sala){
        $this->id=$id;
        $this->capacidad=$capacidad;
        $this->esatdo=$estado;
        $this->sala=$sala;

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
     * Get the value of capacidad
     */ 
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set the value of capacidad
     *
     * @return  self
     */ 
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of sala
     */ 
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * Set the value of sala
     *
     * @return  self
     */ 
    public function setSala($sala)
    {
        $this->sala = $sala;

        return $this;
    }

    // public function cambiarEstadoMesa(){

    // }

    public  function getAllBySalaId (int $id){
        require "../controller/conexion.php";

        // echo "$alu->nombre";
        try {
            $stmt=$pdo->prepare("SELECT  * FROM tbl_mesa where Sala=?");
            $stmt -> bindparam( 1,$id);
            $stmt->execute();
            return $stmt;
        }catch (Exception $e){
            echo "<script>alert('Error al mostrar datos de las mesas de la sala '.$id)</script>";
        }


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