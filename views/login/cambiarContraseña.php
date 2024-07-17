<?php
$usuarios = new usuarios();
$usuario = $usuarios->viewOne($_GET["id"]);



?>

<div class="modal-content card login-form">
    <h1>cambio de contraseña</h1>
    <form class="needs-validation" method="post">
        <div class="container container-form d-flex flex-column p-3">


            <label class="fw-bold" for="validationCustom01">Pregunta de seguridad</label>
            <label for=""><?php echo $usuario["pregunta"] ?></label>

            <div class="form-label input-group flex-nowrap m-2">
                <input type="text" name="answer" class="form-control" id="validationCustom01"
                    placeholder="Respuesta de la pregunta de seguridad dada" aria-label="Username"
                    aria-describedby="addon-wrapping" required />
                <div class="valid-feedback"></div>
            </div>

            <label class="fw-bold" for="">Nueva contraseña</label>
            <div class="input-group flex-nowrap m-2">
                <input type="text" name="password" class="form-control" placeholder="Escriba su nueva contraseña"
                    aria-label="Username" aria-describedby="addon-wrapping" required />
            </div>

            <label class="fw-bold" for="">Confirme su contraseña</label>
            <div class="input-group flex-nowrap m-2">
                <input type="text" name="c_password" class="form-control" placeholder="Confirme la contraseña"
                    aria-label="Username" aria-describedby="addon-wrapping" required />
            </div>

            <div class="modal-footer">

                <a href="index.php?page=login" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cerrar
                </a>
                <button type="submit" name="btnSwichPassword" value="swichPassword" class="btn btn-rj-blue">
                    Registrar
                </button>

            </div>
    </form>
</div>