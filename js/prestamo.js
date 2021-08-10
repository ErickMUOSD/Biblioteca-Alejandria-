
let idUserGlobal, totalGlobal, idBook;
buttonsState(true);
setDate()


$(document).ready(function () {
    calculatePrice()
});

function buttonsState(formEnable) {

    $("#form-direction").find("input").prop('disabled', formEnable);
    $("#form-direction").find("select").prop('disabled', formEnable);
    $("#form-direction").find("button").prop('disabled', formEnable);
    $("#btn-prestamo").prop('disabled', formEnable);
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
                $("#alert-icon-back").addClass("bi bi-check-lg");
                $("#alert-text").css("background-color", "#4CB050")
                $("#alert-text").text("Usuario encontrado. Llena el formulario de dirección.")
                buttonsState(false);
                idUserGlobal = response.data.id_usuario;

            } else {
                
                $("#alert").addClass("d-flex  flex-row  bd-highlight");
                $("#alert-icon-back").css("background-color", " #970001")
                $("#alert-icon-back").addClass("bi bi-x-lg");
                $("#alert-text").css("background-color", "#D60000")
                $("#alert-text").text("Opsss... No pudimos encontrar al usuario. Intenta de nuevo.")
            }

        }
    });


});

$(function () {
    $('#estado').change(function () {
        console.log($(this).val())
        $.getJSON('municipios.php', {
            estado_id: $(this).val()
        }, function (data, textStatus, jqXHR) {
            console.log(data.data);
            var municipios = $('#municipio');
            municipios.html('<option value="">Selecciona</option>')
            data.data.forEach(function (v, i) {
                // console.log(v);
                municipios.append(new Option(v['municipio'], v['id_municipio']));
            });
        });
    });
});
$("#btn-prestamo").click(function () {

    var form = $('#form-direction')[0];
    var formData = new FormData(form);
    formData.append('id_usuario', idUserGlobal);
    formData.append('total', totalGlobal)
    formData.append('id_libro', $('#id-book').text())
    console.log(idUserGlobal)

    $.ajax({
        type: 'POST',
        cache: false,
        processData: false,  // Important!
        contentType: false,
        url: 'prestamo_realizar.php',
        data: formData,
        success: function (response) {
            console.log("SUCCESS : " + response);

        },
        error: function (response) {
            console.log("ERROR : " + response);
        }
    });
});
function setDate() {
    var oneMonthLater;
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var mm_1 = String(today.getMonth() + 2).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    oneMonthLater = yyyy + '-' + mm_1 + '-' + dd;
    $("#current-date").text(today)
    $("#date-one-month").text(oneMonthLater)
}


function calculatePrice() {

    setTimeout(function () {
        let precio = $("#price-modal").text();
        let precioXDia = precio * 0.05;
        let total = precioXDia * 30;

        $('#precio-x-dia').text(precioXDia)
        $('#total').text(total)
        totalGlobal = total;

    }, 2000)

}

// $("#numero_interior").hover(function(){
//     var exampleEl = document.getElementById('#numero_interior')
//     var popover = new bootstrap.Popover(exampleEl)
// });