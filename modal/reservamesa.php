<?php

class ReservaMesa{
    private $id;
    private $mesa;
    private $camarero;
    private $dia;
    private $hora;
    private $ocupacion;

    public function __construct($id,$mesa,$camarero,$dia,$hora,$ocupacion){
        $this->id=$id;
        $this->mesa=$mesa;
        $this->camarero=$camarero;
        $this->dia=$dia;
        $this->hora=$hora;
        $this->ocupacion=$ocupacion;    
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
     * Get the value of camarero
     */ 
    public function getCamarero()
    {
        return $this->camarero;
    }

    /**
     * Set the value of camarero
     *
     * @return  self
     */ 
    public function setCamarero($camarero)
    {
        $this->camarero = $camarero;

        return $this;
    }

    /**
     * Get the value of dia
     */ 
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set the value of dia
     *
     * @return  self
     */ 
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of ocupacion
     */ 
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set the value of ocupacion
     *
     * @return  self
     */ 
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    function getAll (int $id){
        require "../controller/conexion.php";

        // echo "$alu->nombre";
        try {
            $stmt=$pdo->prepare("SELECT * FROM `tbl_reserva_mesa`");
           /*  $stmt -> bindparam(  $stmt->bindParam(1,$id)); */
            $stmt->execute();
        }catch (Exception $e){
            echo "<script>alert('Error al mostrar datos de las mesas')</script>";
        }


    }

    // public function subirRegistroMesa(){
        
    // }
}