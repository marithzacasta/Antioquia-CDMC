<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class servicio extends conexion   
{

    private $table = "servicio";
    private $idServicio = 0;
    private $idCategoria = 0;
    private $nombreServicio = "";
    private $descripcion = "";
    
    //912bc00f049ac8464472020c5cd06759

    //FUNCIONES AGENDAMIENTO

    public function listaServicio($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT idservicio, idCategoria, nombreServicio, descripcion FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerServicio($id){
        $query = "SELECT * FROM " . $this->table . " WHERE idServicio = '$idServicio'";
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

                if(!isset($datos['texto1']) || !isset($datos["texto2"]) || !isset($datos["texto3"])  ){
                    return $_respuestas->error_400();
                }else{
                    $this->idCategoria = $datos['texto1']; 
                    $this->nombreServicio = $datos['texto2']; 
                    $this->descripcion = $datos['texto3'];
            
                  

                     $resp = $this->insertarServicio();

                     
                    if($resp){
                        header('Location: http://localhost/Antioquia-CDMC/senasoft/vista/menuAdmin.php');
                        exit();
                        // $respuesta = $_respuestas->response;
                        // $respuesta["result"] = array(
                        //     "idServicio" => $resp
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


    private function insertarServicio(){
        $query = "INSERT INTO " . $this->table . " (idServicio, idCategoria, nombreServicio, descripcion)
        values
        ('" . $this->idServicio . "','" . $this->idCategoria . "','" . $this->nombreServicio . "','" . $this->descripcion . "')"; 
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
            if(!isset($datos['idServicio'])){
                return $_respuestas->error_400();
            }else{
                $this->idServicio = $datos['idServicio'];

                if(isset($datos['idCategoria'])) { 
                    $this->idCategoria = $datos['idCategoria']; 
                }
                if(isset($datos['nombreCategoria'])) { 
                    $this->nombreCategoria = $datos['nombreCategoria']; 
                }
                if(isset($datos['descripcion'])) { 
                    $this->descripcion = $datos['descripcion']; 
                }
               
    
                $resp = $this->modificarServicio();
                if($resp){
                    header('Location: http://localhost/Antioquia-CDMC/senasoft/vista/menuAdmin.php');
                    exit();
                    // $respuesta = $_respuestas->response;
                    // $respuesta["result"] = array(
                    //     "idServicio" => $this->idServicio);
                    // return $respuesta;
                }else{
                    return $_respuestas->error_500();
                }
            }

        //} //else{
         //   return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
       // }
    //} //cierre else del token 
}


private function modificarServicio(){
    $query = "UPDATE " . $this->table . " SET idServicio ='" . $this->idServicio . "'"; 
    $resp = parent::nonQuery($query);
    if($resp >= 1){
         return $resp;
    }else{
        return 0;
    }
}

}

