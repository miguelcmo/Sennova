<?php 

// Configuración de la carpeta donde se guardarán las imágenes
$targetDir = "images/";  // Asegúrate de que esta carpeta exista y tenga permisos de escritura

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);  // Crea la carpeta si no existe
}

// Nombre del archivo subido
$targetFile = $targetDir . basename($_FILES["upload"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Validar que el archivo sea una imagen
$check = getimagesize($_FILES["upload"]["tmp_name"]);
if ($check !== false) {
    // Intentar mover el archivo a la carpeta de destino
    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
        // Devolver la URL de la imagen en formato JSON
        echo json_encode(["url" => "http://localhost/sennova/appServiserAdmin/web/ckeditor/" . $targetFile]);
    } else {
        // Error al mover el archivo
        http_response_code(500);  // Código de error 500 (Error interno del servidor)
        echo json_encode(["error" => "Error al subir la imagen."]);
    }
} else {
    // El archivo no es una imagen válida
    http_response_code(400);  // Código de error 400 (Solicitud incorrecta)
    echo json_encode(["error" => "El archivo no es una imagen válida."]);
}

?>
