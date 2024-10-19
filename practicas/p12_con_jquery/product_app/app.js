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
  $('#product-result').hide();
  fetchProducts();

  //Busqueda de los productos
  //Pendiente (Mostrar en la lista normal??)
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

          products.forEach(product => {
            template += `<li>
           ${product.nombre}
          </li>`;
          });

          $('#container').html(template);
          $('#product-result').show();
        }
      })
    }
  })

  //Pendiente
  //Mandar un JSON o un Archivo a Product-add
  //Agregar fetchProducts() cuando se agreguen satisfactoriamente
  $('#product-form').submit(function (e) {
    const postData = {
      name: $('#name').val(),
      description: $('#description').val(),
    }
    console.log(postData);

    /*
    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    */
    e.preventDefault();

  });

  //Listar productos 
  function fetchProducts() {
    $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      success: function (response) {
        let products = JSON.parse(response);
        console.log(products);
        let template = '';
        products.forEach(product => {
          template += `
          <tr productId="${product.id}">
            <td>${product.id}</td>
            <td>${product.nombre}</td>
            <td>${product.detalles}</td>
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

  $(document).on('click', '.product-delete', function() {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('productId');
    $.get('product-delete.php', {id}, function (response) {
      console.log(response);
      
    })
    
  })
});