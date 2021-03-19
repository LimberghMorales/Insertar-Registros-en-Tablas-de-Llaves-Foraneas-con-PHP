<?php
    function conexion(){
        try{
            $con= new PDO("mysql:dbname=productos_uno;host=localhost",'root','');
            return $con;
        }catch(PDOException $E){
            return false;
        }
    }
?>