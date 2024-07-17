<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="Assets/style/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Ventas</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">



    <main class="row flex-nowrap">

        <!--Barra lateral-->
        <?php
        include("views/templates/Header.php");
        ?>


        <div class="col p-0">

            <header
                class="bg-body-tertiary p-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-cart-shopping fs-1"></i>
                    <h3 class="p-3">Ventas</h3>
                </div>
                <!--Aqui va el template del menu desplegable del perfil-->
                <?php
                include_once("views/templates/menuDesplegable.php")
                ?>
            </header>


            <!--contenido de la pagina-->
            <div class="ms-sm-auto p-0">

                <div class="p-4">
                    <nav class="navbar navbar-expand-lg d-flex justify-content-between p-3 row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal"
                                data-bs-target="#crearModal">
                                Crear
                            </button>
                        </div>

                        <form class="d-flex col-8 col-md-4" role="search">
                            <input class="form-control m-2" type="search" placeholder="Buscar Elemento"
                                aria-label="Search" />
                            <button class="btn btn-success m-1" type="submit">
                                Buscar
                            </button>
                            <button class="btn btn-warning m-1" type="submit">
                                <i class="fa-solid fa-print"></i>
                            </button>
                        </form>
                    </nav>



                    <div class="table-responsive p-3 bg-body-tertiary">
                        <table class="table p-5 my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">cliente</th>
                                    <th scope="col">Tipo de venta</th>
                                    <th scope="col">Tipo de Pago</th>
                                    <th scope="col">Monto total</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        00/00/0000
                                    </td>
                                    <td>
                                        Example Nombre
                                    </td>
                                    <td>
                                        Envio
                                    </td>

                                    <td>
                                        Efectivo
                                    </td>
                                    <td>
                                        100bs
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-rj-blue m-1 btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#visualizar"><i class="fa-solid fa-eye"></i></button>

                                            <button class="btn btn-success m-1 btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editar">
                                                <i class=" fa-solid fa-pencil" style="color: #ffffff;"></i>

                                            </button>

                                            <button class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#eliminar">
                                                <i class="fa-solid fa-ban" style="color: #ffffff;"></i>
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
    <?php
    include("views/ventas/crear.php");
    include("views/ventas/editar.php");
    include("views/ventas/eliminar.php");
    include("views/ventas/visualizar.php");

    ?>


</body>

</html>