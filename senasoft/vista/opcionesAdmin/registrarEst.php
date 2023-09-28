<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreEstablecimiento = $_POST["texto1"];
    $responsable = $_POST["texto2"];
    $direccion = $_POST["texto3"];

    $api_url = 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/establecimiento.php';
    $data = array('texto1' => $nombreEstablecimiento, 'texto2' => $responsable, 'texto3' => $direccion);

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Verificar la respuesta de la API y realizar acciones en consecuencia
    if ($http_status == 200) {
        // Autenticación exitosa, redirigir o mostrar un mensaje de éxito
        echo $http_status;
        // header("Location: welcome.php");
        // exit;
    } else {
        // Autenticación fallida, mostrar un mensaje de error
        $error_message = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manzana</title>
    <link rel="stylesheet" href="../css/styleMenuAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mooli&family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

</head>
<body class="fondo">
<div class="create-est cont-est">
        <form class="form-create" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/establecimiento.php" method="post">
            <h1>Registrar</h1>
            <input class="nombre" type="text" name="texto1" placeholder="Ingrese el nombre del Establecimiento"><br>
            <input class="nombre" type="text" name="texto2" placeholder="Ingrese el nombre del responsable"><br>
            <input class="nombre" type="text" name="texto3" placeholder="Ingrese la dirección"><br>
            <br><input type="submit" class="btn-create"  value="Registrar">
        </form>
    </div>
</body>
</html>