<?php
session_start();
require_once("class/usuario.php");

$tx_email = $_POST['login'];
$tx_senha = $_POST['senha'];

$usuario = new usuario();

if($usuario->login($tx_email, $tx_senha)) {

	header("Location: sistema.php");

} else {

	header("Location: index.php?erro=senha");

}
?>