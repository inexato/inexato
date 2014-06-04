<?php require_once("class/include.php") ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">

	  <form>

  <fieldset>
    <legend>Legenda</legend>

	<input type="hidden" name="cd_usuario" id="cd_usuario" value="">

	<label for="cd_tipo">Tipo:</label>
	<select name="cd_tipo" id="cd_tipo">
		<option value="">Simples</option>
	</select>

	<label for="cd_ativo">Tipo:</label>
	<select name="cd_ativo" id="cd_ativo">
		<option value="0">Inativo</option>
		<option value="1">Ativo</option>
	</select>

	<label for="nm_usuario">Nome:</label><input type="text" name="nm_usuario" id="nm_usuario" value="">

	<label for="snm_usuario">Sobrenome:</label><input type="text" name="snm_usuario" id="snm_usuario" value="">

	<label for="cd_cpf">CPF:</label><input type="text" name="cd_cpf" id="cd_cpf" value="">

	<label for="tx_email">Email:</label><input type="email" name="tx_email" id="tx_email" value="" required>

	<label for="tx_senha">Senha:</label><input type="password" name="tx_senha" id="tx_senha" value="" required>

	<label for="cd_cep">CEP:</label><input type="text" name="cd_cep" id="cd_cep" value="">

	<label for="nm_endereco">Endereço:</label><input type="text" name="nm_endereco" id="nm_endereco" value="">

	<label for="cd_numero">Número:</label><input type="text" name="cd_numero" id="cd_numero" value="">

	<label for="ds_complemento_numero">Complemento:</label><input type="text" name="ds_complemento_numero" id="ds_complemento_numero" value="">

	<label for="nm_bairro">Bairro:</label><input type="text" name="nm_bairro" id="nm_bairro" value="">

	<label for="nm_cidade">Cidade:</label><input type="text" name="nm_cidade" id="nm_cidade" value="">

	<label for="nm_estado">Estado:</label><input type="text" name="nm_estado" id="nm_estado" value="">

	<label for="nm_pais">País:</label><input type="text" name="nm_pais" id="nm_pais" value="">

	<label for="cd_telefone">Telefone:</label><input type="text" name="cd_telefone" id="cd_telefone" value="">

	<label for="cd_celular">Celular:</label><input type="text" name="cd_celular" id="cd_celular" value="">

	<label for="dt_nascimento">Nascimento:</label><input type="text" name="dt_nascimento" id="dt_nascimento" value="">

	<p><input type="submit" value="Cadastrar" class="btn"></p>


	</fieldset>





	  </form>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#cd_cpf').mask('000.000.000-00');
		$('#cd_cep').mask('00000-000');
		$('#cd_telefone').mask('(00) 0000-0000');
		$('#cd_celular').mask('(00) 0000-00009');
		$('#dt_nascimento').mask('00/00/0000');


	   $('#cd_cep').keyup(function(){
			if ($('#cd_cep').val().length == 9) {
					$('#nm_endereco').val("Carregando...");

				    $.ajax({
						url : 'class/cep.php',
						type : 'POST',
						data: 'cep=' + $('#cd_cep').val().replace("-","_"),
						dataType: 'json',
						success: function(data){

							$('#nm_endereco').val(data.endereco);
							$('#nm_bairro').val(data.bairro);
							$('#nm_cidade').val(data.cidade);
							$('#nm_estado').val(data.estado);
							$('#nm_pais').val("Brasil");
							$('#cd_numero').focus();


						},
						error:function(){

							$('#nm_endereco').val("");
							$('#nm_bairro').val("");
							$('#nm_cidade').val("");
							$('#nm_estado').val("");
							$('#nm_pais').val("");

						}
				   });
				return true;
		   }
	   });

	});
	</script>

  </body>
</html>
