<?php


class autobuses{
    
private $id_autobus;
private $placas;
private $marca;
private $modelo;
private $no_serie;
private $estado;
private $cupo;
private $id_linea;





function __construct($id_autobus, $placas, $marca, $modelo, $no_serie, $estado, $cupo, $id_linea) {
    $this->id_autobus = $id_autobus;
    $this->placas = $placas;
    $this->marca = $marca;
    $this->modelo = $modelo;
    $this->no_serie = $no_serie;
    $this->estado = $estado;
    $this->cupo = $cupo;
    $this->id_linea = $id_linea;
    
    
    
}


function __GET($key) {
    return $this->$key;
 }
 
 function __SET($key, $value) {
     return $this->$key= $value;
     
 }







    
    
    
    
    
}






?>
