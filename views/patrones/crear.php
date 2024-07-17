<!-- Modal Para Crear -->
<div class="modal fade" id="crearPatrones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Crear patron
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">

                    <form class="needs-validation" method="post">

                        <div class="d-flex justify-content-evenly p-3">
                            <input type="hidden" name="page" value="patrones">

                            <div class="p-4 ">
                                <!-- Buscador de prenda -->
                                <label class="fw-bold" for="validationCustom01">Prenda</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <select class="form-select" name="prenda" id="">
                                        <?php
                                        //incluimos el controlador para acceder a la funcion ver todo
                                        include_once("model/prendasModel.php");

                                        $prendas = new Prenda();
                                        $prendasData = $prendas->viewAll();

                                        foreach ($prendasData as $prenda) : ?>

                                        <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                        <option value="<?php echo $prenda['id_prenda'] ?>">
                                            <?php echo $prenda['nombre_prenda'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="valid-feedback"></div>
                                </div>
                                <!-- Carta para ver la prenda seleccionada -->
                                <div class="card btn btn-light">
                                    <div class="card-body p-0 d-flex justify-content-evenly align-items-center">
                                        <i class="fa-solid fa-shirt fs-1"></i>
                                        <div class="text-center">
                                            <img src="Assets/img/conjunto (2).png" width="300" alt="">
                                            <h4 class="m-0 f-4 fw-bold">Camisa roja</h4>
                                            <p class="m-0">id 3</p>
                                        </div>
                                        <i class="fa-solid fa-plus fs-2"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <p class="">¿no se encuentra creado? </p>
                                    <a href="#"> Nuevo prenda</a>
                                </div>
                            </div>


                            <div class="">
                                <!-- Buscador de materiales -->

                                <div class="form-label d-flex align-items-center flex-nowrap ">
                                    <div>
                                        <label class="fw-bold" for="validationCustom01">Materiales</label>
                                        <select class="form-select" name="material" id="">
                                            <?php
                                            //incluimos el controlador para acceder a la funcion ver todo
                                            include_once("model/almacenModel.php");

                                            $materiales = new material();
                                            $materialesData = $materiales->viewAll();

                                            foreach ($materialesData as $material) : ?>

                                            <!-- usamos el foreach para mostrar todas las recetas disponibles -->
                                            <option value="<?php echo $material['id_material'] ?>">
                                                <?php echo $material['nombre_material'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="valid-feedback"></div>

                                    <div class="">
                                        <label class="fw-bold" for="">Cantidad</label>
                                        <input class="form-control" type="numbre" name="cantidad"
                                            placeholder="Cantidad de prendas a confeccionar" required>
                                    </div>
                                </div>

                                <button type="buttom" class="btn btn-rj-blue m-3">
                                    Agregar material
                                </button>

                                <!-- Tabla para registrar los productos -->
                                <div class="card">
                                    <table class="table table-striped my-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tela roja</td>
                                                <td>4 Rollos</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Boton negro</td>
                                                <td>6</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>40</td>
                                                <td>Hilo negro</td>
                                                <td>1 Rollo</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Inputs para conocer los detalles de la venta -->
                                <div class="d-flex align-items-center m-2 row">
                                    >
                                    <div class="card p-2 col text-center">
                                        <p class="m-0 fw-bold">Total</p>
                                        <p class="m-0">50$</p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-evenly">

                                    <button type="submit" name="btnCrearPatron" value="crear" class="btn btn-rj-blue">
                                        crear
                                    </button>

                                </div>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>