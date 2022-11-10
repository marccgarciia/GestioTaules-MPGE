<?php


class Incidencias{
    private $id;
    private $mesa;
    private $incidencia;

    public function __construct($id,$mesa,$incidencia){
        $this->id=$id;
        $this->mesa=$mesa;
        $this->incidencia=$incidencia;
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
     * Get the value of mesa
     */ 
    public function getMesa()
    {
        return $this->mesa;
    }

    /**
     * Set the value of mesa
     *
     * @return  self
     */ 
    public function setMesa($mesa)
    {
        $this->mesa = $mesa;

        return $this;
    }

    /**
     * Get the value of incidencia
     */ 
    public function getIncidencia()
    {
        return $this->incidencia;
    }

    /**
     * Set the value of incidencia
     *
     * @return  self
     */ 
    public function setIncidencia($incidencia)
    {
        $this->incidencia = $incidencia;

        return $this;
    }


    public static function getAll(){
        require "../controller/conexion.php";

        // echo "$alu->nombre";
        try {
            $stmt=$pdo->prepare("SELECT * FROM tbl_incidencia;");
           /*  $stmt -> bindparam(  $stmt->bindParam(1,$id)); */
            $stmt->execute();
            return $stmt;
        }catch (Exception $e){
            echo "<script>alert('Error al mostrar datos de las mesas')</script>";
        }
    }
}