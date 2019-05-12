<?php

include_once 'conexion.php';
$engine="mysql";
$ip='127.0.0.1';
$dbName="encuesta";
$user="root";
$password="";
$port='3306';
$c=new Conexion($engine,$ip,$port,$dbName,$user,$password);
$conexion=$c->getConnection();
if($conexion !=null){
    echo "conectado exitosamente";
}else{
    echo "algo falló";
}