<?php
require_once '../modelo/respuestas.class.php';
require_once '../modelo/manzana.class.php';

$_respuestas = new respuestas;
$_manzana = new manzana;


//metodo get buscar todo o por codigo
if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaManzana = $_manzana->listaManzana($pagina);
        header("Content-Type: application/json");
        echo json_encode($listaManzana);
        http_response_code(200);
    }else{  
    if(isset($_GET['idManzana'])){
        $idManzana = $_GET['idManzana'];
        $datosManzana= $_manzana->obtenerManzana($idManzana);
        header("Content-Type: application/json");
        echo json_encode($datosManzana);
        http_response_code(200);
    }
    if(isset($_GET['texto2'])){
        $postBody = json_encode(array(  
            "texto1" => $_GET["texto1"],
            "texto2" =>  $_GET["texto2"],
            "texto3" => $_GET["texto3"],
            "texto4" =>  $_GET["texto4"]
          
        ));
        //enviamos datos al manejador
        $datosArray = $_municipio->put($postBody);
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
    if(isset($_GET['texto1'])){
        $nombreManzana = $_GET['texto1'];
        $datosManzana= $_municipio->obtenerManzanaNombre($nombreManzana);
        header("Content-Type: application/json");
        echo json_encode($datosMunicipio);
        http_response_code(200);
    }
    }
}
// metodo post para guardar 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //$postBody = $_POST["texto2"];
    $postBody = json_encode(array(  
        "texto1" => $_POST["texto1"],
        "texto2" =>  $_POST["texto2"],
        "texto3" =>  $_POST["texto3"],
        "texto4" =>  $_POST["texto4"]
    ));
    //recibimos los datos enviados
    //$postBody = file_get_contents("php://input");
    //enviamos los datos al controlador
    $datosArray = $_manzana->post($postBody);
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
      $datosArray = $_manzana->put($postBody);
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
        if(isset($headers["token"]) && isset($headers["idManzana"])){
            //recibimos los datos enviados por el header
            $send = [
                "token" => $headers["token"],
                "idManzana" =>$headers["idManzana"]
            ];
            $postBody = json_encode($send);
        }else{
            //recibimos los datos enviados
            $postBody = file_get_contents("php://input");
        }
        
        //enviamos datos al manejador
        $datosArray = $_agendar->delete($postBody);
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