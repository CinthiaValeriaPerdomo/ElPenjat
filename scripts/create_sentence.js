function quitarAcentos(texto) {
    const conAcento = ['À','Á','Ç','È','É','Ì','Í','Ï','Ò','Ó','Ù','Ú','Ü','Ñ'];
    const sinAcento = ['A','A','C','E','E','I','I','I','O','O','U','U','U','N'];
    for (let i = 0; i < conAcento.length; i++) {
        texto = texto.replaceAll(conAcento[i], sinAcento[i]);
    }
    return texto;
}

function clasificarFrase(frase) {
    let soloLetras = frase.toUpperCase();
    soloLetras = quitarAcentos(soloLetras);
    soloLetras = soloLetras.replace(/[^A-Z]/g, "");

    let numFaltan = 0;
    for (let i = 65; i <= 90; i++) {
        let letra = String.fromCharCode(i);
        if (!soloLetras.includes(letra)) {
            numFaltan++;
        }
    }

    let numLetras = soloLetras.length;

    if (numFaltan >= 13) {
        if (numLetras <= 28) {
            return tDificil;
        } else {
            return tNormal;
        }
    } else if (numFaltan <= 9) {
        if (numLetras >= 30) {
            return tFacil;
        } else {
            return tNormal;
        }
    } else {
        return tNormal;
    }
}

document.getElementById("frase").addEventListener("input",function () {
    const frase = this.value.trim();
    const texto = document.getElementById("dificultat");
    if (frase === "") {
        texto.textContent = "_____";
    } else {
        texto.textContent = clasificarFrase(frase);
    }

});