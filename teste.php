<?
// Chama por include a Classe de Conexão que criamos
include("mysql_class.php");

// Instanciamos o Objeto
$mysql = new conexao;
// Executa a Query desejada
$listaclientes = $mysql->sql_query("select * from clientes order by nome asc");
// Desconecta do Banco de Dados
$mysql->desconecta;

// Aqui criamos um objeto chamado $clientes com os resultado
// da query que fizemos acima.
while($clientes = mysql_fetch_object($listaclientes)){
	// Imprimimos os resultados
	print $clientes->nome."<br>";
}
?>