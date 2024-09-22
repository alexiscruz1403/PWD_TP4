$(document).ready(function() {
    $('#form').validate({
        rules: {
            patente: {
                required: true
            },
            dni: {
                required: true,
                number: true,
                maxlength: 8 // Cambia esto si el DNI tiene una longitud diferente
            }
        },
        messages: {
            patente: {
                required: "Debe completar este campo"
            },
            dni: {
                required: "Debe completar este campo",
                number: "Debe ingresar un número válido",
                maxlength: "Debe ingresar 8 dígitos o menos" // Cambia esto si el DNI tiene una longitud diferente
            }
        },
        errorPlacement: function(error, element) {
            $(element).addClass('invalid');
            $(element).siblings(".helper-text").attr("data-error", error.text());
        }
    });
});
