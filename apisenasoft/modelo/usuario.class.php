<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class usuario extends conexion {

    private $table = "usuario";
    private $idUsuario = 0;
    private $tipoDocumento = "";
    private $documento = "";
    private $nombres = "";
    private $apellidos = "";
    private $telefono = "";
    private $correo = "";
    private $contrasena = "";
    private $ciudad = "";
    private $direccion = "";
    private $ocupacion = "";
    private $rol = "";
    private $estado = "Activo";
    private $token = "";
//912bc00f049ac8464472020c5cd06759

    public function listaUsuarios($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT idUsuario, Usuario FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerUsuarios($id){
        $query = "SELECT * FROM " . $this->table . " WHERE idUsuario = '$idUsuario    '";
        return parent::obtenerDatos($query);

    }

    public function login($json){
    
        $_respustas = new respuestas;//Se guardan las propiedades y metodos definidos en la clase respuestas.
        $datos = json_decode($json,true); //Decodifica la información.
        if(!isset($datos['texto1']) || !isset($datos["texto2"])){ // Se verifica si las variables estan vacias.
            return $_respustas->error_400();//Si las variables se encuentran vacias devuelve el error 400.
        }else{
            $usuario = $datos["texto1"]; //Se guarda la información de las claves para ser guardadas en las variables.
            $password = $datos["texto2"];
            // $password = parent::encriptar($password);
            $datos = $this->obtenerDatosUsuario($usuario); //Se llama esta función para obtener los datos de la base de datos.
            if($datos){//Si se encuentran los datos se pasa a verificar si la contraseña proporcionada por el usuario es correcta
                    if($password == $datos[0]["contrasena"]){
                          $verRol = $datos[0]["rol"];
                          $esta = $datos[0]["estado"]; //Si la contraseña es correcta se guarda el estado en la variable $esta.
                            if($esta == "Activo"){ //Si el estado es activo.
                                //crear el token
                                if($verRol == "Usuario"){
                                    header('Location: ../../senasoft/vista/menuUsuario.php');//Si el estado es activo redirecciona al usuario a la pagina principal.
                                    exit();
                                }else if($verRol == "Admin"){
                                    header('Location: ../../senasoft/vista/menuAdmin.php');//Si el estado es activo redirecciona al usuario a la pagina principal.
                                    exit();
                                }else{
                                    echo "Se ha ingresado un rol inadecuado";
                                }
                               // $verificar  = $this->insertarToken($datos[0]['UsuarioId']);
                                //if($verificar){
                                        // si se guardo
                                        // $result = $_respustas->response;
                                        //$result["result"] = array(
                                          //  "token" => $verificar
                                        //);
                                        // header("Location: ../../../camilo/vista/paginaprincipal/index.php");//Si el estado es activo redirecciona al usuario a la pagina principal.
                                        // exit();
                                        // return $result;
                                //}//else{
                                        //error al guardar
                                  //      return $_respustas->error_500("Error interno, No hemos podido guardar");
                               // }
                            }else{
                                //el usuario esta inactivo
                                return $_respustas->error_200("El usuario esta inactivo");
                                // return "El usuario esta inactivo";

                           }
                    }else{
                        //la contraseña no es igual
                       return $_respustas->error_200("El password es invalido");
                    // return "La contrasena es incorrecta";

                    }
            }else{
                //no existe el usuario
                return $_respustas->error_200("El usuario $usuario  no existe $datos ");
                // return "El usuario no existe";
            }
        }
    }

    private function obtenerDatosUsuario($correo){ //Se realiza la consulta del correo, contraseña y estado en la base de datos.
        $query = "SELECT correo, contrasena, rol, estado FROM usuario WHERE correo = '$correo'";
        $datos = parent::obtenerDatos($query); // Hace referencia a la función obtenerDatos de la clase padre (conexion.php)
        if(!isset($datos[0]["idUsuario"])){//Si se encuentran los datos se devolveran estos mismos.
            return $datos;
        }else{
            return 0;
        }
  
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

                if(!isset($datos['texto11']) || !isset($datos['texto12']) || !isset($datos['texto3']) || !isset($datos['texto4']) || !isset($datos['texto5']) || !isset($datos['texto6']) || !isset($datos['texto7']) || !isset($datos['texto8']) || !isset($datos['texto9']) || !isset($datos['texto10'])){
                    return $_respuestas->error_400();
                }else{
                    if(isset($datos['texto13'])){
                    // se trae los datos de la vista Usuario
                    $this->nombres = $datos['texto11'];
                    $this->apellidos = $datos['texto12'];
                    $this->tipoDocumento = $datos['texto3'];
                    $this->documento = $datos['texto4'];
                    $this->telefono = $datos['texto5'];
                    $this->ciudad = $datos['texto6'];
                    $this->direccion = $datos['texto7'];
                    $this->ocupacion = $datos['texto8'];
                    $this->correo = $datos['texto9'];
                    $this->contrasena = $datos['texto10'];
                    $this->rol = $datos['texto13'];
                     $resp = $this->insertarUsuario();

                     
                    if($resp){
                        header('Location: ../../senasoft/vista/login.php');
                        exit();
                    }else{
                        return $_respuestas->error_500();
                    }
                }
                }
                

           // }else{
              //  return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            //}
       // } cierre del sino para el token
    }


    private function insertarUsuario(){
        $query = "INSERT INTO " . $this->table . " (idUsuario, tipoDocumento, documento, nombres, apellidos, telefono, correo, contrasena, ciudad, direccion, ocupacion, rol, estado)
        values
        ('" . $this->idUsuario . "','" . $this->tipoDocumento . "','" . $this->documento . "','" . $this->nombres . "','" . $this->apellidos . "','" . $this->telefono . "','" . $this->correo . "','" . $this->contrasena . "','" . $this->ciudad . "','" . $this->direccion . "','" . $this->ocupacion . "','" . $this->rol . "','" . $this->estado . "')"; 
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
                if(!isset($datos['idUsuario'])){
                    return $_respuestas->error_400();
                }else{
                    $this->idUsuario = $datos['idUsuario'];
                    if(isset($datos['texto1'])) { 
                        $this->nombres = $datos['texto1']; 
                    }
                    if(isset($datos['texto2'])) { 
                        $this->apellidos = $datos['texto2']; 
                    }
                    if(isset($datos['texto3'])) { 
                        $this->documento = $datos['texto3']; 
                    }
                    if(isset($datos['texto4'])) { 
                        $this->telefono = $datos['texto4']; 
                    }
                    if(isset($datos['texto5'])) { 
                        $this->correo = $datos['texto5']; 
                    }
                    if(isset($datos['texto6'])) { 
                        $this->ciudad = $datos['texto6']; 
                    }
                    if(isset($datos['texto7'])) { 
                        $this->direccion = $datos['texto7']; 
                    }
                    if(isset($datos['texto8'])) { 
                        $this->ocupacion = $datos['texto8']; 
                    }

                    
        
                    $resp = $this->modificarUsuario();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "idUsuario" => $this->idUsuario
                        );
                        return $respuesta;
                        header('Location: ../../senasoft/vista/login.php');
                        exit();
                    }else{
                        return $_respuestas->error_500();
                    }
                }

            //} //else{
             //   return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
           // }
        //} //cierre else del token 


    }


    private function modificarUsuario(){
        $query = "UPDATE " . $this->table . " SET tipoDocumento ='" . $this->tipoDocumento . "',documento = '" . $this->documento . "',nombres = '" . $this->nombres . "',apellidos = '" . $this->apellidos . "',telefono = '" . $this->telefono . "',correo = '" . $this->correo . "',contrasena = '" . $this->contrasena . "',ciudad = '" . $this->ciudad . "',direccion = '" . $this->direccion . "',ocupacion = '" . $this->ocupacion . "',rol = '" . $this->rol . "',estado = '" . $this->estado . "'  WHERE idUsuario = '" . $this->idUsuario . "'"; 
        $resp = parent::nonQuery($query);
        if($resp >= 1){
             return $resp;
        }else{
            return 0;
        }
    }
   


    public function delete($json){
        $_respuestas = new respuestas;
        $datos = json_decode($json,true);

        if(!isset($datos['token'])){
            return $_respuestas->error_401();
        }else{
            $this->token = $datos['token'];
            $arrayToken =   $this->buscarToken();
            if($arrayToken){

                if(!isset($datos['pacienteId'])){
                    return $_respuestas->error_400();
                }else{
                    $this->pacienteid = $datos['pacienteId'];
                    $resp = $this->eliminarPaciente();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "pacienteId" => $this->pacienteid
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

            }else{
                return $_respuestas->error_401("El Token que envio es invalido o ha caducado");
            }
        }



     
    }


    private function eliminarPaciente(){
        $query = "DELETE FROM " . $this->table . " WHERE PacienteId= '" . $this->pacienteid . "'";
        $resp = parent::nonQuery($query);
        if($resp >= 1 ){
            return $resp;
        }else{
            return 0;
        }
    }


    private function buscarToken(){
        $query = "SELECT  TokenId,UsuarioId,Estado from usuarios_token WHERE Token = '" . $this->token . "' AND Estado = 'Activo'";
        $resp = parent::obtenerDatos($query);
        if($resp){
            return $resp;
        }else{
            return 0;
        }
    }


    private function actualizarToken($tokenid){
        $date = date("Y-m-d H:i");
        $query = "UPDATE usuarios_token SET Fecha = '$date' WHERE TokenId = '$tokenid' ";
        $resp = parent::nonQuery($query);
        if($resp >= 1){
            return $resp;
        }else{
            return 0;
        }
    }



}





?>