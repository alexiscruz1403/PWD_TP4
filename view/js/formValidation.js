$(document).ready(function() {
    $('#form').validate({
        rules: {
            nroDni:{
                required: true,
                number: true,
                maxlength: 8
            },
            nombre:{
                required: true
            },
            apellido:{
                required: true
            },
            fechaNacimiento:{
                required: true
            },
            telefono:{
                required: true,
                number: true
            },
            domicilio:{
                required: true
            },
            patente:{
                required: true
            },
            marca:{
                required: true
            },
            modelo:{
                required: true,
                number: true
            }
        },
        messages:{
            nroDni:{
                required: "Debe completar este campo",
                number: "Debe ingresar un un numero",
                maxlength: "Debe ingresar 8 digitos o menos"
            },
            nombre:{
                required: "Debe completar este campo",
            },
            apellido:{
                required: "Debe completar este campo",
            },
            fechaNacimiento:{
                required: "Debe completar este campo",
            },
            telefono:{
                required: "Debe completar este campo",
                number: "Debe ingresar un numero"
            },
            domicilio:{
                required: "Debe completar este campo",
            },
            patente:{
                required: "Debe completar este campo",
            },
            marca:{
                required: "Debe completar este campo",
            },
            modelo:{
                required: "Debe completar este campo",
                number: "Debe ingresar un numero"
            }
        },
        errorPlacement: function(error, element) {
            $(element).addClass('invalid');
            $(element).siblings(".helper-text").attr("data-error", error.text());
        }
    });
});