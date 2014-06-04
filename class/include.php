<?php

session_start();



if($_SESSION['usuario']['cd_usuario'] < 1) {

	header("Location: index.php?erro=sessao");

}

?>