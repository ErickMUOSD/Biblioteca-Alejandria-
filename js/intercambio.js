let idUserGlobal;

disableInputs(true)
$("form#form-new-book").submit(function (e) {
    var precio;
    e.preventDefault();
    console.log($('#precio').val());
    precio = $('#precio').val();
    console.log(typeof precio)
    $.getJSON("intercambio_libros_disponibles.php", { precio_lib: precio })
        .done(function (json) {
            json.data.forEach(function (values) {
                console.log(values['id_libro'])
                $("#avaliable-books").append("<option value='" + values['id_libro'] + "' " + ">" + values['titulo'] + "</option>")
            });

        })
        .fail(function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        });

    disableInputs(false)

});

$("form#form-user").submit(function (e) {

    e.preventDefault();

    // var form = $("#form-user");
    // var formData = new FormData(form);
    var form = $('#form-user')[0];
    var formData = new FormData(form);

    $.ajax({
        type: "POST",
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        url: "prestamo_checar_usuario.php",
        success: function (response) {



            if (response.data.id_usuario != 0) {
                $("#alert").addClass("d-flex  flex-row bd-highlight");
                $("#alert-icon-back").css("background-color", "#3A833C")
                $("#alert-icon-back").addClass("bi bi-check-lg");
                $("#alert-text").css("background-color", "#4CB050")
                $("#alert-text").text("Usuario encontrado.")
                //añadir enable ticket
                idUserGlobal = response.data.id_usuario;

            } else {

                $("#alert").addClass("d-flex  flex-row  bd-highlight");
                $("#alert-icon-back").css("background-color", " #970001")
                $("#alert-icon-back").addClass("bi bi-x-lg");
                $("#alert-text").css("background-color", "#D60000")
                $("#alert-text").text("Usuario no encontrado Intenta de nuevo.")
            }

        }
    });


});

$("#btn-prestamo").click(function () {
    var id_libro_llevar = $('#avaliable-books option:selected').val()
    var form = $('#form-new-book')[0];
    var formData = new FormData(form);
    formData.append('id_libro_llevar', id_libro_llevar);
    formData.append('id_usuario', idUserGlobal);



    $.ajax({
        type: 'POST',
        cache: false,
        processData: false,  // Important!
        contentType: false,
        url: 'intercambio_realizar.php',
        data: formData,
        success: function (response) {
            console.log("SUCCESS : " + response);

        },
        error: function (response) {
            console.log("ERROR : " + response);
        }
    });
});
function disableInputs(formEnable) {

    // $("#form-direction").find("input").prop('disabled', formEnable);
    // $("#form-direction").find("select").prop('disabled', formEnable);
    // $("#form-direction").find("button").prop('disabled', formEnable);
    $("#avaliable-books").prop('disabled', formEnable);
}