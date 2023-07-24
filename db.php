<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "encuesta";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

/*<?php
        $servername = "localhost";
        $username = "id20663204_root";
        $password = "Prueba123.";
        $dbname = "id20663204_encuesta";

        // Crea la conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
    ?>
*/

?>



