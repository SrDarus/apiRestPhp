<?php 

	header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    

    /*  conexion POO */
	function buscarProductos($correo)
    {

        try{

            require_once ('connexionPoo.php');

            $pdo = new Conexion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET CHARACTER SET utf8");   

            $stm    = $pdo->prepare("SELECT * FROM producto WHERE correo = ? ");
            $stm->execute(array($correo));
            $r = $stm->fetchAll(PDO::FETCH_OBJ);
            if($r){
                return $r;

            }else{ return $r;}


        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    include "entregarResponse.php";
    if(!empty($_GET['correo'])){
    	$correo = $_GET['correo'];

	   $productos = buscarProductos($correo);
        if($productos===false){
        entregarResponse(200, "Los datos ingresados no corresponden", null);
        }else{
            entregarResponse(200, "Productos encontrados", $productos);
        }
    }else{
        entregarResponse(400, "bad request", null);
    }






 ?>