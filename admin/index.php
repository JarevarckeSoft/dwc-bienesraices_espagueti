<?php
    // Verifica si el usuario está autenticado
    require '../includes/funciones.php';
    $auth = estaAutenticado();
    
    if (!$auth) {
        header('Location: /');
    }

    // Importar la conexión
    require '../includes/config/database.php';
    $db = conectarDB();

    // Escribir el Query
    $query = " SELECT * FROM propiedades ";

    // Consultar la BD
    $resultado = mysqli_query($db, $query);

    // Muestra mensaje condicional (equivale a comprobar con isset() )
    $respuesta = $_GET['respuesta'] ?? null;

    // Comprueba la solicitud del método de respuesta del botón eliminar (POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        // Obtiene el nombre de la imagen de la propiedad guardado en BD
        $query = " SELECT imagen FROM propiedades WHERE id = {$id} ";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        // Elimina el archivo de la imagen guardada de la propiedad de la carpeta
        unlink('../imagenes/' . $propiedad['imagen']);

        // Elimina el registro de la propiedad indicada
        if ($id) {
            $query = "DELETE FROM propiedades WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: /admin?respuesta=3');
            }
        }
    }

    // Incluye un template
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raíces</h1>
        <?php if (intval($respuesta) === 1) : ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif (intval($respuesta) === 2) : ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif (intval($respuesta) === 3) : ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados -->
                <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $propiedad['id']; ?></td>
                        <td><?php echo $propiedad['titulo']; ?></td>
                        <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad" class="imagen-tabla"></td>
                        <td>$ <?php echo $propiedad['precio']; ?></td>
                        <td>
                            <a href="admin/propiedades/actualizar.php?inmueble=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php
    // Cerrar la conexión
    mysqli_close($db);

    // Mostrar template del footer
    incluirTemplate('footer');
?>