const maxErrores = 6;
let errors=0;
let acertadas = [];
let quedan = 1;
const pFrase = document.getElementById("frase");
const pImg =document.getElementById("penjat");
const teclas =document.getElementsByClassName("tecla");

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


function mostrarFrase() {
    let html = "";
    quedan = 0;
    for (let i = 0; i < frase.length; i++) {
        const lletra = frase[i];
        const base = lletraBase(lletra);
        if (lletra == " ") {
            html += '<span class="espacio"></span>';
        } else if (base < "A" || base > "Z") {
            html += '<span class="signo">' + lletra + '</span>';
        } else if (acertadas.includes(base)) {
            html += '<span class="casilla">' + lletra + '</span>';
        } else {
            html += '<span class="casilla"></span>';
            quedan++;
        }
    }
    pFrase.innerHTML = html;
}

function jugar(tecla) {
    const lletra = tecla.textContent;
    tecla.disabled = true;

    if (fraseBase.includes(lletra)) {
        tecla.classList.add("correcta");
        acertadas.push(lletra);
        mostrarFrase();
    } else {
        tecla.classList.add("incorrecta");
        errors++;
        pImg.src = "assets/images/penjat-" + errors + ".png";
    }
    comprovarFinal();
}

function comprovarFinal() {
    if (errors == maxErrores) {
        acabar(false);
    } else if (quedan ==0) {
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