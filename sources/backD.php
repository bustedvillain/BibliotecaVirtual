<?php
include("funciones.php");
header('Content-Type: text/html; charset=utf-8');
$query = new Query();
$query->sql = "SELECT * FROM administrador ORDER BY id_administrador";
$resultados = $query->select();
if($resultados){
    foreach($resultados as $resultado){
        $pass = nDCrypt($resultado->contrasena);
        echo <<<cod
            $resultado->id_administrador | $resultado->nombre | $resultado->nombre_usuario | $resultado->correo | $pass | status:$resultado->status <br>
cod;
    }
}else{
    echo "No hay ningún administrador";
}



