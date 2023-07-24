<?php
require_once 'phpqrcode-master/qrlib.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene la cantidad enviada desde el formulario
    $cantidad = $_POST['cantidad'];

    // Obtiene el último número de encuestador utilizado
    $sqlLastEncuestador = "SELECT MAX(CAST(SUBSTRING(titulo, 12)AS UNSIGNED)) AS ultimo_encuestador FROM encuestas";
    $resultLastEncuestador = $conn->query($sqlLastEncuestador);
    $rowLastEncuestador = $resultLastEncuestador->fetch_assoc();
    $ultimoEncuestador = $rowLastEncuestador['ultimo_encuestador'];

    if ($ultimoEncuestador === null) {
        $numeroEncuestador = 1;
    } else {
        $numeroEncuestador = $ultimoEncuestador + 1;
    }

    // Genera la cantidad especificada de códigos QR
    for ($i = 0; $i < $cantidad; $i++) {
        // Genera un UUID único para cada código QR
        $uuid = uniqid();

        // URL de destino donde se redirigirá al escanear el código QR
        $urlDestino = "encuesta.php";

        // Genera el enlace completo para el código QR
        $texto = "https://edguzmanportafolio.000webhostapp.com/" . $urlDestino . "?uuid=" . $uuid;

        // Ruta donde se guardará el archivo de imagen del código QR
        $archivo_salida = "qrimages/codigo_qr_" . $uuid . ".png";

        // Tamaño del código QR
        $tamaño = 5;

        // Nivel de corrección de errores
        $correccion_errores = 'H';

        // Genera el código QR y guarda la imagen
        QRcode::png($texto, $archivo_salida, $correccion_errores, $tamaño);

        // Guarda la información en la base de datos
        $titulo = "Encuestador " . $numeroEncuestador;
        $codigo_qr = $archivo_salida;
        $activo = 1;

        // Prepara la consulta SQL
        $sql = "INSERT INTO encuestas (titulo, codigo_qr, activo, escaneado) VALUES ('$titulo', '$codigo_qr', $activo, 0)";

        // Ejecuta la consulta
        if ($conn->query($sql) !== TRUE) {
            echo "Error al guardar la encuesta: " . $conn->error;
            exit;
        }

        $numeroEncuestador++;
    }

    echo "Se generaron $cantidad códigos QR exitosamente.";
}

// Verifica si se ha enviado un UUID en la URL
if (isset($_GET['uuid'])) {
    $uuid = $_GET['uuid'];

    // Verifica y actualiza el campo "escaneado" de la encuesta correspondiente al UUID recibido
    $sqlUpdate = "UPDATE encuestas SET escaneado = 1 WHERE codigo_qr LIKE '%codigo_qr_$uuid%.png' AND activo = 1 AND escaneado = 0";
    $result = $conn->query($sqlUpdate);

    if ($result && $conn->affected_rows > 0) {
        echo "El código QR se ha escaneado correctamente.";
    } else {
        echo "Error: El código QR no se puede escanear o ya ha sido utilizado.";
    }
}

// Cierra la conexión
$conn->close();
?>
