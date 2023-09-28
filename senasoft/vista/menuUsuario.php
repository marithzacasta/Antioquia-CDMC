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

    <link rel="stylesheet" href="./css/styleMenuu.css">
</head>
<body>
   

    <div class="fondo"> 
        <!-- MENU -->
    <nav class="menu">
                <header>
                    <div class="nombres">
                        <h1>USUARIO</h1>
                    </div>
                </header>
                <!-- Lista del menu -->
                <ul class="cont_lista">
                    <a href="opcionesUsu/Agendar.php">
                    <li class="cajas">
                        <span>Agendamiento </span>
                    </li>
                    </a>

                    <a href="opcionesUsu/editarCuenta.php">
                    <li class="cajas">
                        <span>Editar Cuenta</span>
                    </li>
                    </a>
                   
                    <a href="login.php">
                    <li class="cajas">
                        <span>Eliminar Cuenta</span>
                    </li>
                    </a>
                    
                    <a href="login.php"> 
                    <li class="cajas">
                        <span>Cerrar Sesion</span>
                    </li>

                    </a>
                    

                </ul>

            </nav>
         <!-- Contenedor del mapa y buscador -->
        <div class="divisiones">
           
           <div class="cont_buscador">
            <!-- BUSCADOR -->
            <div class="cont_buscador">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Buscar...">
            </div>

            </div>
           
            <!-- MAPA -->
            <div class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15902.971184381824!2d-75.74876654999998!3d4.
                81416665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1695750677388!5m2!1ses!2sco" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

            

        </div>


            
        </div>


    </div>
 

    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
</body>
</html>