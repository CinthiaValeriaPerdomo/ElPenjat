const audioSegellar = document.getElementsByTagName("audio")[0];
const form = document.getElementsByTagName("form")[0];
const respostaInput = document.getElementById("resposta");

form.addEventListener("submit", (event) => {
    event.preventDefault();

    const btnSubmit = event.submitter;
    const resposta = btnSubmit.value;
    respostaInput.value = resposta;

    if (resposta == "S") {
        audioSegellar.play();
        setTimeout(form.submit(), audioSegellar.duration*1000);
    } else {
        form.submit();
    }
});
