<?php 
    require_once "db/db.php";
    function insertar($nombre, $costo, $marca){
        $pdo = conexion();
        $statement=$pdo->prepare("INSERT INTO productos VALUES(null,:nombre,:costo,:marca)");

        $statement->bindParam(':nombre',$nombre);
        $statement->bindParam(':costo',$costo);
        $statement->bindParam(':marca',$marca);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }
    function obtenerMarcas(){
        $pdo=conexion();
        $statement=$pdo->prepare("SELECT * FROM marca");
        if($statement->execute()){
            $registros=$statement->fetchAll();
            return $registros;
        }else{
            return false;
        }
    }
    $nombre=(!empty($_POST['nombre']))?$_POST['nombre']:'';
    $costo=(!empty($_POST['costo']))?$_POST['costo']:'';
    $marca=(!empty($_POST['marca']))?$_POST['marca']:'';
if($nombre!='' && $costo !='' && $marca!=''){
    if(insertar($nombre,$costo,$marca)){
        echo 'insertado correctamente';
    }else{
        echo 'error en la insercion';
    }
}
?>