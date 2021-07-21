
//call function to fill table
loadData();
// call event on click in any row in the table
$(document).on("click", "tbody>tr", function () {

    getDataToVerticalPage($(this).attr('id'));
    animationFormOn();
});

function animationFormOn() {
    document.getElementById("overlay-page").style.display = "block";
    document.getElementById("overlay-page").className = "overlay-page-style";
    document.getElementById("vertical-page").className = "vertical-page-style";
    document.getElementById("vertical-page").style.display = "block";
    document.getElementById("tbody").className = "disable-hover";


}
function animationFormOff() {
    document.getElementById("vertical-page").style.display = "none";
    document.getElementById("vertical-page").classList.remove("vertical-page-style")
    document.getElementById("overlay-page").style.display = "none";
    document.getElementById("tbody").classList.remove("disable-hover");
}
function loadData() {
    $.getJSON("libros_datos.php", function (data, textStatus, jqXHR) {
        console.log(data.data)
        data.data.forEach(function (values) {
            $("#tbody").append("<tr id=" + values['id_libro'] +
                " class='tr-style'> <td><img src='images/libro.jpg' '></td>  <td class='align-middle' >" + values['titulo'] +
                "</td> <td class='align-middle' >" + values['titulo'] +
                "</td> <td class='align-middle' >" + values['idioma'] +
                "</td> <td class='align-middle'>" + values['descripcion'] +
                "</td> <td class='align-middle' >" + values['numero_paginas'] +
                "</td>  <td class='align-middle'>" + values['anio_edicion'] +
                "</td> <td class='align-middle'>" + values['disponible_para'] +
                "</td>  <td class='align-middle' >" + values['precio'] +
                "</td>  <td class='align-middle' >" + values['cantidad_libros'] + "</td></tr> ");


        });

    });
}

function getDataToVerticalPage(id) {
    $.ajax({
        type: 'POST',
        url: 'libros_datos_vertical.php',
        data: { id: id },
        dataType: 'json',
        success: function (response) {
            console.log(response.data[0].titulo);
            // $.each(response.d, function (key, value) {
            //     //For example
            //     console.log(key)
            // })
        }
    });
}