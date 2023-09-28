<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class manzana extends conexion {

    private $table = "manzana";
    private $idManzana = 0;
    private $nombreManzana = "";
    private $localidad = "";
    private $dirrecion = "";
    private $estado = "Activo";
//912bc00f049ac8464472020c5cd06759

    public function listaManzana($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT  idManzana, nombreManzana FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerManzana($id){
        $query = "SELECT * FROM " . $this->table . " WHERE idManzana = '$idManzana'";
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

                if(!isset($datos['texto1']) || !isset($datos['texto2']) || !isset($datos['texto3']) ){
                    return $_respuestas->error_400();
                }else{
                
                    $this->nombreManzana = $datos['texto1']; 
                    $this->localidad = $datos['texto2'];
                    $this->direccion = $datos['texto3']; 
                   
                     $resp = $this->insertarManzana();

                     
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "idManzana" => $resp
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


    private function insertarManzana(){
        $query = "INSERT INTO " . $this->table . " (idManzana, nombreManzana, localidad, direccion, estado )
        values
        ('" . $this->idManzana . "','" . $this->nombreManzana . "','" . $this->localidad . "' ,'" . $this->dreccion . "', ,'" . $this->estado . "')"; 
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
                if(!isset($datos['idManzana'])){
                    return $_respuestas->error_400();
                }else{
                    $this->idManzana = $datos['idManzana'];
                if(isset($datos['nombreManzana'])) { 
                    $this->nombreManzana = $datos['nombreManzana']; 
                }
                if(isset($datos['localidad'])) { 
                    $this->localidad = $datos['localidad']; 
                }
                if(isset($datos['direccion'])) { 
                    $this->direccion = $datos['direccion']; 
                }
                if(isset($datos['estado'])) { 
                    $this->estado = $datos['estado']; 
                }
                
                
        
                    $resp = $this->modificarManzana();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "idManzana" => $this->idManzana
                        );
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


    private function modificarManzana(){
        $query = "UPDATE " . $this->table . " SET nombreManzana ='" . $this->nombreManzana . "'"; 
        $resp = parent::nonQuery($query);
        if($resp >= 1){
             return $resp;
        }else{
            return 0;
        }
    }


    // public function delete($json){
    //     $_respuestas = new respuestas;
    //     $datos = json_decode($json,true);

    //     if(!isset($datos['token'])){
    //         return $_respuestas->error_401();
    //     }else{
    //         $this->token = $datos['token'];
    //         $arrayToken =   $this->buscarToken();
    //         if($arrayToken){

    //             if(!isset($datos['pacienteId'])){
    //                 return $_respuestas->error_400();
    //             }else{
    //                 $this->pacienteid = $datos['pacienteId'];
    //                 $resp = $this->eliminarPaciente();
    //                 if($resp){
    //                     $respuesta = $_respuestas->response;
    //                     $respuesta["result"] = array(
    //                         "pacienteId" => $this->pacienteid
    //                     );
    //                     return $respuesta;
    //                 }else{
    //                     return $_respuestas->error_500();
    //                 }
    //             }

    //         }else{
    //             return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
    //         }
    //     }



     
    // }


    // private function eliminarPaciente(){
    //     $query = "DELETE FROM " . $this->table . " WHERE PacienteId= '" . $this->pacienteid . "'";
    //     $resp = parent::nonQuery($query);
    //     if($resp >= 1 ){
    //         return $resp;
    //     }else{
    //         return 0;
    //     }
    // }


    // private function buscarToken(){
    //     $query = "SELECT  TokenId,UsuarioId,Estado from usuarios_token WHERE Token = '" . $this->token . "' AND Estado = 'Activo'";
    //     $resp = parent::obtenerDatos($query);
    //     if($resp){
    //         return $resp;
    //     }else{
    //         return 0;
    //     }
    // }


    // private function actualizarToken($tokenid){
    //     $date = date("Y-m-d H:i");
    //     $query = "UPDATE usuarios_token SET Fecha = '$date' WHERE TokenId = '$tokenid' ";
    //     $resp = parent::nonQuery($query);
    //     if($resp >= 1){
    //         return $resp;
    //     }else{
    //         return 0;
    //     }
    // }









    }