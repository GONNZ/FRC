$(function () {

    $('#cerrar').click(function (e) {
        e.preventDefault();
        let logout = {
            accion: 'Logout'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: logout,
            dataType: "json",
            success: function (response) {
                window.location.replace("index.php");
            }
        });
    });

    function getRol() {
        let dato = {
            accion: 'rolActual'
        }
        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: dato,
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    }

});