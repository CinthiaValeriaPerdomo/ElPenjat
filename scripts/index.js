const formulario = document.getElementById('form-jugar'); // tengo mi formulario del index
const btnJugar = document.getElementById('jugar');
btnJugar.disabled = false;

// event es el clic del usuario en el boton Jugar
formulario.addEventListener('submit', function (evento) {
    evento.preventDefault(); // detenemos el envio automatico del formulario con parentesissss
    let esValido = false;

    // obtenemos los valores y no dejamos espacios en blanco
    const nom = document.getElementById('nom');
    const nombre = nom.value.trim();
    

    // cojo los errores
    const errorNombre = document.getElementById('error-nombre');

    // validamos 
    if (nombre === '') {
        errorNombre.style.display = 'block';
        errorNombre.textContent = 'El camp està buit';
        esValido = false;
        nom.focus();  
    } else {
        errorNombre.style.display = 'none';
        esValido = true;
    }

    if (esValido) {
        formulario.submit();
    }

})