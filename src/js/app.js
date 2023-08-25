document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkMode();
});

function darkMode() {
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  console.log(prefiereDarkMode.matches);

  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  prefiereDarkMode.addEventListener("change", function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  //Boton DarkMode
  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");

    //Para que el modo elegido se quede guardado en local-storage
    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("modo-oscuro", "true");
    } else {
      localStorage.setItem("modo-oscuro", "false");
    }
  });
  //Obtenemos el modo del color actual
  if (localStorage.getItem("modo-oscuro") === "true") {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }  
}

/** 
 *     function darkMode() {
        // Comprueba si estaba habilidado dark mode
        let darkLocal = window.localStorage.getItem('dark');
        if(darkLocal === 'true') {
            document.body.classList.add('dark-mode');
        }
        // Añadimos el evento de click al botón de dark mode
        document.querySelector('.dark-mode-boton').addEventListener('click', darkChange);
    }
     
    function darkChange() {
        let darkLocal = window.localStorage.getItem('dark');
     
        if(darkLocal === null || darkLocal === 'false') {
            // No está inicializado darkLocal o es falso
            window.localStorage.setItem('dark', true);
            document.body.classList.add('dark-mode');
        } else {
            // Está activado darkMode, por lo que se desactiva
            window.localStorage.setItem('dark', false);
            document.body.classList.remove('dark-mode');
        }
    }
 * **/

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);
}

function navegacionResponsive() {
  const navegacion = document.querySelector('.navegacion');

  /*if (navegacion.classList.contains('mostrar')) {
    navegacion.classList.remove('mostrar');
  } else {
    navegacion.classList.add('mostrar');
  }*/ //es lo mismo que la siguiente línea

  navegacion.classList.toggle('mostrar');

}
