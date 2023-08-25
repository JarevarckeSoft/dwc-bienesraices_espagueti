<?php

    $inmueble = $_GET['inmueble'];
    $inmueble = filter_var($inmueble, FILTER_VALIDATE_INT);

    if (!$inmueble) {
        header('Location: /');
    }

    // Importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consultar
    $query = " SELECT * FROM propiedades WHERE id = {$inmueble} ";

    // Obtener resultado
    $resultado = mysqli_query($db, $query);

    if (!$resultado -> num_rows) {
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
    
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>
        
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo number_format($propiedad['precio'], 2, '.',','); ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php
    mysqli_close($db);
    incluirTemplate('footer');
?>