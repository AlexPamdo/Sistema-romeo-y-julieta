 <!-- Modal Para Crear -->
 <div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Crear usuario
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=usuarios" method="post">
                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="usuarios">
                         <label class="fw-bold" for="validationCustom01">Nombres</label>
                         <div class="form-label input-group flex-nowrap m-2">
                             <input type="text" name="nombre_usuario" class="form-control" id="validationCustom01"
                                 placeholder="Introduzca los nombres" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                             <div class="valid-feedback"></div>
                         </div>
                         <label class="fw-bold" for="">Apellidos</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="text" name="apellido_usuario" class="form-control"
                                 placeholder="Introduzca los Apellidos" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                         </div>


                         <label class="fw-bold" for="">Correo electrónico</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="text" name="gmail_usuario" class="form-control"
                                 placeholder="Introduzca el email" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                         </div>

                         <label class="fw-bold" for="password_create">Contraseña </label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="password" name="password_usuario" class="form-control" id="password_create"
                                 placeholder="Introduzca la Contraseña" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                             <div class="input-group-append">
                                 <button class=" btn btn-outline-secondary" type="button"
                                     id="togglePassword_create">Mostrar</button>
                             </div>
                         </div>

                         <!--mostrar la contraseña del Cliente-->

                         <script>
                         const togglePassword_create = document.querySelector('#togglePassword_create');
                         const password_create = document.querySelector('#password_create');

                         togglePassword_create.addEventListener('click', function(e) {
                             // Cambiar el tipo de input entre password y text
                             const type = password_create.getAttribute('type') === 'password' ?
                                 'text' : 'password';
                             password_create.setAttribute('type', type);
                             // Cambiar el texto del botón
                             this.textContent = type === 'password' ? 'Mostrar' : 'ocultar';
                         });
                         </script>

                         <label class="fw-bold" for="">Rol</label>
                         <div class="input-group pt-3 pb-3 ">
                             <select class="form-select" name="id_roles" id="inputGroupSelect02" required>
                                 <option selected value="2">User</option>
                                 <option value="1">Admin</option>


                             </select>
                         </div>

                         <label class="fw-bold" for="">Elija una pregunta de seguridad</label>
                         <div class="input-group pt-3 pb-3 ">
                             <select class="form-select" name="pregunta" id="inputGroupSelect02" required>
                                 <option selected value="¿Cúal es su hobby?">¿Cúal es su hobby?</option>

                                 <option value="¿Cúal es el nombre de su mascota?">¿Cúal es el nombre de su mascota?
                                 </option>

                                 <option value="¿Cúal es el su cancante favorito?">¿Cúal es el su cancante favorito?
                                 </option>

                                 <option value="¿Cúal es el su deporte favorito?">¿Cúal es el su deporte favorito?
                                 </option>
                             </select>
                         </div>

                         <label class="fw-bold" for="">Respuesta a la pregunta de seguridad</label>
                         <div class="input-group flex-nowrap m-2">
                             <input type="text" name="respuesta" class="form-control"
                                 placeholder="Introduzca la respuesta" aria-label="Username"
                                 aria-describedby="addon-wrapping" required />
                         </div>
                     </div>

             </div>

             <div class="modal-footer">

                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                     Cerrar
                 </button>
                 <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue">
                     Registrar
                 </button>

             </div>
             </form>

         </div>
     </div>
 </div>