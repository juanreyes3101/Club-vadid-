<?php
// Datos de conexión
$host = "localhost";
$user = "root"; // o el usuario de tu hosting
$pass = "";     // contraseña (vacía si usas XAMPP)
$dbname = "club_vadid";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

// Insertar en la base de datos
$sql = "INSERT INTO inscripciones (nombre, apellido, correo, telefono)
        VALUES ('$nombre', '$apellido', '$correo', '$telefono')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('¡Inscripción enviada con éxito!');
        window.location.href='../inscripcion.html';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
