<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'rootadmin', 'bienesraices_crud');

    if (!$db) {
        echo "Error en la conexión a la BD";
        exit;
    }

    return $db;
}