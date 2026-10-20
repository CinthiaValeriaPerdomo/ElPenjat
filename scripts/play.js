const maxErrores = 6;
let errors=0;
let acertadas = [];
const pFrase = document.getElementById("frase");
const pImg =document.getElementById("penjat");
const teclas =document.getElementsByClassName("tecla");

<<<<<<< HEAD
=======
const conAcento = "ÀÁÈÉÍÏÒÓÚÜÇ";
const sinAcento = "AAEEIIOOUUC";

const inicio = Date.now();

function calcularPunctuacion(guanyat){
    if (!guanyat) {
        return 0; 
    }

    let letras =0;
    for (let i = 0; i < fraseBase.length; i++) {
        if (fraseBase[i] >= "A" && fraseBase[i] <= "Z") {
            letras++;
        }
    }

    let ahora = Date.now();
    let segundos = Math.round((ahora - inicio)/1000);
    let puntos = (letras*10) - (errors*15) -segundos;

    if (puntos < 0) {
            return 0;
    }

    return puntos;
}

function lletraBase(lletra) {
    let pos = conAcento.indexOf(lletra);
    if (pos >= 0) {
        return sinAcento[pos];
    }
    return lletra;
}

let fraseBase = "";
for (let i = 0; i < frase.length; i++) {
    fraseBase += lletraBase(frase[i]);
}


>>>>>>> Ibtissam
function mostrarFrase() {
    let text = "";
    for (let i = 0; i < frase.length; i++) {
        const lletra = frase[i];
        if (lletra < "A" || lletra > "Z") {
            text += lletra;
        } else if (acertadas.includes(lletra)) {
            text += lletra;
        } else {
            text += "_";
        }
        text += " ";
    }
    pFrase.textContent = text;
}

function jugar(tecla) {
    const lletra = tecla.textContent;
    tecla.disabled = true;

    if (frase.includes(lletra)) {
        tecla.classList.add("correcta");
        acertadas.push(lletra);
        mostrarFrase();
    } else {
        tecla.classList.add("incorrecta");
        errors++;
        imatge.src = "assets/images/penjat" + errors + ".png";
    }
    comprovarFinal();
}

function comprovarFinal() {
    if (errors == maxErrores) {
        acabar(false);
    } else if (!pFrase.textContent.includes("_")) {
        acabar(true);
    }
}

function acabar(guanyat) {
    document.getElementById("guanyat").value = guanyat ? "1" : "0";
    document.getElementById("puntuacio").value =calcularPunctuacion(guanyat);
    setTimeout(function () {
        document.getElementById("form-fi").submit();
    }, 1000);
}

for (let i = 0; i < teclas.length; i++) {
    teclas[i].addEventListener("click", function () {
        jugar(teclas[i]);
    });
}

mostrarFrase();