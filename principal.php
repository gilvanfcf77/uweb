<meta charset="UTF-8">
<?php
	include "includes/valida_sessao.inc";
 	include "includes/conecta_mysql.sql";

 	$nome_usuario = $_SESSION ["nome_usuario"];
 	$perfil_usuario = $_SESSION ["perfil_usuario"];
 	$resultado = mysqli_query ($con," SELECT * FROM usuarios WHERE login = '$nome_usuario'");

 	$row = mysqli_fetch_assoc($resultado);
 	$sexo = $row["sexo"];
 	$nome = $row["nome"];

 	mysqli_close($con);

 	switch ($sexo)
 	{
 		case 1:
 		$saud = "Olá, Sra. ".$nome;
 		break ;
 		case 2:
 		$saud = "Olá, Sr. ".$nome;
 		break ;
 	}

 	switch ($perfil_usuario)
 	{
 		case 1:
 			$perfil = "Padrão";
 		break ;
 		case 2:
 			$perfil = "Administrador";
 		break ;
 	}
 ?>

 <html >
 	<head>
 		<title>
 			Controle de Finanças
 		</title>
 		<link href="css/style.css" rel="stylesheet">

 	</head>
 	<body >
 		<form method ="POST" action ="login.php">
	 		<center>
		 		<!-- <img src="images/ouro.jpg" id="principalId" width ="15%"/> -->
		 		<h1>
		 			Sistema de Controle de Finanças Empresariais
		 		</h1 >
		 		<hr width ="700px" /><br />
		 		<?php
		 			echo $saud ." "."[ Perfil : ".$perfil."]";?> <a href =" logout.php">Sair </a>
		 			<hr width ="700px"/>
		 			<p>Favor, escolha a opção desejada : </p>
		 			<table>
		 				<tr>
		 					<td><a href ="receitas_despesas.php?t=1"><img src="images/incluirReceitas.jpg"></a></td>
		 					<td><a href ="receitas_despesas.php?t=2"><img src="images/incluirDespesas.jpg"></a></td>
		 					<td><a href ="saldosMensaisPlan.php" ><img src="images/planilha.jpg"></a></td>
		 				</tr>
		 				<tr>
		 					<!-- <td><a href ="excluirReceitasDespesas.php"><img src="images/excluirReceitasDespesas.jpg"></a></td> -->
		 					<?php
				 				if ($perfil_usuario ==2){
							?>
							<!-- <td><a href ="addUsuarios.php"><img src="images/adicionarUsuarios.jpg"></a></td>
				 			<td><a href =" delUsuarios.php"><img src="images/excluirUsuarios.jpg"></a></td> -->
				 			<?php } ?>
		 				</tr>
				    </table>
			</center >
		</form >
	</body >
</html >
