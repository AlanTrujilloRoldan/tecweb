<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UMSS</title>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
</head>

<body>

    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href=".">UMSS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" role="group" aria-label="NavBar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <button class="btn btn-secondary" type="button" id="formulario">Formulario</button>
                </li>
                <li class="nav-item active">
                    <button class="btn btn-secondary" type="button" id="dashboard">Dashboard</button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row p-4">
            <!-- FORMULARIO PARA AGREGAR PRODUCTO -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form id="product-form">
                            <input type="hidden" id="productId">
                            <div class="form-group">
                                <input class="form-control" type="text" id="name" placeholder="Nombre de producto">
                                <small id="name-error" class="card my-4 bg-danger border border-dark rounded p-4"></small>
                                <small id="name-valid" class="card my-4 border border-dark rounded p-4" style="background-color: green;"></small>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="brand" placeholder="Marca del producto">
                                <small id="brand-error" class="card my-4 bg-danger border border-dark rounded p-4"></small>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="model" placeholder="Modelo del producto">
                                <small id="model-error" class="card my-4 bg-danger border border-dark rounded p-4"></small>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="number" id="price" placeholder="Precio del producto">
                                <small id="price-error" class="card my-4 bg-danger border border-dark rounded p-4"></small>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="number" id="units" placeholder="Unidades del producto">
                                <small id="units-error" class="card my-4 bg-danger border border-dark rounded p-4"></small>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="details" cols="30" rows="10" placeholder="Detalles del producto"></textarea>
                                <small id="details-error" class="card my-4 bg-danger border border-dark rounded p-4"></small>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="image" placeholder="Imagen del producto">
                                <small id="image-error" class="card my-4 bg-danger border border-dark rounded p-4"></small>
                            </div>
                            <button class="btn btn-primary btn-block text-center" type="submit" id="addProductButton">
                                Agregar Producto
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- RESULTADOS DE LOS PRODUCTOS -->
            <div class="col-md-7">
                <div class="card my-4 " id="product-result">
                    <div class="card-body">
                        <ul id="container"></ul>
                    </div>
                </div>

                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody id="products"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts de jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    <!-- Lógica del Frontend -->
    <script src="app.js"></script>

</body>

</html>