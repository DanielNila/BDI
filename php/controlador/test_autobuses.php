<?php
include("autobusesController.php");

$op=$_GET['opcion'];
$autobus =  new autobusesController();


switch ($op){
    case 1: //registrar
        $aut=new autobuses(0,$_GET['placas'],$_GET['marca'],$_GET['modelo'],$_GET['no_serie'],$_GET['estado'],$_GET['cupo'],$_GET['id_linea']);
        $autobus->Registrar($aut);
        break;
     case 2: //actualizar
          $aut=new autobuses($_GET['id_autobus'],$_GET['placas'],$_GET['marca'],$_GET['modelo'],$_GET['no_serie'],$_GET['estado'],$_GET['cupo'],$_GET['id_linea']);
        $autobus->Actualizar($aut);
        break;
     case 3: //obtener por id
         $r=$autobus->Obtener($_GET['id']);
         echo "Placas".$r->__GET('placas');
         echo "<br>";
         
        break;
     case 4: //eliminar
         $autobus->Eliminar($_GET['id']);
        break;
     case 5: //listar
         foreach ($autobus->Listar() as $r) {
             echo "Placas".$r->__GET('placas');
             echo "<br>";
             
         }
         
        break;
        
    default :
        echo "Opcion invalida";
        break;
}
?>