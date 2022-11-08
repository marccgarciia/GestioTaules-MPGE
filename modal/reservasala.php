<?php


class ReservaSala{
    private $id;
    private $camarero;
    private $sala;
    private $dia;
    private $hora;

    public function __construct($id,$camarero,$sala,$dia,$hora){
        $this->id=$id;
        $this->camarero=$camarero;
        $this->sala=$sala;
        $this->dia=$dia;
        $this->hora=$hora;    
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

        // public function subirRegistroSala(){
        
    // }
}