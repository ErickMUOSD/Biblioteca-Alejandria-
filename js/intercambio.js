disableInputs(true)
$("form#form-new-book").submit(function (e) {

    e.preventDefault();
    // var form = $("#form-user");
    // var formData = new FormData(form);
    // var form = $('#form-user')[0];
    // var formData = new FormData(form);
   let precio = $('#precio').val();
   console.log(precio)
        
        // $.getJSON("intercambio_libros_disponibles.php", { precio_lib: precio}, { cache: false }, function (data) {
        //     console.log("aaaa"+data)
        //     data.data.forEach(function (values) {
        //         // selected = (currentIdCategory === values['id_categoria'] ? "selected" : " ")
        //         // $("#categoria_libro").append("<option value='" + values['id_categoria'] + "' " + selected + ">" + values['nombre_categoria'] + "</option>")
        //         console.log('naaaaaaaaaaaaaaaaa')
        //     });
        // });
    
        $.ajax({
            type: 'GET',
            url:"intercambio_libros_disponibles.php",
            data: { precio_lib: precio },
            dataType: 'json',
            cache: false,
            success: function (response) {
              console.log(response.data)
            }
        });
       
  
    disableInputs(false)

});
function disableInputs(formEnable){
    
    // $("#form-direction").find("input").prop('disabled', formEnable);
    // $("#form-direction").find("select").prop('disabled', formEnable);
    // $("#form-direction").find("button").prop('disabled', formEnable);
    $("#avaliable-books").prop('disabled', formEnable);
}