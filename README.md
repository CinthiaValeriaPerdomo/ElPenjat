# El Penjat

Juego web del ahorcado con temática de mansión encantada, hecho con PHP (servidor), JavaScript (cliente), HTML/CSS y Apache.

## Descripción

El jugador explora una mansión encantada y la bruja, dueña del lugar, lo acorrala y lo condena a vivir con sus espíritus para siempre. Su única salida es adivinar la frase oculta antes de agotar sus 6 errores. Si gana, escapa de la mansión. Si pierde, se convierte en uno de sus espíritus.

Al terminar la partida, el jugador puede registrar su récord y ver el ranking.

## Instalación

Requisitos: servidor Apache con PHP (por ejemplo XAMPP, MAMP o una pila LAMP).

1. Clonar el repositorio:

   git clone https://github.com/CinthiaValeriaPerdomo/ElPenjat

2. Copiar el proyecto a la carpeta pública de Apache:
   - XAMPP / MAMP: `htdocs/elpenjat`
   - Linux (LAMP): `/var/www/html/elpenjat`

3. Dar permiso de escritura a `records.txt` (Apache debe poder escribir en él). En Linux:

   sudo chown www-data:www-data records.txt
   sudo chmod 664 records.txt

## Puesta en marcha

Reiniciar Apache si es necesario:

   sudo systemctl restart apache2

Abrir el juego en el navegador: `http://localhost/elpenjat/`

## Inicio del juego

1. En la página de inicio, escribir el nombre (obligatorio).
2. Elegir la dificultad: Fácil, Normal o Difícil.
3. Pulsar **JUGAR**.
4. Pulsar las letras del teclado para adivinar la frase. Se pierde con 6 errores.