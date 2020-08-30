<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["cliente"], $indice, 1);
header("Location: ./venderInicio.php?status=3");
?>