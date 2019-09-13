<?php
include("../modelo/autobuses.php");

class autobusesController {

    private $pdo;

    function __construct() {

        try {

            $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=lineaautobuses', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die($ex->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM autobuses");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ)as $r) {
                $aut = new autobuses(0,0,0,0,0,0,0,0);
                $aut->__SET('id_autobus', $r->id_autobus);
                $aut->__SET('placas', $r->placas);
                $aut->__SET('marca', $r->marca);
                $aut->__SET('modelo', $r->modelo);
                $aut->__SET('no_serie', $r->no_serie);
                $aut->__SET('estado', $r->estado);
                $aut->__SET('cupo', $r->cupo);
                $aut->__SET('id_linea', $r->id_linea);


                $result[] = $aut;
            }
            return $result;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function Obtener($id) {

        try {
            $stm = $this->pdo->prepare("SELECT * FROM autobuses where id_autobus = ?");
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $aut = new autobuses(0,0,0,0,0,0,0,0);

            $aut->__SET('id_autobus', $r->id_autobus);
            $aut->__SET('placas', $r->placas);
            $aut->__SET('marca', $r->marca);
            $aut->__SET('modelo', $r->modelo);
            $aut->__SET('no_serie', $r->no_serie);
            $aut->__SET('estado', $r->estado);
            $aut->__SET('cupo', $r->cupo);
            $aut->__SET('id_linea', $r->id_linea);

            return $aut;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function Actualizar(autobuses $data) {
        try {
          //  print_r($data);
            $sql = "UPDATE autobuses SET placas=?,marca=?,modelo=?,no_serie=?,estado=?,cupo=?,id_linea=? WHERE id_autobus = ?";
            echo "id ".$data->__GET('id_autobus');
            $this->pdo->prepare($sql)->execute(
                    array(
                        
                        $data->__GET('placas'),
                        $data->__GET('marca'),
                        $data->__GET('modelo'),
                        $data->__GET('no_serie'),
                        $data->__GET('estado'),
                        $data->__GET('cupo'),
                        $data->__GET('id_linea'),
                        $data->__GET('id_autobus')
                        
                    )
                    );
                    
                    
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function Registrar(autobuses $data) {
        
        try{
            $sql = "INSERT INTO autobuses(placas,marca,modelo,no_serie,estado,cupo,id_linea)VALUES(?,?,?,?,?,?,?)";
            $this->pdo->prepare($sql)->execute(
                    array(
                        $data->__GET('placas'),
                        $data->__GET('marca'),
                        $data->__GET('modelo'),
                        $data->__GET('no_serie'),
                        $data->__GET('estado'),
                        $data->__GET('cupo'),
                        $data->__GET('id_linea')
                    
                    )
                    );
            echo "Agregado Correctamente";
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
            
        
    }

    public function Eliminar($id) {

        try {
            $stm = $this->pdo->prepare("DELETE FROM autobuses WHERE id_autobus = ?");
            $stm->execute(array($id));
            echo "Eliminado ";
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

}
?>


