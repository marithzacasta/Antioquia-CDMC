<?php
$texto1 = $_GET['texto1'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/Antioquia-CDMC/apisenasoft/controlador/categoria.php?texto1='.$texto1);
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
<div class="edit2-cat">
        <form class="form-edit" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/categoria.php" method="put">
            <h1>Editar</h1>
            <?php
            foreach($datos as $ver):
            ?>
            <input class="nombre" type="text" name="texto1" value="<?php echo $ver["nombreCategoria"]; ?>" placeholder="Ingrese el nombre de la Categoría"><br>
            <input class="nombre" type="text" name="texto2" value="<?php echo $ver["descripcion"]; ?>" placeholder="Ingrese la descripción"><br>
            <br><input type="submit" value="Editar" id="btn-edit2-cat" class="btn-edit">
            <form class="form-edit" action="http://localhost/Antioquia-CDMC/apisenasoft/controlador/categoria.php" method="DELETE">
                 <br><input type="submit" value="Eliminar" id="btn-edit2-mun" class="btn-edit">
                 <input  type="hidden" name="id" id="id" value="<?php echo $ver["idCategoria"]; ?>">
                 <?php
            endforeach;
            ?>
             </form>
        </form>
    </div>
</body>
</html>