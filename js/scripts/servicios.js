$(function () {

    $('#idTipo').change(function (e) {
        e.preventDefault();
        let idTipo = $(this).val();
        let data = {
            id: idTipo,
            accion: 'comboCategorias'
        }

        $.ajax({
            type: "POST",
            url: "controlador.php",
            data: data,
            dataType: "json",
            success: function (response) {
                //console.log(response);
                $('#divCate').html(response);
            }
        });

    });

/*     $(document).on('change', '#idCate', function () {
        let idCate = $(this).val();
        let data = {
            id: idCate,
            accion: 'combo'
        }


    }); */

});