<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carritoC"], $indice, 1);
header("Location: ./vender1.php?status=3");
?>