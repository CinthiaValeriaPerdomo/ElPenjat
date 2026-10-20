const maxErrores = 6;
let errors=0;
let acertadas = [];
const pFrase = document.getElementById("frase");
const pImg =document.getElementById("penjat");
const teclas =document.getElementsByClassName("tecla");

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
        pImg.src = "assets/images/penjat-" + errors + ".png";
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