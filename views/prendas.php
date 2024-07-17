<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="Assets/style/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Prendas</title>
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
                    <h3 class="p-3">Prendas</h3>
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
                            <input class="form-control me-2" type="search" placeholder="Buscar Elemento"
                                aria-label="Search" />
                            <button class="btn btn-outline-success" type="submit">
                                Buscar
                            </button>
                        </form>
                    </nav>

                    <?php
                    //incluimos el model
                    include_once("model/prendasModel.php");
                    $prenda = new Prenda();
                    $prendaData = $prenda->viewAll();

                    //funcion para crear
                    include_once("controllers/prendasController.php");
                    $crearPrenda = new crearPrenda();
                    $crearPrenda->create();

                    ?>

                    <div class="table-responsive p-3 bg-body-tertiary">
                        <table class="table p-5 my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Identificador</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">categoria</th>
                                    <th scope="col">Talla</th>
                                    <th scope="col">Coleccion</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Genero</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Opcion</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($prendaData as $prenda) : ?>


                                <tr>
                                    <td><?php echo ($prenda['id_prenda']) ?></td>
                                    <td><?php echo ($prenda['nombre_prenda']) ?></td>
                                    <td><?php echo ($prenda['id_categoria']) ?></td>
                                    <td><?php echo ($prenda['id_talla']) ?></td>
                                    <td><?php echo ($prenda['id_coleccion']) ?></td>
                                    <td><?php echo ($prenda['id_color']) ?></td>
                                    <td><?php echo ($prenda['stock']) ?></td>
                                    <td><?php echo ($prenda['id_genero']) ?></td>
                                    <td><?php echo ($prenda['precio_unitario']) ?>bs</td>


                                    <td class="d-flex">

                                        <!--Formulario donde estaran los botones de editar y eliminar -->
                                        <form class="d-flex" action="index.php" method="get">

                                            <!--boton para abrir el modal para confirmar la eliminacion -->
                                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                data-bs-target="#eliminar<?php echo ($prenda['id_prenda']) ?>"><i
                                                    class="fa-solid fa-trash" style="color: #ffffff;"></i></button>

                                            <!--boton para abrir el modal para confirmar la editacion -->
                                            <button type="button" class="btn btn-success m-1" data-bs-toggle="modal"
                                                data-bs-target="#editar<?php echo ($prenda['id_prenda']) ?>"><i
                                                    class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></button>
                                        </form>


                                    </td>
                                    <?php

                                        //modal para eliminar
                                        include("views/prendas/eliminar.php");


                                        //modal para editar
                                        include("views/prendas/editar.php");


                                        ?>

                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>

                    <?php

                    //funcion y para editar

                    $editarPrenda = new editPrenda();
                    $editarPrenda->edit();

                    //funcion eliminar

                    $eliminarPrenda = new eliminarPrenda();
                    $eliminarPrenda->eliminar();



                    if (isset($_GET['succes'])) {
                        switch ($_GET['succes']) {
                            case 1:
                                echo "<script> Swal.fire({
  icon: 'success',
  title: 'Usuario creado',
  showConfirmButton: false,
  timer: 1500
}); </script>";

                                break;
                            case 2:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Usuario eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";
                                break;
                            case 3:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Usuario editado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";

                                break;
                        }
                    } elseif (isset($_GET['error'])) {
                        switch ($_GET['error']) {
                            case 3:
                                echo "<script> alertify.error('error al editar usuario'); </script>";
                        }
                    }
                    ?>
                </div>




            </div>

        </div>

    </main>
    <?php
    include("views/prendas/registrar.php");
    include("views/prendas/editar.php");

    ?>



</body>

</html>