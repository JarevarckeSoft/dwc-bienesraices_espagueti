<?php
    require 'includes/funciones.php';
    $auth = estaAutenticado();
    
    if ($auth) {
        header('Location: /admin');
    }
        

    // Importar la conexión a la BD
    require 'includes/config/database.php';
    $db = conectarDB();

    // Autenticar el usuario
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email) {
            $errores[] = "El e-mail es obligatorio o no es válido";
        }

        if (!$password) {
            $errores[] = "El password es obligatorio";
        }

        if (empty($errores)) {
            // Revisar si el usuario existe
            $query = " SELECT * FROM usuarios WHERE email = '{$email}' ";
            $resultado = mysqli_query($db, $query);

            if ($resultado -> num_rows) {
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if ($auth) {
                    // El usuario está autenticado
                    session_start();

                    // Llenar el arreglo de la sesión, se le puede colocar cualquier cosa
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    // Redireccionar al admin si se loguea
                    header('Location: /admin');
                } else {
                    $errores[] = "El password es incorrecto";
                }

            } else {
                $errores[] = "El Usuario no existe";
            }
        }
    }
    
    // Incluye el header
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>

        <form action="" class="formulario" method="POST">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email" name="email">

                <label for="password">Password</label>
                <input type="password" placeholder="Tu Password" id="password" name="password">
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>


    </main>

<?php
    incluirTemplate('footer');
?>