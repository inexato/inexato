<?php

require_once("class/criptografia.php");
/*
// Encriptando a senha
$senha = '629bru48';
$hash = Bcrypt::hash($senha);
// $hash = $2a$08$MTgxNjQxOTEzMTUwMzY2OOc15r9yENLiaQqel/8A82XLdj.OwIHQm
// Salve $hash no banco de dados

echo $hash;

*/
// Verificando a senha
$senha = '629bru48';
$hash = '$2a$08$NTY2MjQ4NDQ4NTM4NGUzMOXhn7Rm9MbzUef8gv94dpVO1EpPbuZnq'; // Valor retirado do banco

if (Bcrypt::check($senha, $hash)) {
	echo 'Senha OK!';
} else {
	echo 'Senha incorreta!';
}

