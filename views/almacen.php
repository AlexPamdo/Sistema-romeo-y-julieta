<head>
    <title>alemacen</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">



    <main class="row flex-nowrap">

        <!--Barra lateral-->
        <?php
        include("views/templates/Header.php");

        ?>


        <div class="col p-0">
            <header class="bg-body-tertiary">
                <header
                    class=" p-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-boxes-stacked fs-1"></i>
                        <h3 class="p-3">Almacen</h3>
                    </div>

                    <!--Aqui va el template del menu desplegable del perfil-->
                    <?php
                    include_once("views/templates/menuDesplegable.php")
                    ?>
                </header>
            </header>


            <!--contenido de la pagina-->
            <div class="ms-sm-auto p-0">

                <div class="p-4">
                    <nav class="navbar navbar-expand-lg d-flex justify-content-between p-3 row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal"
                                data-bs-target="#CrearModalM">
                                Crear <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>

                        <form class="d-flex col-8 col-md-4" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar Elemento"
                                aria-label="Search" />
                            <button class="btn btn-success" type="submit">
                                Buscar
                            </button>
                        </form>
                    </nav>


                    <?php
                    //incluimos el model
                    include_once("model/almacenModel.php");
                    $material = new material();
                    $materialData = $material->viewAll();
                    //funcion para crear
                    include_once("controllers/almacenController.php");
                    $crearmaterial = new crearMaterial();
                    $crearmaterial->create();

                    //tabla para ver los usuarios
                    ?>
                    <div class="table-responsive p-3 bg-body-tertiary">
                        <table class="table p-5 my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!--Falto cambiar los campos de la anterior tabla -->
                                <?php foreach ($materialData as $material) :

                                ?>
                                <tr>

                                    <td><?php echo ($material['id_material']) ?></td>
                                    <td><?php echo ($material['nombre_material']) ?></td>
                                    <td><?php echo ($material['tipo_material']) ?></td>
                                    <td><?php echo ($material['color_material']) ?></td>
                                    <td><?php echo ($material['stock']) ?></td>
                                    <td><?php echo ($material['precio']) ?>bs</td>

                                    <td class="d-flex">



                                        <!--Formulario donde estaran los botones de editar y eliminar -->
                                        <form class="d-flex" action="index.php" method="get">

                                            <!--boton para abrir el modal para confirmar la eliminacion -->
                                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                data-bs-target="#eliminarM<?php echo ($material['id_material']) ?>"><i
                                                    class="fa-solid fa-trash" style="color: #ffffff;"></i></button>

                                            <!--boton para abrir el modal para confirmar la editacion -->
                                            <button type="button" class="btn btn-success m-1" data-bs-toggle="modal"
                                                data-bs-target="#editarM<?php echo ($material['id_material']) ?>"><i
                                                    class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></button>
                                        </form>

                                    </td>
                                    <?php

                                        include("views/almacen/editar.php");
                                        //modal para eliminar
                                        include("views/almacen/eliminar.php") ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    <?php

                    //funcion y para editar
                    $editarmaterial = new editMaterial();
                    $editarmaterial->edit();

                    //funcion eliminar
                    $eliminarmaterial = new eliminarMaterial();
                    $eliminarmaterial->eliminar();



                    if (isset($_GET['succes'])) {
                        switch ($_GET['succes']) {
                            case 1:
                                echo "<script> Swal.fire({
  icon: 'success',
  title: 'Material creado',
  showConfirmButton: false,
  timer: 1500
}); </script>";

                                break;
                            case 2:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Material eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";
                                break;
                            case 3:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Material editado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";

                                break;
                        }
                    } elseif (isset($_GET['error'])) {
                        switch ($_GET['error']) {
                            case 3:
                                echo "<script> alertify.error('error al editar Material'); </script>";
                        }
                    }
                    ?>
                </div>
            </div>

        </div>

    </main>
    <?php

    ?>



</body>

</html>