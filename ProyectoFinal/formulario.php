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
    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href=".">UMSS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" role="group" aria-label="NavBar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="btn btn-secondary mr-2" href="./formulario.php" id="formulario">Formulario</a>
                </li>
                <li class="nav-item active">
                    <a class="btn btn-secondary" href="./dashboard.php" id="dashboard">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row p-4 justify-content-center">
            <!-- FORMULARIO PARA Datos Personales -->
            <div class="col-12">
                <form id="product-form">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Datos Personales</h2>
                        </div>
                        <div class="card-body">

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


                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h2 class="card-title">Datos Personales</h2>
                        </div>
                        <div class="card-body">
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
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-center mt-4" type="submit" id="addProductButton">
                        Agregar Producto
                    </button>
                </form>
            </div>
        </div>
    </div>


    <!-- Scripts de jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    <!-- Lógica del Frontend -->
    <script src="./backend/app.js"></script>

</body>

</html>