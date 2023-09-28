<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manzana</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styleMenuAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mooli&family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="barra">
        <a class="report" href="">Generar Reporte</a>
    </div>
    <section class="content">
        <div class="opciones">
            <div class="icon"><img src="img/colombia.png" alt=""></div>
            <form id="f1" class="form-create" name="f1" action="opcionesAdmin/editarMun.php" method="GET">
            <p>Municipios</p>
            <input type="text" id="texto1" name="texto1" class="nombre" placeholder="Ingrese el nombre del municipio">    
            <div class="botones"><br>
            <br><a id="btn-create-mun" class="create" href="opcionesAdmin/registrarMun.php">Registrar</a>
                <input type="submit" class="edit" id="b1" name="b1" value="Editar">
              </form>
            </div>
        </div>
        <div class="opciones">
            <div class="icon"><img src="img/categoria.png" alt=""></div>
            <form id="f1" class="form-create" name="f1" action="opcionesAdmin/editarCat.php" method="GET">
            <p>Categorías</p>
            <input type="text" id="texto1" name="texto1" class="nombre" placeholder="Ingrese el nombre de la categoría">    
            <div class="botones"><br>
            <br><a id="btn-create-mun" class="create" href="opcionesAdmin/registrarCat.php">Registrar</a>
                <input type="submit" class="edit" id="b1" name="b1" value="Editar">
              </form>
            </div>
        </div>
        <div class="opciones">
            <div class="icon"><img src="img/apoyo-tecnico.png" alt=""></div>
            <form id="f1" class="form-create" name="f1" action="opcionesAdmin/editarSer.php" method="GET">
            <p>Servicios</p>
            <input type="text" id="texto1" name="texto1" class="nombre" placeholder="Ingrese el nombre del servicio">    
            <div class="botones"><br>
            <br><a id="btn-create-mun" class="create" href="opcionesAdmin/registrarSer.php">Registrar</a>
                <input type="submit" class="edit" id="b1" name="b1" value="Editar">
              </form>
            </div>
        </div>
        <div class="opciones">
            <div class="icon"><img src="img/usuario.png" alt=""></div>
            <form id="f1" class="form-create" name="f1" action="opcionesAdmin/editarUsuario.php" method="GET">
            <p>Municipios</p>
            <input type="text" id="texto1" name="texto1" class="nombre" placeholder="Ingrese el nombre del usuario">    
            <div class="botones"><br>
            <br><a id="btn-create-mun" class="create" href="opcionesAdmin/registrarUsuario.php">Registrar</a>
                <input type="submit" class="edit" id="b1" name="b1" value="Editar">
              </form>
            </div>
        </div>
        <div class="opciones">
            <div class="icon"><img src="img/manzana.png" alt=""></div>
            <form id="f1" class="form-create" name="f1" action="opcionesAdmin/editarManz.php" method="GET">
            <p>Manzanas</p>
            <input type="text" id="texto1" name="texto1" class="nombre" placeholder="Ingrese el nombre de la manzana">    
            <div class="botones"><br>
            <br><a id="btn-create-mun" class="create" href="opcionesAdmin/registrarManz.php">Registrar</a>
                <input type="submit" class="edit" id="b1" name="b1" value="Editar">
              </form>
            </div>
        </div>
        <div class="opciones">
            <div class="icon"><img src="img/mapa.png" alt=""></div>
            <form id="f1" class="form-create" name="f1" action="opcionesAdmin/editarEst.php" method="GET">
            <p>Establecimientos</p>
            <input type="text" id="texto1" name="texto1" class="nombre" placeholder="Ingrese el nombre del Establecimiento">    
            <div class="botones"><br>
            <br><a id="btn-create-mun" class="create" href="opcionesAdmin/registrarEst.php">Registrar</a>
                <input type="submit" class="edit" id="b1" name="b1" value="Editar">
              </form>
            </div>
        </div>
    </section>
    <script src="js/funcionMenuAdmin.js"></script>
</body>
</html>