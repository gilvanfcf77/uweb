<html>
	<head>
		<meta charset='UTF-8' lang = "pt-br">
		<title>Controle de Finanças</title>
		<link href="css/style.css" rel="stylesheet">
		<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	</head>
	<body>
		<?php session_start() ?>
		<form method="POST" action="login.php">
			<center>
				<img class="tema" src="images/ouro.jpg" width="30%" height="30%"/>
				<h1>$$$ Sistema de Controle de finanças $$$</h1>
				<hr width="700px"/> <br>

				<table class="titulos">
					<td><h3>Favor, entre com os dados de identificação para acessar o sistema</h3></td>
				</table>

				<table>
					<br>
					<tr>
						<td
							width="150px"><center><fieldset>Usuário</fieldset></center>
						</td>
						<td width="200px">
							<input type="text" name="username" size="20" autofocus>
						</td>
					</tr>
					<tr>
						<td
							width="150px"><center><fieldset>Senha</fieldset></center>
						</td>
						<td width="200px">
							<input type="password" name="password" size="20">
						</td>
				</table>
				<br>
					<table class="captcha">
						<tr>
							<td><center><img src="captcha.php" alt="Você é humano?"></center></td>
							<td><center><input type="text" name="captcha" size="4" maxlength="4"></center></td>
						</tr>
						<tr>
							<td><a href="index.php">Trocar captcha</a></td>
						</tr>
					</table>
					<br><input class="hovering" type="submit" value="Enviar">
			</form>
			</center>
		</form>
	</body>
</html>
