<head>
    <title>Proveedores</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">



    <main class="row flex-nowrap">

        <!--Barra lateral-->
        <?php
        include("views/templates/Header.php");

        ?>


        <div class="col p-0">

            <header
                class="bg-body-tertiary  p-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-address-card fs-1"></i>
                    <h3 class="p-3">Proveedores</h3>
                </div>
                <?php
                include_once("views/templates/menuDesplegable.php")
                ?>
            </header>


            <!--contenido de la pagina-->
            <div class="ms-sm-auto p-0">

                <div class="p-4">
                    <nav class=" navbar navbar-expand-lg d-flex justify-content-between p-3 row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal"
                                data-bs-target="#CrearModal">
                                Crear <i class="fa-solid fa-plus"></i>
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
                    include_once("model/proveedorModel.php");
                    $proveedores = new Proveedores();
                    //le fato una e a la variable, ademas de que en el foreach tiene la p mayuscula
                    $proveedoresData = $proveedores->viewAll();

                    //funcion para crear
                    include_once("controllers/ProveedoresController.php");
                    $crearProvedor = new crearProveedor();
                    $crearProvedor->create();

                    //tabla para ver los Proveedores
                    ?>

                    <div class="table-responsive p-3 bg-body-tertiary">
                        <table class="table p-5 my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Notas</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($proveedoresData as $proveedor) :

                                ?>
                                <tr>
                                    <td><?php echo ($proveedor['id_proveedor']) ?></td>
                                    <td><?php echo ($proveedor['nombre_proveedor']) ?></td>
                                    <td><?php echo ($proveedor['telefono_proveedor']) ?></td>
                                    <td><?php echo ($proveedor['gmail_proveedor']) ?></td>
                                    <td><?php echo ($proveedor['id_tipo_proveedor']) ?></td>
                                    <td><?php echo ($proveedor['id_estado']) ?></td>
                                    <td><?php echo ($proveedor['notas_proveedor']) ?></td>

                                    <td class="d-flex">



                                        <!--Formulario donde estaran los botones de editar y eliminar -->
                                        <form class="d-flex" action="index.php" method="get">

                                            <!--boton para abrir el modal para confirmar la eliminacion -->
                                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                data-bs-target="#eliminar<?php echo ($proveedor['id_proveedor']) ?>"><i
                                                    class="fa-solid fa-trash" style="color: #ffffff;"></i></button>

                                            <!--boton para abrir el modal para confirmar la editacion -->
                                            <button type="button" class="btn btn-success m-1" data-bs-toggle="modal"
                                                data-bs-target="#editar<?php echo ($proveedor['id_proveedor']) ?>"><i
                                                    class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></button>
                                        </form>

                                    </td>
                                    <?php

                                        //modal para eliminar
                                        include("views/proveedores/eliminar.php");


                                        //modal para editar
                                        include("views/proveedores/editar.php");


                                        ?>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    <?php

                    //funcion y para editar
                    $editarProveedor = new editProveedor();
                    $editarProveedor->edit();

                    //funcion eliminar
                    $eliminarProveedor = new eliminarProveedor();
                    $eliminarProveedor->eliminar();



                    if (isset($_GET['succes'])) {
                        switch ($_GET['succes']) {
                            case 1:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Proveedor registrado',
                                    showConfirmButton: false,
                                    timer: 1500
                                    }); </script>";;

                                break;
                            case 2:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Proveedor eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                    }); </script>";;

                                break;
                            case 3:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'Proveedor editado',
                                    showConfirmButton: false,
                                    timer: 1500
                                    }); </script>";;

                                break;
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