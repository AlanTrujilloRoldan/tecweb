<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
$data = array();

if (isset($_GET['tope'])) {
	$tope = $_GET['tope'];
} else {
	die('Parámetro "tope" no detectado...');
}

if (!empty($tope)) {

	/** SE CREA EL OBJETO DE CONEXION */
	@$link = new mysqli('localhost', 'root', '12345678a', 'marketzone_laptops');
	/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

	/** comprobar la conexión */
	if ($link->connect_errno) {
		die('Falló la conexión: ' . $link->connect_error . '<br/>');
	}

	/** Consulta segura usando prepared statements */
	if ($stmt = $link->prepare("SELECT * FROM productos WHERE unidades <= ?")) {
		$stmt->bind_param("i", $tope);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}

	$link->close();
}
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Producto</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script>
		function show(event) {
			// se obtiene el id de la fila donde está el botón presionado
			var rowId = event.target.parentNode.parentNode.id;

			// se obtienen los datos de la fila en forma de arreglo
			var data = document.getElementById(rowId).querySelectorAll(".row-data");

			// Extracción de datos
			var nombre = data[0].innerHTML;
			var marca = data[1].innerHTML;
			var modelo = data[2].innerHTML;
			var precio = data[3].innerHTML;
			var unidades = data[4].innerHTML;
			var detalles = data[5].innerHTML;

			// Mostrar datos en una alerta
			alert("Nombre: " + nombre + "\nMarca: " + marca + "\nModelo: " + modelo);
			send2form(rowId, nombre, marca, modelo, precio, unidades, detalles);
		}
	</script>
</head>

<body>
	<h3>PRODUCTO</h3>

	<br />

	<?php if (isset($row) && count($row) > 0): ?>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($row as $value): ?>
					<tr id="row-<?= $value['id'] ?>"> <!-- Fila con ID único -->
						<th scope="row"><?= $value['id'] ?></th>
						<td class="row-data"><?= $value['nombre'] ?></td>
						<td class="row-data"><?= $value['marca'] ?></td>
						<td class="row-data"><?= $value['modelo'] ?></td>
						<td class="row-data"><?= $value['precio'] ?></td>
						<td class="row-data"><?= $value['unidades'] ?></td>
						<td class="row-data"><?= $value['detalles'] ?></td>
						<td><img src="<?= $value['imagen'] ?>" alt="Producto" /></td>
						<td>
							<input type="button" value="Modificar" onclick="show(event)" />
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php elseif (!empty($id)): ?>
		<script>
			alert('El ID del producto no existe');
		</script>
	<?php endif; ?>

	<script>
		function send2form(rowId, nombre, marca, modelo, precio, unidades, detalles) {
			var form = document.createElement("form");

			//id
			var idIn = document.createElement("input");
			idIn.type = 'text';
			idIn.name = 'id';
			idIn.value = rowId;
			form.appendChild(idIn);

			//nombre
			var nombreIn = document.createElement("input");
			nombreIn.type = 'text';
			nombreIn.name = 'nombre';
			nombreIn.value = nombre;
			form.appendChild(nombreIn);

			//marca
			var marcaIn = document.createElement("input");
			marcaIn.type = 'text';
			marcaIn.name = 'marca';
			marcaIn.value = marca;
			form.appendChild(marcaIn);

			//modelo
			var modeloIn = document.createElement("input");
			modeloIn.type = 'text';
			modeloIn.name = 'modelo';
			modeloIn.value = modelo;
			form.appendChild(modeloIn);

			//precio
			var precioIn = document.createElement("input");
			precioIn.type = 'text';
			precioIn.name = 'precio';
			precioIn.value = precio;
			form.appendChild(precioIn);

			//unidades
			var unidadesIn = document.createElement("input");
			unidadesIn.type = 'text';
			unidadesIn.name = 'unidades';
			unidadesIn.value = unidades;
			form.appendChild(unidadesIn);

			//detalles
			var detallesIn = document.createElement("input");
			detallesIn.type = 'text';
			detallesIn.name = 'detalles';
			detallesIn.value = detalles;
			form.appendChild(detallesIn);

			console.log(form);

			form.method = 'POST';
			form.action = 'http://localhost/tecweb/practicas/p10/formulario_productos_v3.php';

			document.body.appendChild(form);
			form.submit();
		}
	</script>
</body>

</html>