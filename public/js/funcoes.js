function createAlertBootstrap(type, titleText, message, id) {
    // criando div alert
    let alert = document.createElement('div');
    alert.classList.add('alert');
    alert.classList.add('alert-' +  type);
    alert.classList.add('alert-dismissible');
    alert.setAttribute('role', 'alert');
    id ? alert.setAttribute('id', id) : '';


    // criando button
    let btn = document.createElement('button');
    btn.setAttribute('type', 'button');
    btn.classList.add('btn-close');
    btn.setAttribute('className', 'btn-close');
    btn.setAttribute('data-bs-dismiss', 'alert');
    btn.setAttribute('aria-label', 'Close');

    // criando div alert message
    let divMessage = document.createElement('div');
    divMessage.classList.add('alert-message');

    // criando strong
    let strong = document.createElement('strong');
    // criando text
    let text = document.createTextNode(message);
    strong.appendChild(text);


    // montando alerta
    alert.appendChild(btn);
    alert.appendChild(divMessage);
    divMessage.appendChild(strong);

    return alert;
}

function destroyElement(idElemento) {
    console.log(idElemento);
    let resultado = !!document.getElementById(idElemento);
    console.log('RESULTADO : ' + resultado);

    if(resultado) {
        document.getElementById(idElemento).remove();
    }else{
        console.log('Este elemento não existe');
    }




}
