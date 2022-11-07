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
}