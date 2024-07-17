


document.addEventListener("DOMContentLoaded", function() {
    // Función para obtener parámetros GET de la URL
    function getParameterByName(name) {
        var url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    // Obtener el valor de 'name' desde la URL
    var name = getParameterByName('name');

    // Si se encontró 'name', actualizar el contenido de <h1>
    if (name) {
        document.getElementById('welcome').innerHTML = "Bienvenido " + name;
        // Almacenar el valor de 'name' en una cookie
        document.cookie = "name=" + encodeURIComponent(name) + "; path=/";
    }

    // Si no se encontró 'name' en la URL, intentar recuperarlo de las cookies
    else {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            // Buscar la cookie 'name'
            if (cookie.startsWith('name=')) {
                name = decodeURIComponent(cookie.substring(5));
                document.getElementById('welcome').innerHTML = "Bienvenido " + name;
                break;
            }
        }
    }
});

