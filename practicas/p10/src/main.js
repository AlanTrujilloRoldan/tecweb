function verificarEntrada(control, id) {
    if (control.value == '') {
        alert('Debe ingresar el dato solicitado');
    } else {
        switch (id) {
            case 'nombre': verficarEntNombre(control); break;
            case 'modelo': verificarEntModelo(control); break;
            case 'precio': verificarEntPrecio(control); break;
            case 'unidades': verificarEntUnidades(control); break;
            default:
                break;
        }
    }

}

function verficarEntNombre(control) {
    if (document.getElementById('nombre').value.length > 100)
        alert('El nombre sobrepasa los 100 caracteres');
}

function verificarEntModelo(control) {
    var modelo = document.getElementById('modelo').value;
    const regex = /^[a-zA-Z0-9]+$/; //String Alfanumerico

    if(modelo.length > 25)
        alert('El nombre del modelo sobrepasa los 25 caracteres')

    if(regex.test(modelo)==false)
        alert('Ingresa solo letras o números')
}

function verificarEntPrecio(control) {
    if (document.getElementById('precio').value < 99.99) 
        alert('El precio debe de ser mayor a 99.99');
}

function verificarEntDetalles(control) {
    if(document.getElementById('detalles').value.length > 250)
        alert('La descripción de los detalles sobrepasa los 250 caracteres')
}

function verificarEntUnidades(control) {
    if(document.getElementById('unidades').value <= 0)
        alert('Debes de ingresar un valor valido');
}

function verificarEntImagen(control) {
    const img = document.getElementById('imagen');
    const imagenRuta = img.files.length > 0 ? img.files[0].name : 'img/predeterminada.png';
    
}