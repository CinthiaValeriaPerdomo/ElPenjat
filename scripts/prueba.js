/*const MAX_ERRORES = 6;

let errores = 0;

const vocales = "AEIOU";

const consonantes = "BCDFGHJKLMNÑPQRSTVWXYZ";

let regla = false;



frase =  "Avui toca lluitar amb el flexbox";

let contador_consonantes = 0;

while (errores <= MAX_ERRORES){
    let letra = prompt("Letra = ");

    if (frase.includes(letra)){
        if (consonantes.includes(letra)){
            contador_consonantes += 1;
            if (contador_consonantes === 3){
                console.log("BIEN");
            }else if (!contador === 3 && vocales.includes(letra)){
                console.log("DEBE INGRESAR TRES CONSONANTES ANTES DE INGRESAR UNA VOLCAL");
            }
        } else if (vocales.includes(letra) && contador_consonantes === 3){
            console.log("BIEN");
        }

        
    } else {
        console.log("ERROR");
        errores =+ 1;
    }
}

*/

function cambarTexto() {
    document.getElementById("mensaje").innerHTML = "ESTE TEXTO NO ES EL ORIGINAL";
}
