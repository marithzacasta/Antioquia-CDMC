<?php
require_once '../modelo/respuestas.class.php';
require_once '../modelo/usuario.class.php';

$_respuestas = new respuestas;
$_usuario = new usuario;

//metodo get buscar todo o por codigo
if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaUsuarios = $_Usuario->listaUsuarios($pagina);
        header("Content-Type: application/json");
        echo json_encode($listaUsuarios);
        http_response_code(200);
    }else{  
    if(isset($_GET['idUsuario'])){
        $idUsuario = $_GET['idUsuario'];
        $datosProducto= $_usuario->obtenerUsuarios($idUsuario);
        header("Content-Type: application/json");
        echo json_encode($datosProducto);
        http_response_code(200);
    }
    }
}
// metodo post para guardar 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $postBody = json_encode(array(  
        "texto11" => $_POST["texto11"],
        "texto12" =>  $_POST["texto12"],
        "texto3" => $_POST["texto3"],
        "texto4" =>  $_POST["texto4"],
        "texto5" => $_POST["texto5"],
        "texto6" =>  $_POST["texto6"],
        "texto7" => $_POST["texto7"],
        "texto8" =>  $_POST["texto8"],
        "texto9" => $_POST["texto9"],
        "texto10" =>  $_POST["texto10"],
        "texto13" => $_POST["texto13"]

    ));
    //enviamos los datos al controlador
    $datosArray = $_usuario->post($postBody);
    //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
    
}

if($_SERVER['REQUEST_METHOD'] == "PUT"){

    $postBody = json_encode(array(  
        "texto1" => $_POST["texto1"],
        "texto2" =>  $_POST["texto2"],
        "texto3" => $_POST["texto3"],
        "texto4" =>  $_POST["texto4"],
        "texto5" => $_POST["texto5"],
        "texto6" =>  $_POST["texto6"],
        "texto7" => $_POST["texto7"],
        "texto8" => $_POST["texto8"],
        "texto8" => $_POST["texto9"]
      
    ));
      //recibimos los datos enviados
 
      //enviamos datos al manejador
      $datosArray = $_usuario->put($postBody);
        //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);

}

if($_SERVER['REQUEST_METHOD'] == "DELETE"){

        $headers = getallheaders();
        if(isset($headers["token"]) && isset($headers["pacienteId"])){
            //recibimos los datos enviados por el header
            $send = [
                "token" => $headers["token"],
                "pacienteId" =>$headers["pacienteId"]
            ];
            $postBody = json_encode($send);
        }else{
            //recibimos los datos enviados
            $postBody = file_get_contents("php://input");
        }
        
        //enviamos datos al manejador
        $datosArray = $_pacientes->delete($postBody);
        //delvovemos una respuesta 
        header('Content-Type: application/json');
        if(isset($datosArray["result"]["error_id"])){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
       

}/*else{
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
} */


?>