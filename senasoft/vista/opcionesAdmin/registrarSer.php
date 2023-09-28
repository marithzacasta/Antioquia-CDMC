<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/categoria.php?page=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)){
 echo curl_error($ch);
}else{
$datos = json_decode($response, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCategoria = $_POST["texto1"];
    $nombreServicio = $_POST["texto2"];
    $descripcion = $_POST["texto3"];

    $api_url = 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/servicio.php';
    $data = array('texto1' => $idCategoria, 'texto2' => $nombreServicio, 'texto3' => $descripcion);

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
<div class="create-ser">
        <form class="form-create" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/servicio.php" method="post">
            <h1>Registrar</h1>
            <select class="nombre" name="texto1" id="s1">
            <?php
            foreach($datos2 as $ver2):
            ?>
            <option value="<?php echo $ver2["idCategoria"]; ?>"><?php  echo $ver["nombreCategoria"]; ?></option>
            <?php
            endforeach;
            ?>
            </select>
            <input class="nombre" type="text" name="texto2" placeholder="Ingrese el nombre del Servicio"><br>
            <input class="nombre" type="text" name="texto3" placeholder="Ingrese la descripción"><br>
            <br><input type="submit" class="btn-create" value="Registrar">
        </form>
    </div>
</body>
</html>