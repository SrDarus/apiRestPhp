<?php 

	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    /*  conexion POO */
	function validarUsuario($rut, $clave)
    {

        try{

            require_once ('connexionPoo.php');

            $pdo = new Conexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET CHARACTER SET utf8");   

            $stm    = $pdo->prepare("SELECT * FROM usuario WHERE correo = ? and password = ? ");
            $stm->execute(array($rut,$clave));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            if($r){
                return $r;

            }else{ return $r; }

        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    include "entregarResponse.php";

    if(!empty($_GET['correo']) && !empty($_GET['password'])){
    	$correo = $_GET['correo'];
    	$password = $_GET['password'];

	    $usuario = validarUsuario($correo,$password);
        if($usuario===false){
            entregarResponse(200, "Los datos ingresados no corresponden", null);
        }else{
            entregarResponse(200, "Usuario encontrado", $usuario);
        }
    }else{
        entregarResponse(400, "Bad request", null);
    }

?>