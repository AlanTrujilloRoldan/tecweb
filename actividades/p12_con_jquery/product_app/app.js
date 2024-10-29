// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  "precio": 0.0,
  "unidades": 1,
  "modelo": "XX-000",
  "marca": "NA",
  "detalles": "NA",
  "imagen": "img/predeterminado.png"
};

$(document).ready(function () {
  let edit = false;
  $('#product-result').hide();
  $('#name-error').hide();
  $('#price-error').hide();
  $('#details-error').hide();
  $('#units-error').hide();
  $('#brand-error').hide();
  $('#model-error').hide();
  $('#image-error').hide();
  fetchProducts();

  //Busqueda de los productos
  //Pendiente (Mostrar en la lista normal?? SI)
  $('#search').keyup(function (e) {
    if ($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: './backend/product-search.php',
        type: 'GET',
        data: { search },
        success: function (response) {
          let products = JSON.parse(response);
          let template = '';
          let templateLista = '';

          products.forEach(product => {
            template += `<li>
              ${product.nombre}
            </li>`;

            templateLista += `
                <tr productId="${product.id}">
                    <td>${product.id}</td>
                    <td>${product.nombre}</td>
                    <td>
                        <ul>
                            <li>Precio: ${product.precio}</li>
                            <li>Unidades: ${product.unidades}</li>
                            <li>Modelo: ${product.modelo}</li>
                            <li>Marca: ${product.marca}</li>
                            <li>Detalles: ${product.detalles}</li>
                        </ul>
                    </td>
                    <td>
                        <button class="product-delete btn btn-danger"> 
                            Delete 
                        </button>
                    </td>
                </tr>`;
          });

          $('#container').html(template);
          $('#products').html(templateLista);
          $('#product-result').show();
        }
      })
    } else {
      fetchProducts();
      $('#product-result').hide();
    }
  })

  //Agregar productos
  $('#product-form').submit(function (e) {
    e.preventDefault();
    let nombreValido = verficarEntNombre();
    let detallesValido = verificarEntDetalles();
    let imagenValido = verificarEntImagen();
    let marcaValido = verificarEntMarca();
    let modeloValido = verificarEntModelo();
    let precioValido = verificarEntPrecio();
    let unidadesValido = verificarEntUnidades();

    if (nombreValido && detallesValido && imagenValido && modeloValido && precioValido && unidadesValido) {
      var data = {
        id: $('#productId').val(),
        name: $('#name').val(),
        brand: $('#brand').val(),
        model: $('#model').val(),
        price: $('#price').val(),
        details: $('#details').val(),
        units: $('#units').val(),
        image: $('#image').val(),
      }

      let url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';

      // Enviar los datos a PHP usando AJAX
      $.ajax({
        url: url,
        type: 'POST', // Método de envío
        data: JSON.stringify(data), // Convertir el objeto a JSON
        contentType: 'application/json', // Tipo de contenido
        success: function (response) {
          let respuesta = JSON.parse(response);
          let template = '';
          template += `
               Status: ${respuesta.status} <br />
               Message: ${respuesta.message} <br />
              `;
          $('#container').html(template);
          $('#product-result').show();
          fetchProducts();
        }
      });
    } else if (!nombreValido)
      alert('El campo: Nombre no es valido');
    else if (!detallesValido)
      alert('El campo: Detalles no es valido');
    else if (!precioValido)
      alert('El campo: Precio no es valido');
    else if (!imagenValido)
      alert('El campo: Imagen no es valido');
    else if (!modeloValido)
      alert('El campo: Modelo no es valido');
    else if (!unidadesValido)
      alert('El campo: Unidades no es valido');
    else if (!marcaValidoValido)
      alert('El campo: Marca no es valido');
  });

  //Listar productos 
  function fetchProducts() {
    $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      success: function (response) {
        let products = JSON.parse(response);

        let template = '';
        products.forEach(product => {
          template += `
                <tr productId="${product.id}">
                    <td>${product.id}</td>
                    <td>
                      <a href="#" class="product-item">${product.nombre}</a>
                    </td>
                    <td>
                        <ul>
                            <li>Precio: ${product.precio}</li>
                            <li>Unidades: ${product.unidades}</li>
                            <li>Modelo: ${product.modelo}</li>
                            <li>Marca: ${product.marca}</li>
                            <li>Detalles: ${product.detalles}</li>
                        </ul>
                    </td>
                    <td>
                        <button class="product-delete btn btn-danger"> 
                            Delete 
                        </button>
                    </td>
                </tr>`;
        });

        $('#products').html(template);
      }
    });
  }

  //Eliminar Elementos
  $(document).on('click', '.product-delete', function () {

    if (confirm('¿Estas seguro que deseas eliminar el elemento?')) {
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr('productId');
      $.get('./backend/product-delete.php', { id }, function (response) {
        fetchProducts();
        let respuesta = JSON.parse(response);
        let template = '';
        template += `
             Status: ${respuesta.status} <br />
             Message: ${respuesta.message} <br />
            `;
        $('#container').html(template);
        $('#product-result').show();
      })

    } else {
      $('#product-result').hide();
    }
  })

  //Modificar
  $(document).on('click', '.product-item', function () {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('productId');
    $.get('./backend/product-single.php', { id }, function (response) {
      const product = JSON.parse(response);

      $('#name').val(product.nombre);
      $('#price').val(product.precio);
      $('#units').val(product.unidades);
      $('#model').val(product.modelo);
      $('#brand').val(product.marca);
      $('#details').val(product.detalles);
      $('#image').val("img/predeterminado.png");

      $('#productId').val(product.id)
      edit = true;
    })
  })
});

