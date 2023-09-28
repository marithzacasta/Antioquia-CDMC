<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoDocumento = $_POST["texto11"];
    $documento = $_POST["texto12"];
    $nombres = $_POST["texto3"];
    $apellidos = $_POST["texto4"];
    $telefono = $_POST["texto5"];
    $correo = $_POST["texto6"];
    $contrasena = $_POST["texto7"];
    $ciudad = $_POST["texto8"];
    $direccion = $_POST["texto9"];
    $ocupacion = $_POST["texto10"];
    $rol = $_POST["texto13"];

    $api_url = 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/usuario.php';
    $data = array('texto11' => $tipoDocumento, 'texto12' => $documento,'texto3' => $nombres, 'texto4' => $apellidos,'texto5' => $telefono, 'texto6' => $correo,'texto7' => $contrasena, 'texto8' => $ciudad,'texto9' => $direccion, 'texto10' => $ocupacion , 'texto13' => $rol);

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
<div class="create-usuario cont-user">
        <form class="ult-ch form-create form-user" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/usuario.php" method="post">
            <p>Registrar</p>
            <div class="reg1">
            <br><input type="text" name="texto11" class="inp-reg nombre" id="ipt-nom" placeholder="Ingrese los nombres" required><br>
            <br><input type="text" name="texto12" class="inp-reg nombre" id="ipt-ape" placeholder="Ingrese los apellidos" required><br>
            <br><input type="text" name="texto3" class="inp-reg nombre" id="ipt-doc" placeholder="Ingrese el tipo de documento" required><br>
            <br><input type="text" name="texto4" class="inp-reg nombre" id="ipt-doc" placeholder="Ingrese el documento" required><br>
            <br><input type="text" name="texto5" class="inp-reg nombre" id="ipt-tel" placeholder="Ingrese el teléfono" required><br>
            </div>
            <div class="reg2">
            <br><input type="text" name="texto6" class="inp-reg nombre" id= "ipt-ciu" placeholder="Ingrese el ciudad" required><br>
            <br><input type="text" name="texto7" class="inp-reg nombre" id="ipt-dir" placeholder="Ingrese la dirección" required><br>
            <br><input type="text" name="texto8" class="inp-reg nombre" id="ipt-ocu" placeholder="Ingrese la ocupación" required><br>
            <br><input type="email" name="texto9" class="inp-reg nombre" id="ipt-correo" placeholder="Ingrese el correo" required><br>
            <br><input type="password" name="texto10" class="inp-reg nombre" id="ipt-contra" placeholder="Ingrese la contrasena" required><br>
            <br><input type="text" name="texto13" class="inp-reg nombre" id="ipt-contra" placeholder="Ingrese el rol" required><br>
            </div>
            <br><input class="btn-create" type="submit"  value="Registrar" id="btn-edit2-usuario">
        </form>
    </div>
</body>
</html>