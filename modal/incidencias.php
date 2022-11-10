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
            $stmt=$pdo->prepare("SELECT * FROM `tbl_incidencia` i INNER JOIN tbl_sala s ON i.sala_inc=s.Id_sala;");
           /*  $stmt -> bindparam(  $stmt->bindParam(1,$id)); */
            $stmt->execute();
            return $stmt;
        }catch (Exception $e){
            echo "<script>alert('Error al mostrar datos de las mesas')</script>";
        }
    }

    public static function getDeleteIncidencia($idincidencia,$idmesa){
        require "../controller/conexion.php";
        try {
            $est='libre';
            $pdo -> beginTransaction();
            $sql="UPDATE `tbl_mesa` SET `Estado`=? WHERE Id_mesa=?";
            $stmt=$pdo->prepare($sql);
            $stmt -> bindparam( 1,$est);
            $stmt -> bindparam( 2,$idmesa );
            $stmt->execute();

            $sql2="DELETE FROM tbl_incidencia WHERE `tbl_incidencia`.`Id_inc` = ?";
            $stmt= $pdo->prepare($sql2);
            $stmt->bindParam(1,$idincidencia);
            $stmt->execute();


            $pdo -> commit();
            echo "<script>window.location.href='../view/incidencia.php'</script>";

            return $stmt;

        }catch (Exception $e){
            $pdo -> rollback();
            echo $e->getMessage();
            echo "<script>alert('Error al actualizar el estado de la mesa '.$id)</script>";
        }
    }
}