let idBook;
let idCategory;
let idBookEditorial;
//call function to fill table
loadData();
// call event on click in any row in the table
$(document).on("click", "tbody>tr", function () {

    idBook = $(this).attr('id')
    idCategory = parseInt($(this).find("td:eq( 10 )").text(), 10)
    idBookEditorial = parseInt($(this).find("td:eq( 11 )").text(), 10);

    getDataToVerticalPage(idBook);
    animationFormOn();
});
$('#categoria_libro').change(function () {
    console.log($(this).val())
});
function animationFormOn() {
    document.getElementById("overlay-page").style.display = "block";
    document.getElementById("overlay-page").className = "overlay-page-style";
    document.getElementById("vertical-page").className = "vertical-page-style";
    document.getElementById("vertical-page").style.display = "block";
    document.getElementById("tbody").className = "disable-hover";


}
function animationFormOff() {
    clearInputForm()
    document.getElementById("vertical-page").style.display = "none";
    document.getElementById("vertical-page").classList.remove("vertical-page-style")
    document.getElementById("overlay-page").style.display = "none";
    document.getElementById("tbody").classList.remove("disable-hover");

}
function loadData() {
    $.getJSON("libros_datos.php", { cache: false }, function (data, textStatus, jqXHR) {
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
                "</td>  <td class='align-middle' >" + values['cantidad_libros'] +
                "</td> <td class='hidden-id' id='id_editorial'>" + values['id_editorial'] + " </td> " +
                "</td> <td class='hidden-id' id='id_categoria'>" + values['id_categoria'] + " </td> " +
                "</tr> ");


        });

    });
}

function getDataToVerticalPage(id) {
    let selected = '';
    $.getJSON("categorias_libro.php", { cache: false }, function (data) {
        data.data.forEach(function (values) {
            selected = (idCategory === values['id_categoria'] ? "selected" : "")
            $("#categoria_libro").append("<option value='" + values['id_categoria'] + "' " + selected + ">" + values['nombre_categoria'] + "</option>")
        });
    });

    $.getJSON("editorial_libro.php", { cache: false }, function (data) {
        data.data.forEach(function (values) {
            selected = (idCategory === values['id_editorial'] ? "selected" : "")
            $("#editorial_libro").append("<option value='" + values['id_editorial'] + "' " + selected + ">" + values['nombre_editorial'] + "</option>")
        });
    });
    $.ajax({
        type: 'GET',
        url: 'libros_datos_vertical.php',
        data: { id: id },
        dataType: 'json',
        cache: false,
        success: function (response) {

            $("#titulo").val(response.data[0].titulo);
            $("#autor").val(response.data[0].autor);
            $("#idioma").val(response.data[0].idioma);
            $("#descripcion").val(response.data[0].descripcion);
            $("#numero_paginas").val(response.data[0].numero_paginas);
            $("#anio_edicion").val(response.data[0].anio_edicion);
            $("#cantidad_libros").val(response.data[0].cantidad_libros);
            $("#precio").val(response.data[0].precio);
            response.data[0].disponible_para === "Préstamo" ? $("#disponibilidad1").prop('checked', true) : $("#disponibilidad2").prop('checked', true);
            response.data[0].estatus_libro === "Activo" ? $("#estatus1").prop('checked', true) : $("#estatus2").prop('checked', true)
        }
    });



}
function addBook() {
    //we add book
    //fill input and post the data
    //we will use a new php file  s
    animationFormOff();


}
function clearInputForm() {
    $('#form').find('input:text, textarea')
        .each(function () {
            $(this).val('');
        });
    $("#categoria_libro").find("option").remove()
    $("#editorial_libro").find("option").remove()
}

function updateBook() {
    $.ajax({
        type: 'POST',
        url: 'libros_actualizar.php',
        data: {
            id: idBook,
            titulo: $("#titulo").val(),
            autor: $("#autor").val(),
            idioma: $("#idioma").val(),
            descripcion: $("#descripcion").val(),
            numero_paginas: $("#numero_paginas").val(),
            anio_edicion: $("#anio_edicion").val(),
            cantidad_libros: $("#cantidad_libros").val(),
            precio: $("#precio").val(),
            cantidad_libros: $("#cantidad_libros").val(),
            disponible_para: $("input[name='disponible']:checked").val(),
            estatus_libro: $("input[name='estatus']:checked").val()
        },
        cache: false,
        success: function (response) {
            clearInputForm()
            animationFormOff();
        }
    });

}