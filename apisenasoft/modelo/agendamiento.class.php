<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class agendar extends conexion   
{

    private $table = "agendamiento";
    private $idAgendamiento = 0;
    private $idUsuario = 0;
    private $idManzana = 0;
    private $idServicio = 0;
    private $idEstablecimiento = 0;
    private $fecha = "";
    private $hora = "";
    //912bc00f049ac8464472020c5cd06759

    //FUNCIONES AGENDAMIENTO

    public function listaAgendamiento($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT  idAgendamiento, idManzana, idServicio, idEstablecimeinto, fecha, hora FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerAgendamientos($id){
        $query = "SELECT * FROM " . $this->table . " WHERE idAgendamiento = '$idAgendamiento'";
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

                if(!isset($datos['idusuario']) || !isset($datos["idManzana"]) || !isset($datos["idServicio"]) || !isset($datos["idEstablecimiento"]) || !isset($datos["fecha"]) || !isset($datos["hora"])  ){
                    return $_respuestas->error_400();
                }else{
                    $this->idUsuario = $datos['idUsuario']; 
                    $this->idManzana = $datos['idManzana']; 
                    $this->idServicio = $datos['idServicio'];
                    $this->idEstablecimiento = $datos['idEstablecimiento']; 
                    $this->fecha = $datos['fecha'];
                    $this->hora = $datos['hora']; 
                  

                     $resp = $this->insertarAgendamiento();

                     
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "idAgendamiento" => $resp
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


    private function insertaAgendamiento(){
        $query = "INSERT INTO " . $this->table . " (idAgendamiento, idUsuario, idManzana, idServicio, idEstablecimiento, fecha, hora)
        values
        ('" . $this->idAgendamiento . "','" . $this->idUsuario . "','" . $this->idManzana . "','" . $this->idServicio . "','" . $this->idEstablecimiento . "', '" . $this->fecha . "','" . $this->hora . "',)"; 
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
            if(!isset($datos['idAgendamiento'])){
                return $_respuestas->error_400();
            }else{
                $this->idAgendamiento = $datos['idAgendamiento'];
                if(isset($datos['idUsuario'])) { 
                    $this->idUsuario = $datos['idUsuario']; 
                }
                if(isset($datos['idManzana'])) { 
                    $this->idManzana = $datos['idManzana']; 
                }
                if(isset($datos['idServicio'])) { 
                    $this->idServicio = $datos['idServicio']; 
                }
                if(isset($datos['idEstablecimiento'])) { 
                    $this->idEstablecimiento = $datos['idEstablecimiento']; 
                }
                if(isset($datos['fecha'])) { 
                    $this->fecha = $datos['fecha']; 
                }
                if(isset($datos['hora'])) { 
                    $this->hora = $datos['hora']; 
                }
    
                $resp = $this->modificarAgendamiento();
                if($resp){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "idAgendamiento" => $this->idAgendamiento);
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


private function modificarAgendamiento(){
    $query = "UPDATE " . $this->table . " SET idAgendamiento ='" . $this->idAgendamiento . "'"; 
    $resp = parent::nonQuery($query);
    if($resp >= 1){
         return $resp;
    }else{
        return 0;
    }
}

}

