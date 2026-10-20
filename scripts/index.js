const formulario = document.getElementById('formulario'); // tengo mi formulario del index


// event es el clic del usuario en el boton Jugar
formulario.addEventListener('submit', function (evento) {
    evento.preventDefault(); // detenemos el envio automatico del formulario con parentesissss
    let esValido = false;

    // obtenemos los valores y no dejamos espacios en blanco
    const nombre = document.getElementById('nom').value.trim();


    // cojo los errores
    const errorNombre = document.getElementById('errorNombre');

    // validamos 
    if (nombre === '') {
        errorNombre.style.display = 'block';
        errorNombre.textContent = 'El camp està buit';
        esValido = false;
    } else {
        errorNombre.style.display = 'none';
        esValido = true;
    }


    if (esValido) {
        formulario.submit();
    }

})