let idBookGlobal, idEditorialGlobal, idCategoryPost, idEditorialPost, chooseFilePost;
//call function to fill table
loadData();
// call event on click in any row in the table
$(document).on("click", "tbody>tr", function () {
    let currentIdCategory, currentIdEditorial;
    idBookGlobal = $(this).attr('id')
    currentIdCategory = parseInt($(this).find("td:eq( 11 )").text(), 10);
    currentIdEditorial = parseInt($(this).find("td:eq( 10 )").text(), 10)
    chooseFilePost = 1


    getCategoryandEditorial(currentIdCategory, currentIdEditorial)
    getDataToVerticalPage(idBookGlobal);
    animationFormOn();
});
// $('#categoria_libro').change(function () {
//     idCategoryPost = $(this).val()
// });
// $('#editorial_libro').change(function () {

//     idEditorialPost = $(this).val()
// });


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
    // idCategoryGlobal = ''
    // idEditorialGlobal = ''

}
function loadData() {

    $.getJSON("libros_datos.php", { cache: false }, function (data) {

        data.data.forEach(function (values) {
            $("#tbody").append("<tr id=" + values['id_libro'] +
                " class='tr-style'> <td><img src='images/"+values['foto']+
                "' ></td>  <td class='align-middle' >" + values['titulo'] +
                "</td> <td class='align-middle' >" + values['autor'] +
                "</td> <td class='align-middle' >" + values['idioma'] +
                "</td> <td class='align-middle'>" + values['descripcion'] +
                "</td> <td class='align-middle' >" + values['numero_paginas'] +
                "</td>  <td class='align-middle'>" + values['anio_edicion'] +
                "</td> <td class='align-middle'>" + values['disponible_para'] +
                "</td>  <td class='align-middle' >" + values['precio'] +
                "</td>  <td class='align-middle' >" + values['cantidad_libros'] +
                "</td> <td class='hidden-id' name='hidden-editorial' id='id_editorial'>" + values['id_editorial'] + " </td> " +
                "</td> <td class='hidden-id' id='id_categoria'>" + values['id_categoria'] + " </td> " +
                "</tr> ");


        });

    });
}

function getDataToVerticalPage(id) {

    $.ajax({
        type: 'GET',
        url: 'libros_datos_vertical.php',
        data: { id: id },
        dataType: 'json',
        cache: false,
        success: function (response) {
            $("#preview-foto").attr("src", "images/"+response.data[0].foto);
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

    chooseFilePost = 2
    animationFormOn();
    getCategoryandEditorial()
    // $(this).find("td:eq( 11 )").text()
    $("#categoria_libro").val($("#categoria_libro option:first").val());

    //pass to insercion the first id from tr

}
function clearInputForm() {
    $('#form').find('input:text, textarea, input:file, img')
        .each(function () {
            $(this).val('');
        });
    $("#categoria_libro").find("option").remove()
    $("#editorial_libro").find("option").remove()
}

function updateBook() {

    var form = $('#form')[0];
    var formData = new FormData(form);
    formData.append('id',idBookGlobal);
    $.ajax({
        type: 'POST',
        cache: false,
        processData: false,  // Important!
        contentType: false,
        url: chooseFilePost == 1 ?'libros_actualizar.php': 'libros_insertar.php',
        data: formData,
        success: function (response) {
            console.log("SUCCESS : " + response);
            animationFormOff()
        },
        error: function (response) {
            console.log("ERROR : " + response);
        }
    });

}
function getCategoryandEditorial(currentIdCategory, currentIdEditorial) {
    let selected = '';
    $.getJSON("categorias_libro.php", { cache: false }, function (data) {
        data.data.forEach(function (values) {
            selected = (currentIdCategory === values['id_categoria'] ? "selected" : " ")
            $("#categoria_libro").append("<option value='" + values['id_categoria'] + "' " + selected + ">" + values['nombre_categoria'] + "</option>")
        });
    });

    $.getJSON("libro_editorial.php", { cache: false }, function (data) {
        data.data.forEach(function (values) {
            selected = (currentIdEditorial === values['id_editorial'] ? "selected" : " ")
            $("#editorial_libro").append("<option value='" + values['id_editorial'] + "' " + selected + ">" + values['nombre_editorial'] + "</option>")
        });
    });
}

function previewFile() {
    var preview = document.querySelector('img');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
