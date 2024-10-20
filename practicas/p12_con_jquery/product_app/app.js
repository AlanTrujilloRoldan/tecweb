// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  "precio": 0.0,
  "unidades": 1,
  "modelo": "XX-000",
  "marca": "NA",
  "detalles": "NA",
  "imagen": "img/predeterminado.png"
};

function init() {
  /**
   * Convierte el JSON a string para poder mostrarlo
   * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
   */
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;

  // SE LISTAN TODOS LOS PRODUCTOS  
}

$(document).ready(function () {
  let edit = false;
  $('#product-result').hide();
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
    const data = {
      name: $('#name').val(),
      description: $('#description').val(),
    }

    let url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';

    // Convertir la descripción de JSON a objeto
    var descripcionObj = JSON.parse(data.description);

    // Crear un objeto combinando ambos
    var productoData = {
      nombre: data.name,
      marca: descripcionObj.marca,
      modelo: descripcionObj.modelo,
      precio: descripcionObj.precio,
      detalles: descripcionObj.detalles,
      unidades: descripcionObj.unidades,
      imagen: descripcionObj.imagen
    };

    // Enviar los datos a PHP usando AJAX
    $.ajax({
      url: url,
      type: 'POST', // Método de envío
      data: JSON.stringify(productoData), // Convertir el objeto a JSON
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
        $('#container').html('Status: Success <br /> Message: Producto eliminado');
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
      let template = '';
      const product = JSON.parse(response);

      template +=
        `{
        "precio": ${product.precio},
        "unidades": ${product.unidades},
        "modelo": "${product.modelo}",
        "marca": "${product.marca}",
        "detalles": "${product.detalles}",
        "imagen": "img/predeterminado.png"
        }`
      $('#description').val(template);
      $('#name').val(product.nombre);
      edit = true;
    })
  })
});