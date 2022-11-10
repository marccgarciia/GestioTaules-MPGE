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

    public static function getAllBySalaId (int $id){
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

public static function updateEstado (int $id, string $est, int $ocu){

        if ($est == "ocupada" ){
            require "../controller/conexion.php";

            $id_cam=1;
            $dia=date("Y-m-d");
            $hora='00:00';


            try {
                $pdo -> beginTransaction();
                $sql="UPDATE `tbl_mesa` SET `Estado`=? WHERE Id_mesa=?";
                $stmt=$pdo->prepare($sql);
                $stmt -> bindparam( 1,$est);
                $stmt -> bindparam( 2,$id );
                $stmt->execute();

                $sql2="INSERT INTO `tbl_reserva_mesa`(`Id_reserva`, `Id_mesa`, `Id_cam`, `Dia_rm`, `Hora_ini_rm`, `Ocupacion_rm`, `Hora_final_rm`) VALUES (null,?,?,?,current_time,?,?)";
                $stmt= $pdo->prepare($sql2);
                $stmt->bindParam(1,$id);
                $stmt->bindParam(2,$id_cam);
                $stmt->bindParam(3,$dia);
                $stmt->bindParam(4,$ocu);
                $stmt->bindParam(5,$hora);
                $stmt->execute();


                $pdo -> commit();


                return $stmt;

            }catch (Exception $e){
                $pdo -> rollback();
                echo $e->getMessage();
                echo "<script>alert('Error al actualizar el estado de la mesa '.$id)</script>";
            }

        }else if ($est =="libre" ){
            try {
                require "../controller/conexion.php";
                $pdo -> beginTransaction();
                $sql="UPDATE `tbl_mesa` SET `Estado`=? WHERE Id_mesa=?";
                $stmt=$pdo->prepare($sql);
                $stmt -> bindparam( 1,$est);
                $stmt -> bindparam( 2,$id );
                $stmt->execute();

                $sql="UPDATE `tbl_reserva_mesa` SET `Hora_final_rm`=CURRENT_TIME WHERE Id_mesa=? and Hora_final_rm='00:00'    ";
                $stmt=$pdo->prepare($sql);
                $stmt -> bindparam( 1,$id);
                $stmt->execute();
                $pdo -> commit();

            }catch (Exception $e){
                $pdo -> rollback();
                echo $e->getMessage();
                echo "<script>alert('Error al actualizar el estado de la mesa '.$id)</script>";
            }



        }else if ($est=="mantenimiento" ){

        }else{
            echo "<script>alert('Estado introducido no válido')</script>";
            exit();
        }


}
}