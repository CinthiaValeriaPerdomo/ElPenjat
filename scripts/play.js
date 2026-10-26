const maxErrores = 6;
let errors=0;
let acertadas = [];
let quedan =1;
const pFrase = document.getElementById("frase");
const pImg =document.getElementById("penjat");
const teclas =document.getElementsByClassName("tecla");

const conAcento = "ÀÁÈÉÍÏÒÓÚÜÇ";
const sinAcento = "AAEEIIOOUUC";

const inicio = Date.now();

const audios = document.getElementsByTagName("audio");
const audiosEncert = Array.from(audios).slice(0,3);
const audiosError  = Array.from(audios).slice(3,6);
const audiosRiure  = Array.from(audios).slice(6,15);
const audioBach = audios[15];
const audioAplaudiment = audios[16];

function lletraBase(lletra) {
    let pos = conAcento.indexOf(lletra);
    if (pos >= 0) {
        return sinAcento[pos];
    }
    return lletra;
}

function mostrarFrase() {
    let html = "";
    quedan = 0;
    for (let i = 0; i < frase.length; i++) {
        const lletra = frase[i];
        const base = lletraBase(lletra);
        if (lletra == " "){
            html += '<span class="espacio"></span>';
        }else if (base < "A" || base > "Z") {
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

mostrarFrase();


let fraseBase = "";
for (let i = 0; i < frase.length; i++) {
    fraseBase += lletraBase(frase[i]);
}



// VALERIA HACER ESTA FUNCION MAS CORTA USANDO OTRAS FUNCIONES

const letrasFrase = [...new Set(frase.replaceAll(" ", ""))];


let contador_consonantes = 0;


function acierto(tecla, lletra) {
    tecla.classList.add("correcta");
    const audioEncert = audiosEncert[Math.floor(Math.random()*audiosEncert.length)];
    audioEncert.play();
    acertadas.push(lletra);
    mostrarFrase();
}

function fallo(tecla) {
    tecla.classList.add("incorrecta");
    const audioError = audiosError[Math.floor(Math.random()*audiosError.length)];
    audioError.play();

    errors++;
    pImg.src = "assets/images/penjat-" + errors + ".png";
}


function jugar(tecla) {
    const lletra = tecla.textContent;
    tecla.disabled = true;

    const consonantes = "BCDFGHJKLMNÑPQRSTVWXYZ";
    const vocales = "AEIOU";
    
    if (consonantes.includes(lletra)){
        contador_consonantes += 1;
        if (fraseBase.includes(lletra)) {
            acierto(tecla, lletra);
        } else {
            fallo(tecla);
        }
    } else if (vocales.includes(lletra)){
        if (contador_consonantes >= 3){
            contador_consonantes = 0;
            if (fraseBase.includes(lletra)) {
                acierto(tecla, lletra);
                
            } else {
                fallo(tecla);
            } 
             
        } else {
            mostrarError("DEBE INGRESAR COMO MINIMO TRES CONSONANTES ANTES DE UNA VOCAL");
            tecla.disabled = false;
        }
    
    }

    comprovarFinal();
}

function mostrarError(texto){
    const alerta = document.getElementById("mensaje-error");
    const textoAlerta = document.getElementById("texto-alerta");

    textoAlerta.textContent = texto;
    alerta.classList.remove("oculto")
}


function cerrarMensaje(){
    const alerta = document.getElementById("mensaje-error");
    alerta.classList.add("oculto");
}

function comprovarFinal() {
    if (errors == maxErrores) {
        acabar(false);
    } else if (quedan == 0) {
        acabar(true);
    }
}

for (let i = 0; i < teclas.length; i++) {
    teclas[i].addEventListener("click", () => {
        jugar(teclas[i]);
    });
}


function acabar(guanyat) {
    document.getElementById("guanyat").value = guanyat ? "1" : "0";
    document.getElementById("puntuacio").value = calcularPunctuacion(guanyat);

    const audioRiure = audiosRiure[Math.floor(Math.random()*audiosRiure.length)];
    if (guanyat) {
        audioAplaudiment.play();
    } else {
        audioRiure.play();
        audioBach.play();
    }

    const timeout = 1000 * (guanyat ? audioAplaudiment.duration : audioRiure.duration);
    setTimeout(() => {
        document.getElementById("form-fi").submit();
    }, timeout);
}


function calcularPunctuacion(guanyat){
    if (!guanyat) {
        return 0; 
    }

    let letras = 0;
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
