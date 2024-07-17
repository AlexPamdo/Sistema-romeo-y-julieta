//estos son todos los links
var clientes = document.getElementById('link_clientes');
var confecciones = document.getElementById('link_confecciones');
var empleados = document.getElementById('link_empleados');
var envios = document.getElementById('link_envios');
var pedidos = document.getElementById('link_pedidos');
var prendas = document.getElementById('link_prendas');
var proveedores = document.getElementById('link_proveedores');
var telas = document.getElementById('link_telas');
var ventas = document.getElementById('link_ventas');



// Definir la variable para almacenar la última opción seleccionada
var ultimaOpcionSeleccionada = null;
var miVariable;

// Al cargar la página, verificar si hay un enlace seleccionado almacenado y aplicar la clase correspondiente
window.addEventListener('load', function() {
    miVariable = localStorage.getItem('ultimaOpcionSeleccionada');
    if (miVariable) {
        ultimaOpcionSeleccionada = document.getElementById(miVariable);
        ultimaOpcionSeleccionada.classList.add('rj-link-active');
    }
});


//estas funciones son para asignarle a la clase miVariable cual link se pulso
clientes.addEventListener('click', function(event) {
    
    // Evitamos que el enlace haga la acción por defecto (navegar a una nueva página)
    

     // Cambiar la clase del último elemento seleccionado (si existe)
    if (ultimaOpcionSeleccionada) {
        ultimaOpcionSeleccionada.classList.remove('rj-link-active');
    }

    // Asignamos un valor a una variable cuando se hace clic en el enlace
    miVariable = "clientes";

    // Actualizar el último elemento seleccionado
    ultimaOpcionSeleccionada = clientes;

    //Agregamos la clase e active
    clientes.classList.add('rj-link-active');
});

confecciones.addEventListener('click', function(event) {
    

   if (ultimaOpcionSeleccionada) {
       ultimaOpcionSeleccionada.classList.remove('rj-link-active');
   }

   miVariable = "confecciones";

   ultimaOpcionSeleccionada = confecciones;

   confecciones.classList.add('rj-link-active');
});


//cuando se selecione un link diferente se debe quitar la clase del link 
//anterior y ponerselo al pulsado