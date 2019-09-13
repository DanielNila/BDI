<?php
include("../controlador/autobusesController.php");
//include("../modelo/autobuses.php");

$driver = new autobusesController();
$listar = new autobuses("","","","","","","","");
if(isset($_GET["opcion"])){
    $opc = $_GET["opcion"];
    if($opc == 3){
        $listar=$driver->Obtener($_GET["id"]);
    }
}
?>

<html>
    <style>
table, th, td {
  border: 1px solid black;
}
</style>
    <head>
        <title>Administrar Autobus</title>
    </head>	
    <body>
        <header>
            Bienvenido Administrar autobuses
        </header>

        <form method="GET" action="../controlador/test_autobuses.php">

            <input type="hidden" name="opcion" value="1">
            <label for="placas"> Placas </label><input type="text" name="placas" value="<?php echo $listar->__GET("placas"); ?>"><br><br>
            <label for="marca"> Marca </label><input type="text" name="marca" value="<?php echo $listar->__GET("marca"); ?>"><br><br>
            <label for="modelo"> Modelo</label><input type="text" name="modelo" value="<?php echo $listar->__GET("modelo"); ?>"><br><br>
            <label for="no_serie"> Nuero de serie </label><input type="text" name="no_serie" value="<?php echo $listar->__GET("no_serie"); ?>"><br><br>
            <label for="estado"> Estado </label><input type="text" name="estado" value="<?php echo $listar->__GET("estado"); ?>"><br><br>
            <label for="cupo"> Cupo</label><input type="text" name="cupo" value="<?php echo $listar->__GET("cupo"); ?>"><br><br>
            <label> Linea</label> 
            <select name="id_linea">
                <option value="<?php echo $listar->__GET("id_linea"); ?>"><?php echo $listar->__GET("id_linea"); ?></option>
                <option value="2">Linea 2</option>
                <option value="3">Linea 3 </option>
                <option value="4">Linea 4</option>
            </select> <br><br>

            <input type="submit" value="Agregar">


        </form>
        			
            <table >
                <tr>
                    <th>ID Autobus</th>
                    <th>Placas</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Numero de Serie</th>
                    <th>Estado</th>
                    <th>Cupo</th>
                    <th>Id Linea</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php 
                foreach ($driver->Listar() as $listar){
                
                ?>
                <tr>
                    <td><?php echo $listar->__GET("id_autobus"); ?></td>
                    <td><?php echo $listar->__GET("placas"); ?></td>
                    <td><?php echo $listar->__GET("marca"); ?></td>
                    <td><?php echo $listar->__GET("modelo"); ?></td>
                    <td><?php echo $listar->__GET("no_serie"); ?></td>
                    <td><?php echo $listar->__GET("estado"); ?></td>
                    <td><?php echo $listar->__GET("cupo"); ?></td>
                    <td><?php echo $listar->__GET("id_linea"); ?></td>
                    <td><a href="autobusesView.php?opcion=3id=<?php echo  $listar->__GET("id_autobus"); ?>">  Moficar</a></td>
                    <td><a href="../controlador/test_autobuses.php?opcion=4&id=<?php echo $listar->__GET("id_autobus"); ?>" >Eliminar</a></td>
                </tr>
                <?php 
                }
                ?>
            </table> 
        
        <footer>
            Adminsitrar Autobuses
        </footer>
    </body>
</html>










