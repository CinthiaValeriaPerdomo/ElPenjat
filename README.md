# El Penjat

Joc web del penjat amb temàtica de mansió encantada, fet amb PHP (servidor), JavaScript (client), HTML/CSS i Apache.

## Descripció

El jugador explora una mansió encantada i la bruixa, propietària del lloc, l'acorrala i vol condemnar-lo a viure amb els seus esperits per sempre. La seva única sortida és endevinar la frase oculta abans d'esgotar els seus 6 errors. Si gana, escapa de la mansió. Si perd, es converteix en un dels seus esperits.

En acabar la partida, el jugador pot registrar el seu rècord i veure el rànquing.

## Instal·lació

Requisits: servidor Apache amb PHP (per exemple XAMPP, MAMP o una pila LAMP).

1. Clonar el repositori:

git clone https://github.com/CinthiaValeriaPerdomo/ElPenjat

2. Copiar el projecte a la carpeta pública d'Apache:
- XAMPP / MAMP: `htdocs/*ElPenjat`
- Linux (LAMP): `/var/www/html/*ElPenjat`

3. Donar permís d'escriptura a `records.txt` (Apache ha de poder escriure en ell). En Linux:

sudo chown www-data:www-data records.txt
sudo chmod 664 records.txt

## Posada en marxa

Reiniciar Apache si és necessari:

sudo systemctl restart apache2

Obrir el joc en el navegador: `http://localhost/index.php/`

## Inici del joc

1. En la pàgina d'inici, escriure el nom (obligatori).
2. Triar la dificultat: Fàcil, Normal o Difícil.
3. Prémer *JUGAR**.
4. Prémer les lletres del teclat per a endevinar la frase. Es perd amb 6 errors.
