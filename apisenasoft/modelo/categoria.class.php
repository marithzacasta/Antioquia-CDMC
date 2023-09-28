<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class categoria extends conexion   
{

    private $table = "categoria";
    private $idCategoria = 0;
    private $nombreCategoria = "";
    private $descripcion = "";
    
    //912bc00f049ac8464472020c5cd06759

    //FUNCIONES AGENDAMIENTO

    public function listaCategoria($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT idCategoria, nombreCategoria, descripcion FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerCategoria($idCategoria){
        $query = "SELECT * FROM " . $this->table . " WHERE idCategoria = '$idCategoria'";
        return parent::obtenerDatos($query);

    }

    public function post($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        //if(!isset($datos['token'])){
               // return $_respuestas->error_401();
        //}//else{
           // $this->token = $datos['token'];
          //  $arrayToken =   $this->buscarToken();
            //if($arrayToken){

                if(!isset($datos['texto1']) || !isset($datos["texto2"])  ){
                    return $_respuestas->error_400();
                }else{
                    $this->nombreCategoria = $datos['texto1']; 
                    $this->descripcion = $datos['texto2']; 
                  

                     $resp = $this->insertarCategoria();

                     
                    if($resp){
                        header('Location: http://localhost/Antioquia-CDMC/senasoft/vista/menuAdmin.php');
                        exit();
                        // $respuesta = $_respuestas->response;
                        // $respuesta["result"] = array(
                        //     "idCategoria" => $resp
                        // );
                        // return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

           // }else{
              //  return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            //}
       // } cierre del sino para el token


       

    }


    private function insertarCategoria(){
        $query = "INSERT INTO " . $this->table . " (idCategoria, nombreCategoria, descripcion)
        values
        ('" . $this->idCategoria . "','" . $this->nombreCategoria . "','" . $this->descripcion . "')"; 
        $resp = parent::nonQueryId($query);
        if($resp){
             return $resp;
        }else{
            return 0;
        }
    }


    
public function put($json){
    $_respuestas = new respuestas;
    $datos = json_decode($json,true);

    //if(!isset($datos['token'])){
     //   return $_respuestas->error_401();
    //}//else{
       // $this->token = $datos['token'];
       // $arrayToken =   $this->buscarToken();
        //if($arrayToken){
            if(!isset($datos['idCategoria'])){
                return $_respuestas->error_400();
            }else{
                $this->idCategoria = $datos['idCategoria'];
                if(isset($datos['nombreCategoria'])) { 
                    $this->nombreCategoria = $datos['nombreCategoria']; 
                }
                if(isset($datos['descripcion'])) { 
                    $this->descripcion = $datos['descripcion']; 
                }
                
    
                $resp = $this->modificarCategoria();
                if($resp){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "idCategoria" => $this->idCategoria);
                    return $respuesta;
                }else{
                    return $_respuestas->error_500();
                }
            }

        //} //else{
         //   return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
       // }
    //} //cierre else del token 
}


private function modificarCategoria(){
    $query = "UPDATE " . $this->table . " SET idCategoria ='" . $this->idCategoria . "'"; 
    $resp = parent::nonQuery($query);
    if($resp >= 1){
         return $resp;
    }else{
        return 0;
    }
}

}

