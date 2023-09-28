<?php
require_once '../modelo/respuestas.class.php';
require_once '../modelo/categoria.class.php';

$_respuestas = new respuestas;
$_categoria = new categoria;


//metodo get buscar todo o por codigo
if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaCategoria = $_categoria->listaCategoria($pagina);
        header("Content-Type: application/json");
        echo json_encode($listaCategoria);
        http_response_code(200);
    }else{  
    if(isset($_GET['idCategoria'])){
        $idCategoria = $_GET['idCategoria'];
        $datosCategoria= $_categoria->obtenerCategoria($idCategoria);
        header("Content-Type: application/json");
        echo json_encode($datosCategoria);
        http_response_code(200);
    }
    }
}
// metodo post para guardar 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //$postBody = $_POST["texto2"];
    $postBody = json_encode(array(  
        "texto1" => $_POST["texto1"],
        "texto2" =>  $_POST["texto2"]
       
    ));
    //recibimos los datos enviados
    //$postBody = file_get_contents("php://input");
    //enviamos los datos al controlador
    $datosArray = $_categoria->post($postBody);
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

if($_SERVER['REQUEST_METHOD'] == "PUT"){
      //recibimos los datos enviados
      $postBody = file_get_contents("php://input");
      //enviamos datos al manejador
      $datosArray = $_categoria->put($postBody);
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

// if($_SERVER['REQUEST_METHOD'] == "DELETE"){

//         $headers = getallheaders();
//         if(isset($headers["token"]) && isset($headers["idAgendamiento"])){
//             //recibimos los datos enviados por el header
//             $send = [
//                 "token" => $headers["token"],
//                 "idAgendamiento" =>$headers["idAgendamiento"]
//             ];
//             $postBody = json_encode($send);
//         }else{
//             //recibimos los datos enviados
//             $postBody = file_get_contents("php://input");
//         }
        
//         //enviamos datos al manejador
//         $datosArray = $_agendar->delete($postBody);
//         //delvovemos una respuesta 
//         header('Content-Type: application/json');
//         if(isset($datosArray["result"]["error_id"])){
//             $responseCode = $datosArray["result"]["error_id"];
//             http_response_code($responseCode);
//         }else{
//             http_response_code(200);
//         }
//         echo json_encode($datosArray);
       

/*else{
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
} */



?>