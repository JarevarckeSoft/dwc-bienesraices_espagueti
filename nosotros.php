<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/image/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi, molestiae alias ab officiis pariatur dolores nulla quasi iste vel est quae itaque maiores placeat, sed ut omnis praesentium nemo perferendis! nisi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad nostrum iste tempora beatae provident. Aperiam, quasi officia delectus porro iure dicta id et temporibus vitae quis doloremque reprehenderit.
                </p>

                <p>Minus et ab eveniet esse quidem, in fugiat asperiores odit corrupti explicabo dolor culpa quas aperiam accusantium nostrum id unde rerum eius. Nulla facilisi. Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Aut in assumenda, quo voluptas exercitationem repudiandae nam non quis accusamus provident a fugit minus
                    voluptate quas fuga quaerat fugiat tempore.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Aut in assumenda, quo voluptas exercitationem repudiandae nam non quis accusamus provident a fugit minus
                    voluptate quas fuga quaerat fugiat tempore.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Aut in assumenda, quo voluptas exercitationem repudiandae nam non quis accusamus provident a fugit minus
                    voluptate quas fuga quaerat fugiat tempore.</p>
            </div>
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>