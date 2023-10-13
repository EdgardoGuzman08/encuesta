// Obtener el checkbox "Otros" y el textarea
const checkboxOtros = document.getElementById("Otros_hardware");
const textareaOtros = document.getElementById("textarea_otros");

// Agregar un evento de clic al checkbox "Otros"
checkboxOtros.addEventListener("click", function () {
    // Si el checkbox "Otros" está seleccionado, mostrar el textarea; de lo contrario, ocultarlo.
    if (checkboxOtros.checked) {
        textareaOtros.style.display = "block";
    } else {
        textareaOtros.style.display = "none";
    }
});

const checkboxOtros2 = document.getElementById("Conexion_Otros");
const textareaOtros2 = document.getElementById("textarea_otros_condespues");

// Agregar un evento de clic al checkbox "Otros"
checkboxOtros2.addEventListener("click", function () {
    // Si el checkbox "Otros" está seleccionado, mostrar el textarea; de lo contrario, ocultarlo.
    if (checkboxOtros2.checked) {
        textareaOtros2.style.display = "block";
    } else {
        textareaOtros2.style.display = "none";
    }
});

const checkboxOtros3 = document.getElementById("mantenimiento_sw_otros");
const textareaOtros3 = document.getElementById("textarea_otros_mantosw");

// Agregar un evento de clic al checkbox "Otros"
checkboxOtros3.addEventListener("click", function () {
    // Si el checkbox "Otros" está seleccionado, mostrar el textarea; de lo contrario, ocultarlo.
    if (checkboxOtros3.checked) {
        textareaOtros3.style.display = "block";
    } else {
        textareaOtros3.style.display = "none";
    }
});