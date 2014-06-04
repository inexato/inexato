<?php

if (isset($_POST['cep'])) {

$cep = str_replace("_", "-", $_POST['cep']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$sql = "SELECT en.logradouro 'logradouro', en.nomeslog 'endereco', ba.nome 'bairro', ci.nome 'cidade', es.nome 'estado' FROM enderecos en INNER JOIN bairros ba On en.bairro_id = ba.id INNER JOIN cidades ci ON ba.cidade = ci.id INNER JOIN estados es ON ci.estado_cod = es.id WHERE en.cep = '".$cep."';";

mysql_select_db('cep');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  	die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{

	$variavel = '{"endereco":"'.$row['logradouro'].' '.$row['endereco'].'", "bairro": "'.$row['bairro'].'", "cidade": "'.$row['cidade'].'", "estado": "'.$row['estado'].'"}';

	echo $variavel;

}
mysql_close($conn);
} else {

	echo "ERROR";

}

?>