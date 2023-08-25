<?php

require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/" . $nombre .".php";
}

function estaAutenticado() : bool {
    session_start();

    if (isset($_SESSION['login'])) {
        return true;
    }
    
    return false;
    // Si existe un return en el if no es necesario colocar un else {}, ya que si se cumple ya no se ejecuta el resto del código, de lo contrario no entra al if {} y retorna el valor false.
    
}