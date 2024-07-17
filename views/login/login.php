<div class="modal-content bg-rj-blue login-form">

    <div class="modal-body"></div>
    <form method="post" class="">
        <div class="d-flex flex-column align-items-center">

            <p class="text-center text-white">Panel admistrativo</p>
            <img src="Assets/img/logo2.png" alt="" width="80px">
            <h2 class="text-white">Iniciar Sesión</h2>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" name="gmail_usuario" id="floatingInput" required>
            <label for="floatingInput">Email</label>
        </div>


        <div class="form-floating">
            <input class="form-control" type="password" name="contraseña_usuario" id="floatingPassword" required>
            <label for="floatingPassword">Contraseña</label>
        </div>

        <div class="remember m-4">
            <a href="#" class="text-decotarion-none text-white" data-bs-toggle="modal"
                data-bs-target="#correoModal">Olvidé
                mi contraseña</a>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit" name="btnLogin" value="ok">Iniciar sesion</button>

    </form>
</div>




<div class="modal fade" id="correoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Crear usuario
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" method="post">
                    <div class="container container-form d-flex flex-column p-3">
                        <label class="fw-bold" for="validationCustom01">Correo</label>

                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" name="correo" class="form-control" id="validationCustom01"
                                placeholder="Introduzca su correo" aria-label="Username"
                                aria-describedby="addon-wrapping" required />
                            <div class="valid-feedback"></div>
                        </div>

                    </div>

                    <div class="modal-footer">


                        <button type="submit" name="btnOlvide" value="crear" class="btn btn-rj-blue">
                            Buscar
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>