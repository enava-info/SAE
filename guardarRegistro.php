<?php
// Configuración de la base de datos Access
$database_path = "C:\Users\Emilio\OneDrive\Escritorio\SistemaActividadesExtracurriculares\bd\registro.accdb";

// Conexión a la base de datos
$conn = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=$database_path");

if (!$conn) {
    die("Error de conexión: " . $conn->errorInfo());
}

// Obtener datos del formulario
$Usuario = $_POST['Username'];
$nombreActividad = $_POST['NombreActividad'];
$detalleActividad = $_POST['DetalleActividad'];
$FechaActividad = $_POST['FechaActividad'];
$horaInicio = $_POST['horaInicio'];
$horaFin = $_POST['horaFin'];

// Insertar datos en la tabla Horarios
$sql = "INSERT INTO registros (Usuario, nombreActividad, detalleActividad, FechaActividad, horaInicio, horaFin) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$Usuario, $nombreActividad, $detalleActividad, $FechaActividad, $horaInicio, $horaFin])) {
    echo "Registro guardado exitosamente.";
} else {
    echo "Error al guardar el registro.";
}

// Cerrar la conexión
$conn = null;
?>