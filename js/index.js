

$(document).ready(function () {
    $(function () {
        $('a.btn-get-book ').click(function (e) {
            let isAvaliableBook;
            var btn = $(this);
            $('#img-modal').attr("src", "images/" + btn.data('bs-book-img'));
            $('#title-modal').text(btn.data('bs-title'))
            $('#autor-modal').text(btn.data('bs-book-autor'))
            $('#lenguaje-modal').text(btn.data('bs-book-lenguaje'))
            $('#descripcion-modal').text(btn.data('bs-book-description'))
            $('#numero-paginas-modal').text(btn.data('bs-book-numero_paginas'))
            $('#edition-year-modal').text(btn.data('bs-book-year-edition'))
            $('#disponibility-modal').text(btn.data('bs-book-disponibility'))
            $('#price-modal').text("$" + btn.data('bs-book-price'))
            $('#status-modal').text(btn.data('bs-book-cant'))
            if (btn.data('bs-book-status') == 'Activo') {
                isAvaliableBook = 'El libro está listo para que te lo lleves.'
                $("#avaliable-modal").css("color", "#07ab49");
            } else {
                isAvaliableBook = 'Actualmente el libro está prestado.'
                $("#avaliable-modal").css("color", "#FD1013");
            }
            $('#avaliable-modal').text(isAvaliableBook)



        });
    })

});