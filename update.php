<?php

	include "includes/valida_sessao.inc";
 	include "includes/conecta_mysql.sql";


 	// Obtem o usuario que efetuou o login
 	$nome_usuario = $_SESSION ["nome_usuario"];
 	// Obtem informacoes digitadas

  $sql = "SELECT * FROM receita_despesas";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      }
  } else {
      echo "0 results";
  }
  $conn->close();

?>
  <select>
    <option value="">
      Volvo
    </option>
    <option value="saab">Saab</option>
    <option value="mercedes">Mercedes</option>
    <option value="audi">Audi</option>
  </select>

<?php

  $t = $_REQUEST['t'];
	$nome = $_REQUEST ['nome'];
	$classe = $_REQUEST ["classe"];
	$mesRef = $_REQUEST ["mesRef"];
	$valor = $_REQUEST ['valor'];
	$descricao = $_REQUEST ['descricao'];

	// Validacao dos campos nome e valor .
	if(empty($nome) or empty ($valor))
	{
		$erro =1;
		$msg ="Por favor, preencha todos os campos obrigatórios .";
	}
	else
		if ((substr_count ($valor , '.')!=1) or (!is_numeric($valor )))
		{
			$erro =1;
			$msg =" Digitar o campo valor apenas com numeros e no formato (xx.xx ).";
		}
		else
		{
			// Tratamento da Descricao
			if ( empty ($descricao))  $descricao = NULL ;
			// Id do usuario que efetuou o login
			$resultado =
			mysqli_query ($con," SELECT id FROM usuarios WHERE login ='$nome_usuario'");
			$row = mysqli_fetch_assoc($resultado);
			$idUsuario = $row['id'];
			// Data e Hora
			$datahora = date ("Y-m-d H:i:s");
			// Formatar o valor para duas casas decimais .
			$valor = number_format ($valor , 2, ".", "");
			// Comandos SQL para insercao na base de dados .
			$comandoSQL = " INSERT INTO receita_despesas VALUES ('$nome', $t , $classe , $mesRef, '$datahora', $valor, '$idUsuario' , '$descricao')";
			/*$comandoSQL .= " (' $nome ','$t ',' $classe ',' $mesRef ',' $datahora ',' $valor ',' $idUsuario ',' $descricao ')";*/
			$resultado = mysqli_query ($con,$comandoSQL) or die('Erro fatal durante operacao com base de dados');
			$msg ="Inclusão realizada com sucesso";
		}
	mysqli_close ($con);
?>
<html>

	<head>
		<title> Controle de Finanças </title>
	</head>

	<body>
		<link href="css/style.css" rel="stylesheet">
		<center >
		<img src="images/ouro.jpg" width ="30%" height ="30%"/>
		<h1 >$$$ Sistema de Controle de Financas $$$ </h1 >
		<hr width ="700px"/><br />
		<?php
			echo "<p>". $msg ."</p>";
		?>
		<p> <a href ='principal.php '> Voltar </a ></p>
		</center >
	</body >
</html >
