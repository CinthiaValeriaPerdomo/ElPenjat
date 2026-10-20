El Penjat

Juego web del ahorcado con temática de mansión encantada (ambientación de
octubre). El jugador debe adivinar una frase letra a letra antes de agotar sus 6 errores. El
proyecto está desarrollado con PHP (lado servidor), JavaScript (lado cliente), HTML/CSS y Apache.

Descripción

El Penjat es un juego de adivinar frases. La historia: el jugador explora una mansión encantada y la bruja,
dueña del lugar, lo acorrala y lo condena a vivir con sus espíritus para siempre. Su única salida es usar su 
habilidad léxica para superar el juego de la bruja.

Cómo se juega
1- Inicio (index.php): el jugador debe introducir su nombre (obligatorio) y elegir una dificultad (Fàcil, Normal o
Difícil; por defecto, Normal). Si el nombre está vacío, se muestra un error y no se puede continuar.
2- Partida (play.php): al pulsar Jugar se redirige a esta página, donde está toda la mecánica del juego.
Según la dificultad elegida, se selecciona una frase aleatoria.
La frase se muestra oculta: aparece un guion (-) por cada letra.
El jugador introduce letras con el teclado virtual integrado en la página.
Acierto: el guion se sustituye por la letra en la posición correcta y la tecla se marca en verde.
Error: la tecla se marca en rojo y se actualiza la imagen del ahorcado.
3- El ahorcado: la partida empieza solo con la horca vacía. Cada error añade una parte del cuerpo, cada una con su propia imagen, hasta un máximo de 6 errores: cabeza, tronco, brazo, otro brazo, pierna y otra pierna.
4- Fin de partida (gameover.php):
Victoria: se felicita al jugador y se le ofrece registrar su récord o volver al inicio.
Derrota: se informa de que ha perdido y se ofrece ver el ranking o volver al inicio.
5- Récord y ranking (ranking.php): al acabar la partida, el jugador puede registrar su récord (es opcional). Si acepta, se muestra el ranking con su puntuación resaltada.


Características
· Dificultades por carpetas: las frases están organizadas en archivos dentro de carpetas fácil, normal y difícil. No hay cálculos: simplemente se lee un archivo de frases según el nivel.
· Teclado virtual con retroalimentación visual (verde/rojo).
· Efectos de sonido en las acciones principales y al navegar entre páginas o pulsar determinados botones.
· Temática de mansión encantada en toda la interfaz.
· Páginas de error personalizadas en Apache: se sustituyen las páginas por defecto por versiones propias para los errores 403 y 404.
· Aviso <noscript>: si el navegador tiene JavaScript desactivado, se muestra una página/mensaje personalizado.


Récords y ranking
· Al terminar la partida (game over), se ofrece al usuario registrar su récord. Puede decidir no hacerlo.
· Si acepta, el récord se guarda en un archivo con nombre, puntuación y fecha.
· El archivo se llama records.txt y se encuentra en la raíz del proyecto.
· Se muestra el ranking y se resalta la puntuación que el usuario acaba de conseguir.
· El ranking se muestra en formato zebra (un color distinto en cada línea alterna).
· El ranking está ordenado por puntuación descendente: las puntuaciones más altas aparecen arriba.


Instalación

Requisitos
· Servidor Apache con PHP (por ejemplo, XAMPP, MAMP, WAMP o una pila LAMP).
· Módulo mod_rewrite activo y AllowOverride All en el directorio del proyecto, si se usa .htaccess para las páginas de error.
· Un navegador moderno con JavaScript activado.


Pasos
1- Clona o descarga el repositorio:

   git clone https://github.com/CinthiaValeriaPerdomo/ElPenjat
2- Copia el proyecto a la carpeta pública de Apache:
  · XAMPP / MAMP: htdocs/elpenjat
  · Linux (LAMP): /var/www/html/elpenjat
3- Comprueba los permisos de escritura sobre records.txt (Apache debe poder escribir en él). En Linux:

   sudo chown www-data:www-data records.txt
   sudo chmod 664 records.txt

Si el archivo no existe, la carpeta raíz debe tener permiso de escritura para que se pueda crear.

1- Verifica la configuración de Apache para las páginas de error personalizadas (403 y 404) y reinicia el servidor:

   sudo systemctl restart apache2
2- Abre el juego en el navegador:
     http://localhost/elpenjat/

     
Solución de problemas
· Las páginas de error por defecto siguen apareciendo: revisa que AllowOverride esté en All y que las rutas de ErrorDocument sean correctas.
· No se guardan los récords: revisa los permisos de records.txt y de la carpeta raíz.
· El juego no responde: comprueba que JavaScript esté activado en el navegador.



Puntuación

Pendiente de definir y documentar.

La puntuación se calculará en función de dos factores:

Rapidez (tiempo empleado en resolver la frase).
Número de errores cometidos.

Por decidir: fórmula exacta, peso de cada factor, si la dificultad influye en el resultado y cuál es la puntuación máxima y mínima.

Contenido
