<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="Assets/style/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Envios</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">
    <main class="row flex-nowrap">
        <!--Barra lateral-->
        <?php include("views/templates/Header.php"); ?>

        <div class="col p-0">
            <header class="bg-body-tertiary">
                <header
                    class="p-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-plane fs-1"></i>
                        <h3 class="p-3">Envios</h3>
                    </div>
                    <!--Aqui va el template del menu desplegable del perfil-->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </header>
            </header>

            <?php
            include("views/envios/crear.php");
            include("views/envios/eliminar.php");
            include("views/envios/editar.php");

            ?>

            <!--contenido de la pagina-->
            <div class="ms-sm-auto p-0">
                <div class="p-4">
                    <nav class="navbar navbar-expand-lg d-flex justify-content-between p-3 row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal"
                                data-bs-target="#crearEnvio">
                                Crear <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                        <form class="d-flex col-8 col-md-4" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar Elemento"
                                aria-label="Search" />
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </form>
                    </nav>
                    <div class="table-responsive p-3 bg-body-tertiary">
                        <table class="table p-5 my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Venta</th>
                                    <th scope="col">Entrega</th>
                                    <th scope="col">Agencia</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha de llegada</th>
                                    <th scope="col">StarkenID</th>
                                    <th scope="col text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1
                                    </td>
                                    <td>Local</td>
                                    <td>MotoYummi</td>
                                    <td>El bosque</td>
                                    <td>
                                        Entregado
                                    </td>
                                    <td class="text-center">17/06/24</td>
                                    <td class="text-center">00534</td>

                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-success m-1 btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editar">
                                                <img src="Assets/icons/WHite icons/edit-alt-solid-24.png" alt="" />
                                            </button>
                                            <button class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#eliminar">
                                                <img src="Assets/icons/WHite icons/trash-alt-solid-24.png" alt="" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>




            </div>

        </div>

    </main>

</body>

</html>