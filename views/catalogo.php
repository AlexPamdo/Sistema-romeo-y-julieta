<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="Assets/style/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Catálogo</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">



    <main class="row flex-nowrap">

        <!--Barra lateral-->
        <?php
        include("views/templates/Header.php");
        ?>


        <div class="col p-0">

            <header class="bg-body-tertiary  p-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h3 class="p-3">Catalogo</h3>

                <?php
                include("views/templates/menuDesplegable.php");
                ?>
            </header>


            <!--contenido de la pagina-->
            <div class="ms-sm-auto p-0">

                <div class="p-4">
                    <nav class="navbar navbar-expand-lg d-flex justify-content-between p-3 row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#crearModal">
                                Crear
                            </button>
                        </div>

                        <form class="d-flex col-8 col-md-4" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search" />
                            <button class="btn btn-outline-success" type="submit">
                                Buscar
                            </button>
                        </form>
                    </nav>



                    <div class="table-responsive p-3 bg-body-tertiary">
                        <table class="table p-5 my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Talla</th>
                                    <th scope="col">Genero</th>
                                    <th scope="col">Coleccion</th>
                                    <th scope="col">Img</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Accion</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Prenda</td>
                                    <td>L</td>
                                    <td>Niña</td>
                                    <td>Lima limon</td>
                                    <td><img src="Assets/conjunto2.png" class="img-thumbnail" alt height="70" width="70" alt="..."></td>
                                    <td>esta prenda example</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-success m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#EditarModal">
                                                <img src="Assets/icons/WHite icons/edit-alt-solid-24.png" alt="" />
                                            </button>
                                            <button class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#BorrarModal">
                                                <img src="Assets/icons/WHite icons/trash-alt-solid-24.png" alt="" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

    </main>
    <?php
    include("views/catalogo/registrar.php");
    include("views/proveedores/editar.php");

    ?>

</body>

</html>