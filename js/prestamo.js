

buttonsState(true);
//setDate()


function buttonsState(formEnable) {

    $("#form-direction").find("input").prop('disabled', formEnable);
    $("#form-direction").find("select").prop('disabled', formEnable);
    $("#form-direction").find("button").prop('disabled', formEnable);
}

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
                $("#alert-text").css("background-color", "#4CB050")
                $("#alert-text").text("Usuario encontrado. Llena el formulario de dirección.")
            } else {
                $("#alert").addClass("d-flex  flex-row  bd-highlight");
                $("#alert-icon-back").css("background-color", " #970001")
                $("#alert-text").css("background-color", "#D60000")
                $("#alert-text").text("Opsss... No pudimos encontrar al usuario. Intenta de nuevo.")
            }

        }
    });


});
function setDate() {
    var oneMonthLater;
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var mm_1 = today.getMonth() + 1
    var yyyy = today.getFullYear();
    today = dd + '/' + mm + '/' + yyyy;
    oneMonthLater = dd + '/' + (mm_1) + '/' + yyyy;
    $("#current-date").text(today)
    $("#date-one-month").text(oneMonthLater)
}