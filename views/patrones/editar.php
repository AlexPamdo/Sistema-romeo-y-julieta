<!-- Modal Para Crear -->
<div class="modal fade" id="editarPatron<?php echo $patron["id_patron"] ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar Patron
                </h1>
            </div>
            <div class="modal-body">
                <div class="">

                    <form class="needs-validation" action="index.php?page=confecciones" method="post">

                        <div class="container container-form d-flex flex-column p-3">
                            <input type="hidden" name="page" value="confecciones">
                            <input type="hidden" name="id" value="<?php echo $patron["id_patron"] ?>">
                            <div class="p-4">
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
                            <div>
                                <!-- Buscador de materiales -->
                                <label class="fw-bold" for="validationCustom01">Materiales</label>
                                <div class="form-label input-group flex-nowrap m-2">
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
                                    <div class="valid-feedback"></div>
                                    <div class=" flex-nowrap p-4">
                                        <label class="fw-bold" for="">Cantidad</label>
                                        <input class="form-control" type="numbre" name="cantidad"
                                            placeholder="Cantidad de prendas a confeccionar">
                                    </div>
                                </div>

                                <!-- Inputs para conocer los detalles de la venta -->
                                <div class="d-flex align-items-center m-2 row">
                                    >
                                    <div class="card p-2 col text-center">
                                        <p class="m-0 fw-bold">Total</p>
                                        <p class="m-0">50$</p>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#patrones">
                                Cerrar
                            </button>

                            <button type="submit" name="btnEditarPatron" value="editar" class="btn btn-rj-blue">
                                Registrar
                            </button>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>