<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto1 = $_POST["texto1"];
    $texto2 = $_POST["texto2"];
    $texto3 = $_POST["texto3"];
    $texto4 = $_POST["texto4"];
    $texto5 = $_POST["texto5"];
    $texto6 = $_POST["texto6"];
    $texto7 = $_POST["texto7"];
    $texto8 = $_POST["texto8"];

    $api_url = 'http://localhost/AntioquiaCentrodeDise%C3%B1oyManofacturadelCuero3/senasoft1/apisenasoft/controlador/usuario.php?idUsuario=1';
    $data = array('texto1' => $texto1, 'texto2' => $texto2, 'texto3' => $texto3, 'texto4' => $texto4, 'texto5' => $texto5, 'texto6' => $texto6, 'texto7' => $texto7, 'texto8' => $texto8);

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
    <title>Document</title>
</head>
<body>

    <form action="http://localhost/AntioquiaCentrodeDise%C3%B1oyManofacturadelCuero3/senasoft1/apisenasoft/controlador/usuario.php?idUsuario=1" method="post">
        <div class="editar_cuenta">
        <i class="fa fa-remove"></i>
           <br>
            <h1>Editar</h1>
            <span>Nombre:</span>
            <input type="text" class="name" name="texto1">
            <span>Apelliddo:</span>
            <input type="text" class="surname" name="texto2">
            <span>Documento:</span>
            <input type="text" class="id" name="texto3">
            <span>telefono:</span>
            <input type="text" class="phone" name="texto4">
            <span>Correo:</span>
            <input type="email" class="email" name="texto5">
            <span>Ciudad :</span>
            <input type="text" class="city" name="texto6">
            <span>Dirrecion:</span>
            <input type="adress" class="adress" name="texto7">
            <span>Ocupacion:</span>
            <input type="text" class="email" name="texto8">

            <select name="" id="">
                <option value=""></option>
            </select>
            <?php
                if (isset($response_code)) {
                    echo '<p class="error-message">' . $response_code . '</p>';
                }
            ?>
            <input type="submit" value="Editar" class="button">
        
        </div>

    </form>
</body>
</html>