function verificarEntNombre() {
  const nombre = document.getElementById('name').value;

  // Limpiar mensajes anteriores
  $('#name-error').hide();

  if (nombre.length > 100) {
    $('#name-error').text('El nombre no debe exceder los 100 caracteres').show();
    return false;
  }

  return true;
}


function verificarEntMarca() {
  const marca = document.getElementById('brand').value;

  // Limpiar mensajes anteriores
  $('#brand-error').hide();

  if (marca.length > 100) {
    $('#brand-error').text('El nombre de la marca no debe exceder los 100 caracteres').show();
    return false;
  }

  return true;
}


function verificarEntModelo() {
  const modelo = document.getElementById('model').value;
  const regex = /^[a-zA-Z0-9-]+$/; // Alfanumérico y guion
  let Valido = true;

  // Limpiar mensajes anteriores
  $('#model-container').text('');
  $('#model-error').hide();

  if (modelo.length > 25) {
    console.log('El nombre del modelo sobrepasa los 25 caracteres');
    $('#model-container').text('El nombre del modelo sobrepasa los 25 caracteres');
    $('#model-error').show();
    Valido = false;
  }

  if (!regex.test(modelo)) {
    $('#model-container').text('Ingresa solo letras, números o guiones');
    $('#model-error').show();
    Valido = false;
  }

  return Valido;
}


function verificarEntPrecio() {
  const precio = parseFloat(document.getElementById('price').value);

  // Limpiar mensajes anteriores
  $('#price-error').hide();

  if (isNaN(precio) || precio < 99.99) {
    $('#price-error').text('El precio debe ser un número y no puede ser menor a 99.99').show();
    return false;
  }

  return true;
}


function verificarEntDetalles() {
  const detalles = document.getElementById('details').value;

  // Limpiar mensajes anteriores
  $('#details-error').hide();

  if (detalles.length > 250) {
    $('#details-error').text('Los detalles no deben exceder los 250 caracteres').show();
    return false;
  }

  return true;
}


function verificarEntUnidades() {
  const unidades = parseInt(document.getElementById('units').value, 10);

  // Limpiar mensajes anteriores
  $('#units-error').hide();

  if (isNaN(unidades) || unidades < 0) {
    $('#units-error').text('Las unidades deben ser un número entero no negativo').show();
    return false;
  }

  return true;
}


function verificarEntImagen() {
  const imagen = document.getElementById('image').value;

  // Limpiar mensajes anteriores
  $('#image-error').hide();

  if (!imagen || imagen !== 'img/predeterminado.png') {
    $('#image-error').text('Por favor, ingresa la imagen predeterminada.').show();
    return false;
  }

  return true;
}
