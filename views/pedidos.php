<head>
    <title>pedidos</title>
</head>

<?php
$function = $_GET["function"] ?? "default";

if ($function === "default") {
?>

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
                        <i class="fa-solid fa-truck-fast fs-1"></i>
                        <h3 class="p-3">Pedidos</h3>
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
                                data-bs-target="#CrearModal">
                                Crear <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>

                        <form class="d-flex col-8 col-md-4" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar Elemento"
                                aria-label="Search" />
                            <button class="btn btn-success" type="submit">
                                Buscar
                            </button>
                            <a href="index.php?page=pedidos&function=print" target="_blank" class="btn btn-warning m-1">
                                <i class="fa-solid fa-print"></i>
                            </a>
                        </form>
                    </nav>


                    <?php
                        //incluimos el model
                        include_once("model/pedidosModel.php");
                        $pedidos = new pedidos();
                        $pedidosData = $pedidos->viewAll();
                        //funcion para crear
                        include_once("controllers/pedidosController.php");
                        $crearpedido = new crearPedido();
                        $crearpedido->create();

                        //tabla para ver los pedidos
                        ?>
                    <div class="table-responsive p-3 bg-body-tertiary">

                        <table class="table p-5 my-table align-middle table-borderless">

                            <thead class="">
                                <tr>

                                    <th scope="col">ID</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Fecha estimada</th>
                                    <th scope="col">Fecha real</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Orden</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Metodo de pago</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Total a pagar</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($pedidosData as $pedido) :

                                    ?>
                                <tr>
                                    <td><?php echo ($pedido['id_pedido']) ?></td>
                                    <td><?php echo ($pedido['id_proveedor']) ?></td>
                                    <td><?php echo ($pedido['fecha_pedido']) ?></td>
                                    <td><?php echo ($pedido['fecha_estimada']) ?></td>
                                    <td><?php if ($pedido['fecha_real'] == "0000-00-00") {
                                                    echo "<div class='no-Entregado' >  </div>";
                                                } else {
                                                    echo ($pedido['fecha_real']);
                                                } ?></td>
                                    <td><?php if ($pedido['estado_pedido']) {
                                                    echo "<div class='Entregado'>completo</div>";
                                                } else {
                                                    echo "<div class='no-Entregado'>incompleto </div>";
                                                } ?></td>
                                    <td>
                                        <?php echo ($pedido['id_orden_pedido']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($pedido['cantidad_pedido']) ?>
                                    </td>
                                    <td>
                                        <?php if (($pedido['id_metodo_pago']) == "ninguno") {
                                                    echo "<div class='no-Entregado' >  </div>";
                                                } else {
                                                    echo ($pedido['id_metodo_pago']);
                                                } ?>
                                    </td>

                                    <td>
                                        <?php echo ($pedido['id_usuario']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($pedido['total_pedido']) ?>bs
                                    </td>

                                    <td class="d-flex">



                                        <!--Formulario donde estaran los botones de editar y eliminar -->
                                        <form class="d-flex" action="index.php" method="get">

                                            <!--boton para abrir el modal para confirmar la eliminacion -->
                                            <button type="button" class="btn btn-danger m-1 btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#eliminar<?php echo ($pedido['id_pedido']) ?>"> <i
                                                    class="fa-solid fa-ban " style="color: #ffffff;"></i></button>

                                            <!--boton para abrir el modal para confirmar la editacion -->
                                            <!--  <button type="button" class="btn btn-success m-1 btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editar<?php echo ($pedido['id_pedido']) ?>"><i
                                                    class="fa-solid fa-pencil "
                                                    style="color: #ffffff;"></i></i></button> -->

                                            <!--boton para abrir el modal para confirmar la actualizacion -->
                                            <button type="button" class="btn btn-success m-1 btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#actualizar<?php echo ($pedido['id_pedido']) ?>"><i
                                                    class="fa-solid fa-hand-holding-dollar "
                                                    style="color: #ffffff;"></i></button>
                                        </form>

                                    </td>
                                    <?php

                                            include("views/pedidos/editar.php");
                                            //modal para eliminar
                                            include("views/pedidos/eliminar.php");

                                            include("views/pedidos/actualizar.php");
                                            ?>


                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    <?php

                        //funcion y para editar
                        $editarpedido = new editpedido();
                        $editarpedido->edit();

                        //funcion eliminar
                        $eliminarpedido = new eliminarpedido();
                        $eliminarpedido->eliminar();

                        //funcion para actualizar
                        $actualizarPedido = new updatePedido();
                        $actualizarPedido->update();



                        if (isset($_GET['succes'])) {
                            switch ($_GET['succes']) {
                                case 1:
                                    echo "<script> Swal.fire({
  icon: 'success',
  title: 'pedido creado',
  showConfirmButton: false,
  timer: 1500
}); </script>";

                                    break;
                                case 2:
                                    echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'pedido eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";
                                    break;
                                case 3:
                                    echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'pedido editado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";

                                    break;
                            }
                        } elseif (isset($_GET['error'])) {
                            switch ($_GET['error']) {
                                case 3:
                                    echo "<script> alertify.error('error al editar pedido'); </script>";
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

<?php
} elseif ($function === "print") {
    require "views/pedidos/fpdf/PruebaH.php";
}
?>

</html>