<?php


function conectar_DB($servidor, $usuario, $contrasena, $nombreBD) : mysqli 
{
    $db = new mysqli($servidor, $usuario, $contrasena, $nombreBD);

    if (!$db) {
        die('No se pudo conectar a la base de datos');
    }

    return $db;
}

?>