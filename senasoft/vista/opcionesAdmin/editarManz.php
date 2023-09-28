<?php
$texto1 = $_GET['texto1'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/manzana.php?texto1='.$texto1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)){
 echo curl_error($ch);
}else{
$datos = json_decode($response, true);
}

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/municipio.php?page=1');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
$response2 = curl_exec($ch2);

if(curl_errno($ch2)){
 echo curl_error($ch2);
}else{
$datos2 = json_decode($response2, true);
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
<div class="edit2-manz cont-manz">
        <form class="form-edit" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/manzana.php" method="put">
            <h1>Editar</h1>
            <select class="nombre" name="texto1" id="s1">
            <?php
            foreach($datos2 as $ver2):
            ?>
            <option value="<?php echo $ver2["idMunicipio"]; ?>"><?php  echo $ver["nombreMunicipio"]; ?></option>
            <?php
            endforeach;
            ?>
            </select><br>
            <?php
            foreach($datos as $ver):
            ?>
            <input class="nombre" type="text" name="texto2" value="<?php echo $ver["nombreManzana"]; ?>" placeholder="Ingrese el nombre de la Manzana"><br>
            <input class="nombre" type="text" name="texto3" value="<?php echo $ver["localidad"]; ?>" placeholder="Ingrese la localidad de la Manzana"><br>
            <input class="nombre" type="text" name="texto4" value="<?php echo $ver["direccion"]; ?>" placeholder="Ingrese la dirección de la Manzana"><br>
            <br><input type="submit" value="Editar" id="btn-edit2-manz" class="btn-edit">
            <form class="form-edit" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/manzana.php" method="DELETE">
                 <br><input type="submit" value="Eliminar" id="btn-edit2-mun" class="btn-edit">
                 <input  type="hidden" name="id" id="id" value="<?php echo $ver["idManzana"]; ?>">
                 <?php
            endforeach;
            ?>
             </form>
        </form>
    </div>
</body>
</html>