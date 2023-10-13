document.querySelector('.hora-inicio').addEventListener('change', validarHoras);
document.querySelector('.hora-final').addEventListener('change', validarHoras);

function validarFechas() {
    var fechaInicio = new Date(document.getElementById('fecha-inicio').value);
    var fechaFinal = new Date(document.getElementById('fecha-final').value);

    if (fechaFinal < fechaInicio) {
        alert('La fecha final no puede ser anterior a la fecha de inicio');
        document.getElementById('fecha-final').value = '';
    }
}

function validarHoras() {
    var fechaInicio = new Date(document.getElementById('fecha-inicio').value);
    var fechaFinal = new Date(document.getElementById('fecha-final').value);
    var horaInicio = document.querySelector('.hora-inicio').value;
    var horaFinal = document.querySelector('.hora-final').value;

    // Validar si la fecha final es menor que la fecha de inicio
    if (fechaFinal < fechaInicio) {
        // Mostrar un mensaje de error o realizar alguna acción
        console.log("Error: La fecha final no puede ser menor que la fecha de inicio");
        return;
    }

    // Si las fechas son iguales, validar las horas
    if (fechaFinal.getTime() === fechaInicio.getTime()) {
        var inicioHoras = parseInt(horaInicio.split(':')[0]);
        var inicioMinutos = parseInt(horaInicio.split(':')[1]);
        var finHoras = parseInt(horaFinal.split(':')[0]);
        var finMinutos = parseInt(horaFinal.split(':')[1]);

        // Convertir la hora final de AM/PM a formato de 24 horas
        if (finHoras === 12 && horaFinal.includes('AM')) {
            finHoras = 0;
        } else if (finHoras !== 12 && horaFinal.includes('PM')) {
            finHoras += 12;
        }

        // Validar si la hora final es menor o igual que la hora de inicio en el mismo día
        if ((finHoras < inicioHoras || (finHoras === inicioHoras && finMinutos < inicioMinutos)) && !esDiaSiguiente(fechaInicio, fechaFinal)) {
            // Mostrar un mensaje de error o realizar alguna acción
            console.log("Error: La hora final no puede ser menor que la hora de inicio en el mismo día");
            return;
        }
    }

    // Si pasa todas las validaciones, no se produce ningún error
    console.log("Las fechas y horas son válidas");
}

function esDiaSiguiente(fechaInicio, fechaFinal) {
    var siguienteDia = new Date(fechaInicio);
    siguienteDia.setDate(siguienteDia.getDate() + 1);

    return siguienteDia.getDate() === fechaFinal.getDate() &&
        siguienteDia.getMonth() === fechaFinal.getMonth() &&
        siguienteDia.getFullYear() === fechaFinal.getFullYear();
}

document.getElementById('fecha-inicio').addEventListener('change', calcularDiferenciaYValidarFechas);
document.getElementById('fecha-final').addEventListener('change', calcularDiferenciaYValidarFechas);

function calcularDiferenciaYValidarFechas() {
    calcularDiferencia();
    validarFechas();
}

function calcularDiferencia() {
    var fechaInicio = new Date(document.getElementById('fecha-inicio').value);
    var fechaFinal = new Date(document.getElementById('fecha-final').value);
    var horaInicio = document.querySelector('.hora-inicio').value;
    var horaFinal = document.querySelector('.hora-final').value;

    // Calcular la diferencia de días
    var diferenciaDias = Math.floor((fechaFinal - fechaInicio) / (1000 * 60 * 60 * 24));

    // Obtener las horas y minutos de la hora de inicio
    var inicioHoras = parseInt(horaInicio.split(':')[0]);
    var inicioMinutos = parseInt(horaInicio.split(':')[1]);

    // Obtener las horas y minutos de la hora final
    var finHoras = parseInt(horaFinal.split(':')[0]);
    var finMinutos = parseInt(horaFinal.split(':')[1]);

    // Calcular la diferencia de tiempo en horas y minutos
    var horasPasadas;
    var minutosPasados;

    if (diferenciaDias > 0) {
        // Si hay una diferencia de días, sumar las horas correspondientes
        horasPasadas = (diferenciaDias * 24) + (finHoras - inicioHoras);
    } else {
        horasPasadas = finHoras - inicioHoras;
    }

    minutosPasados = finMinutos - inicioMinutos;

    // Ajustar los minutos si es necesario
    if (minutosPasados < 0) {
        horasPasadas--;
        minutosPasados = 60 + minutosPasados;
    }

    // Mostrar el resultado en el elemento "total-horas" 
    var totalHoras = document.getElementById('total-horas');
    totalHoras.textContent = horasPasadas + " hrs " + minutosPasados + " min.";

     // Mostrar el resultado en el elemento "total-horas"
    var totalHoras = document.getElementById('total-horas-input');
    totalHoras.value = horasPasadas + ":" + minutosPasados// Solo mostrar el valor numérico de las horas 
}


$(document).ready(function() {
    $('.select').select2();
});

document.addEventListener('DOMContentLoaded', function() {
    flatpickr('.datepicker', {
        dateFormat: 'Y/m/d',
        defaultDate: 'today',
    });
});

document.addEventListener('DOMContentLoaded', function() {
    flatpickr('.datepicker', {
        dateFormat: 'Y/m/d',
        defaultDate: 'today',
    });
});

document.addEventListener('DOMContentLoaded', function() {
    flatpickr('.hora-inicio', {
        enableTime: true,
        noCalendar: true,
        time_24hr: true,
        timeFormat: 'h:i'
      // Otras opciones de configuración
    });  
});

document.addEventListener('DOMContentLoaded', function() {
    flatpickr('.hora-final', {
        enableTime: true,
        noCalendar: true,
        time_24hr: true,
        timeFormat: 'h:i'
      // Otras opciones de configuración
    });  
});


