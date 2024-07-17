<head>
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
                    <h3 class="p-3">Patrones</h3>
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
                                data-bs-target="#crearPatrones">
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
                    include_once("model/patronesModel.php");
                    $patrones = new patrones();
                    $patronesData = $patrones->viewAll();

                    //funcion para crear
                    include_once("controllers/patronesController.php");
                    $crearPatron = new crearPatron();
                    $crearPatron->create();
                    ?>

                    <div class="table-responsive p-3 bg-body-tertiary">
                        <table class="table p-5 my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Prenda</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">cantidad</th>
                                    <th scope="col">Costo Total</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($patronesData as $patron) : ?>


                                <tr>
                                    <td><?php echo ($patron['id_patron']) ?></td>
                                    <td><?php echo ($patron['id_prenda']) ?></td>
                                    <td><?php echo ($patron['id_material']) ?></td>
                                    <td><?php echo ($patron['cantidad_material']) ?></td>
                                    <td><?php echo ($patron['costo_unitario']) ?>bs</td>

                                    <td class="d-flex">

                                        <!--Formulario donde estaran los botones de editar y eliminar -->
                                        <form class="d-flex" action="index.php" method="get">

                                            <!--boton para abrir el modal para confirmar la eliminacion -->
                                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                data-bs-target="#eliminar<?php echo ($patron['id_patron']) ?>"><i
                                                    class="fa-solid fa-trash" style="color: #ffffff;"></i></button>

                                            <!--boton para abrir el modal para confirmar la editacion -->
                                            <button type="button" class="btn btn-success m-1" data-bs-toggle="modal"
                                                data-bs-target="#editarPatron<?php echo $patron["id_patron"] ?>"><i
                                                    class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></button>
                                        </form>


                                    </td>
                                    <?php

                                        //modal para eliminar
                                        include("views/patrones/eliminar.php");


                                        //modal para editar
                                        include("views/patrones/editar.php");


                                        ?>

                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>

                    <?php

                    //funcion y para editar

                    $editarPatron = new editarPatron();
                    $editarPatron->edit();

                    //funcion eliminar

                    $eliminarPatron = new eliminarPatron();
                    $eliminarPatron->delete();



                    if (isset($_GET['succes'])) {
                        switch ($_GET['succes']) {
                            case 1:
                                echo "<script> Swal.fire({
  icon: 'success',
  title: 'Patron creado',
  showConfirmButton: false,
  timer: 1500
}); </script>";

                                break;
                            case 2:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Patron editado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";
                                break;
                            case 3:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Patron eliminado',
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