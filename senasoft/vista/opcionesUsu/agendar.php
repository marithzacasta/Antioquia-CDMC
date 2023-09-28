<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manzana</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mooli&family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/styleMenuAdmin.css">
</head>
<body class="fondo">
<!-- VENTANA EMERGENTE DEL AGENDAMIENTO -->

<div class="edit2-manz cont-manz">

        <form class="form-edit" action="" method="put">
            <h1>Agendar</h1>
           
            <br><input type="text" class="nombre" name="texto1" placeholder="Ingrese la manzana"> <br>
            <input type="time" class="nombre" name="texto2" placeholder="Ingrese la hora"> <br>
            <input type="date" class="nombre" name="texto3" placeholder="Ingrese la fecha"> <br>

            <input type="button" value="Agendar" class="btn-edit">
            <input type="button" value="Eliminar" class="btn-edit">
            <input type="button" value="Actualizar" class="btn-edit">

        </form>

        </div>

</body>
</html>