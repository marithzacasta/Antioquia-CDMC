<?php
require_once '../modelo/respuestas.class.php';
require_once '../modelo/establecimiento.class.php';

$_respuestas = new respuestas;
$_establecimiento = new establecimiento;


//metodo get buscar todo o por codigo
if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listaCategoria = $_categoria->listaCategoria($pagina);
        header("Content-Type: application/json");
        echo json_encode($listaCategoria);
        http_response_code(200);
    }else{  
    if(isset($_GET['idEstablecimiento'])){
        $idEstablecimiento = $_GET['idEstablecimiento'];
        $datosEstablecimiento= $_establecimiento->obtenerEstablecimiento($idEstablecimiento);
        header("Content-Type: application/json");
        echo json_encode($datosEstablecimiento);
        http_response_code(200);
    }
    }
}
// metodo post para guardar 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $postBody = json_encode(array(  
        "texto1" => $_POST["texto1"],
        "texto1" => $_POST["texto2"],
        "texto3" =>  $_POST["texto3"]
       
    ));
    //enviamos los datos al controlador
    $datosArray = $_establecimiento->post($postBody);
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
      $datosArray = $_establecimiento->put($postBody);
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

?>