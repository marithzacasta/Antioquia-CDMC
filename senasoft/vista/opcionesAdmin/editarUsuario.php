<?php
$texto1 = $_GET['texto1'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/usuario.php?texto1='.$texto1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)){
 echo curl_error($ch);
}else{
$datos = json_decode($response, true);
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
        <form class="form-create form-user" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/usuario.php" method="PUT">
            <h1>Editar</h1>
            <?php
            foreach($datos as $ver):
            ?>
            <div class="reg1">
            <br><input type="text" name="texto11" class="inp-reg nombre" id="ipt-nom" value="<?php echo $ver["nombres"]; ?>" placeholder="Ingrese los nombres" required><br>
            <br><input type="text" name="texto12" class="inp-reg nombre" id="ipt-ape" value="<?php echo $ver["apellidos"]; ?>" placeholder="Ingrese los apellidos" required><br>
            <br><input type="text" name="texto3" class="inp-reg nombre" id="ipt-doc" value="<?php echo $ver["tipoDocumento"]; ?>" placeholder="Ingrese el tipo de documento" required><br>
            <br><input type="text" name="texto4" class="inp-reg nombre" id="ipt-doc" value="<?php echo $ver["documento"]; ?>" placeholder="Ingrese el documento" required><br>
            <br><input type="text" name="texto5" class="inp-reg nombre" id="ipt-tel" value="<?php echo $ver["telefono"]; ?>" placeholder="Ingrese el teléfono" required><br>
            </div>
            <div class="reg2 div-edit">
            <br><input type="text" name="texto6" class="inp-reg nombre" id= "ipt-ciu" value="<?php echo $ver["ciudad"]; ?>" placeholder="Ingrese el ciudad" required><br>
            <br><input type="text" name="texto7" class="inp-reg nombre" id="ipt-dir" value="<?php echo $ver["direccion"]; ?>" placeholder="Ingrese la dirección" required><br>
            <br><input type="text" name="texto8" class="inp-reg nombre" id="ipt-ocu" value="<?php echo $ver["ocupacion"]; ?>" placeholder="Ingrese la ocupación" required><br>
            <br><input type="email" name="texto9" class="inp-reg nombre" id="ipt-correo" value="<?php echo $ver["correo"]; ?>" placeholder="Ingrese el correo" required><br>
            <br><input type="password" name="texto10" class="inp-reg nombre" id="ipt-contra" value="<?php echo $ver["contrasena"]; ?>" placeholder="Ingrese la contrasena" required><br>
            </div>
            <br><input class="btn-edit" type="submit" value="Editar" id="btn-edit">
            <form class="form-edit" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/usuario.php" method="DELETE">
                 <br><input type="submit" value="Eliminar" id="btn-edit2-mun" class="btn-edit">
                 <input  type="hidden" name="id" id="id" value="<?php echo $ver["idUsuario"]; ?>">
            </div>
            <?php
            endforeach;
            ?>
        </form>
    </div>
</body>
</html>