<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class establecimiento extends conexion   
{

    private $table = "establecimiento";
    private $idEstablecimiento = 0;
    private $nombreEstablecimiento = "";
    private $responsable = "";
    private $direccion = "";
    
    //912bc00f049ac8464472020c5cd06759

    //FUNCIONES AGENDAMIENTO

    public function listaEstablecimiento($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT idEstablecimiento, nombreEstablecimiento, responsable, direccion FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerEstablecimiento($idEstablecimiento){
        $query = "SELECT * FROM " . $this->table . " WHERE idEstablecimiento = '$idEstablecimiento'";
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

                if(!isset($datos['texto1']) || !isset($datos["texto2"]) || !isset($datos["texto3"])){
                    return $_respuestas->error_400();
                }else{
                    $this->nombreEstablecimiento = $datos['texto1']; 
                    $this->responsable = $datos['texto2']; 
                    $this->direccion = $datos['texto3']; 
                     $resp = $this->insertarEstablecimiento();
                     
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "idEstablecimiento" => $resp
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

           // }else{
              //  return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            //}
       // } cierre del sino para el token


       

    }


    private function insertarEstablecimiento(){
        $query = "INSERT INTO " . $this->table . " (idEstablecimiento, nombreEstablecimiento, responsable, direccion)
        values
        ('" . $this->idEstablecimiento . "','" . $this->nombreEstablecimiento . "','" . $this->responsable . "','" . $this->direccion . "')"; 
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
            if(!isset($datos['idEstablecimiento'])){
                return $_respuestas->error_400();
            }else{
                $this->idMunicipio = $datos['idEstablecimiento'];
                if(isset($datos['nombreEstablecimiento'])) { 
                    $this->nombreMunicipio = $datos['nombreEstablecimiento']; 
                }
                if(isset($datos['responsable'])) { 
                    $this->responsable = $datos['responsable']; 
                }
                if(isset($datos['direccion'])) { 
                    $this->direccion = $datos['direccion']; 
                }
                
    
                $resp = $this->modificarEstablecimiento();
                if($resp){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "idEstablecimiento" => $this->idEstablecimiento);
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


private function modificarEstablecimiento(){
    $query = "UPDATE " . $this->table . " SET idEstablecimiento ='" . $this->idEstablecimiento . "'"; 
    $resp = parent::nonQuery($query);
    if($resp >= 1){
         return $resp;
    }else{
        return 0;
    }
}

}

