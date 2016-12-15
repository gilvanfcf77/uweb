<?php
 	include "includes/valida_sessao.inc";
 	include "includes/conecta_mysql.sql";
 	
 	$nome_usuario = $_SESSION ["nome_usuario"];
 	$id_usuario = $_SESSION ["id_usuario"];
 	if(isset($_GET["mes"]))
 		$mes = $_GET["mes"];
 	else
 		$mes = 1;
 	$meses = array ("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho",
 	"Agosto","Setembro","Outubro","Novembro","Dezembro");
 	
 	$query = " SELECT * FROM receita_despesas
 	WHERE classe = 1 and mes_referencia = $mes and tipo =1 and
 	usuario = $id_usuario";

		// echo $query;

 	$resRecVar = mysqli_query ($con," SELECT * FROM receita_despesas
 	WHERE classe = 1 and tipo=1 and usuario = $id_usuario");

 	$resRecFix = mysqli_query ($con," SELECT * FROM receita_despesas
 	WHERE classe =1 and tipo =2 and usuario = $id_usuario");
	
	$resDesVar = mysqli_query ($con," SELECT * FROM receita_despesas
 	WHERE classe =2 and tipo=1 and usuario = $id_usuario");
 		
 	$resDesFix = mysqli_query ($con," SELECT * FROM receita_despesas
 	WHERE classe =2 and tipo =2 and usuario = $id_usuario");

 // Valores Totais Receitas e Despesas

	 $recVarTotal = 0; $recFixTotal = 0; $desVarTotal = 0; $desFixTotal = 0;
	 mysqli_close ( $con );
?>

 <html>
 	<head>
 		<title>Controle de Finanças</title>
		<meta charset = "UTF-8" > 
 	</head>

 	<body>
 		<link href="css/style.css" rel="stylesheet">
 
 		<form method ="GET" name ="fmes" action ="saldosMensaisPlan.php">
 
 			<center>
	 			<img src="images/ouro.jpg" width ="15%"/>
	 			<h1> 
	 				Sistema de Controle de Finanças Empresarial 
	 			</h1>
	 			<hr width ="700px" /><br/>
	 			<p>Favor, escolha o mês que deseja visualizar :
					<select name ="mes">
						<option value ="0" onclick ="javascript:document.fmes.submit();"></option>
						<option value ="1" onclick ="javascript:document.fmes.submit();"> Janeiro </option>
						<option value ="2" onclick ="javascript:document.fmes.submit();"> Fevereiro </option>
						<option value ="3" onclick ="javascript:document.fmes.submit();"> Marco </option>
						<option value ="4" onclick ="javascript:document.fmes.submit();"> Abril </option>
						<option value ="5" onclick ="javascript:document.fmes.submit();"> Maio </option>
						<option value ="6" onclick ="javascript:document.fmes.submit();"> Junho </option>
						<option value ="7" onclick ="javascript:document.fmes.submit();"> Julho </option>
						<option value ="8" onclick ="javascript:document.fmes.submit();"> Agosto </option>
						<option value ="9" onclick ="javascript:document.fmes.submit();"> Setembro </option>
						<option value ="10" onclick ="javascript:document.fmes.submit();"> Outubro </option>
						<option value ="11" onclick ="javascript:document.fmes.submit();"> Novembro </option>
						<option value ="12" onclick ="javascript:document.fmes.submit();"> Dezembro </option> 
					</select>
					<br> <br>
					<input type="submit" name="Visualizar"> <br> <br> <br>
				</p>

 				<?php 
 					if (isset($mes))
 					{?>
 						<fieldset class="field"><b class="receitas"> Lista de RECEITAS - Mês de <?php echo $meses[$mes -1] ?></b></fieldset> <br>
 						<fieldset class="fieldtitulo"><b class="fieldtitulo">Fixas</b></fieldset>
 						<hr width ="700px"/>
 						<table width ="700px" border ="0px" >
	 						<th> Nome </th> <th > Data e Hora de Cadastro </th ><th > Valor (R$)</th >
	 						<?php
	 						while ($linha = mysqli_fetch_array($resRecFix , MYSQL_ASSOC))
							{
								 echo "<tr >";
								 echo "<td align ='center' width ='33%'>".$linha ["nome"]." </td >";
								 echo "<td align ='center' width ='33%'>".$linha ["datahora"]." </td >";
								 echo "<td align ='center' width ='33%'>".$linha ["valor"]." </td >";
								 echo " </tr >";
								 echo "<a href='deletar_despesa.php?id=$linha[id]'>deletar</a>";
								 // Incrementar o valor total
								 $recFixTotal = $recFixTotal + $linha["valor"];
						 	}?>
						 	<tr>
								<td width ="33%"></td ><td align ='right' width ="33%"><br><br><b class="total"> Total: <?php echo $recFixTotal ?></b></td> <td></td>
						 	</tr >
					 	</table ><br>
					 		<fieldset class="fieldtitulo"><b class="fieldtitulo">Variáveis</b></fieldset>
					 		<hr width ="700 px"/>
					 	<table width ="700px" border ="0px">
					 		<th> Nome </th> <th > Data e Hora de Cadastro </th ><th > Valor (R$)</th >
					 	<?php
						while ( $linha = mysqli_fetch_array ($resRecVar , MYSQL_ASSOC ))
						{
						 	echo "<tr >";
						 	echo "<td align ='center' width ='33%'>".$linha ["nome"]." </td >";
						 	echo "<td align ='center' width ='33%'>".$linha ["datahora"]." </td >";
						 	echo "<td align ='center' width ='33%'>".$linha ["valor"]." </td >";
						 	echo " </tr >";
						 	// Incrementar o valor total
						 	$recVarTotal = $recVarTotal + $linha ["valor"];
						 	 echo "<a href='deletar_despesa.php?id=$linha[id]'>deletar</a>";
						} ?>
					 	<tr>
					 		<td width ="33%"></td ><td align ='right' width ="33%"><br><br><b class="total"> Total: <?php echo $recVarTotal ?></b></td> <td></td>
					 	</tr>
					 	</table><br> <br> <br> <br>
					 	<fieldset class="field"><b class="despesas"> Lista de DESPESAS - Mês de <?php echo $meses [$mes -1] ?> </b></fieldset> <br>
						<fieldset class="fieldtitulo"><b class="fieldtitulo">Fixas</b></fieldset>
						<hr width ="700px"/>
						<table width = "700px" border ="0px" >
							<th> Nome </th> 
							<th> Data e Hora de Cadastro </th>
							<th> Valor(R$)</th>
							<?php
							while ( $linha = mysqli_fetch_array ($resDesFix , MYSQL_ASSOC ))
							{
								echo "<tr >";
								echo "<td align ='center' width ='33%'>".$linha ["nome"]." </td >";
								echo "<td align ='center' width ='33%'>".$linha ["datahora"]." </td >";
								echo "<td align ='center' width ='33%'>".$linha ["valor"]." </td >";
								echo " </tr >";
								echo "<a href='deletar_despesa.php?id=$linha[id]'>deletar</a>";
								// Incrementar o valor total
								$desFixTotal = $desFixTotal + $linha ["valor"];
							} ?>
							<tr>
							<td width ="33%"></td ><td align ='right' width ="33%"><br><br><b class="total"> Total: <?php echo $desFixTotal ?></b></td> <td></td>
							</tr >
					 	</table><br/>
					 	<fieldset class="fieldtitulo"><b class="fieldtitulo">Variáveis</b></fieldset>
					 	<hr width ="700px"/>
						<table width ="700px" border ="0px" >
							<th> Nome </th> <th > Data e Hora de Cadastro </th ><th > Valor (R$)</th >
					 	<?php
							while ( $linha = mysqli_fetch_array ($resDesVar , MYSQL_ASSOC ))
					 		{
								echo "<tr >";
								echo "<td align ='center' width ='33%'>".$linha ["nome"]." </td >";
								echo "<td align ='center' width ='33%'>".$linha ["datahora"]." </td >";
								echo "<td align ='center' width ='33%'>".$linha ["valor"]." </td >";
								echo " </tr >";
								echo "<a href='deletar_despesa.php?id=$linha[id]'>deletar</a>";
								// Incrementar o valor total
								$desVarTotal = $desVarTotal + $linha["valor"];
					 		} ?>
					 		<tr>
					 			<td width ="33%"></td ><td align ='right' width ="33%"><br><br><b class="total"> Total: <?php echo $desVarTotal ?></b></td> <td></td>
					 		</tr>
					 	</table > <br> <br> <br> <br> <br> <br> <br> <br>
					 	<fieldset class="field"><b class="saldo">SALDO </b></fieldset>
					 	<hr width ="700px" / >
					 	<table width ="700px" border ="0px">
					 		<tr>
					 			<td width ="50%">Receitas : </td>
					 			<td align ="right" width ="50%" ><?php echo ($recFixTotal + $recVarTotal); ?> </td>
					 		</tr>
							 <tr>
								<td width ="50%">Despesas : </td>
								<td align ="right" width ="50%" ><?php echo ( $desFixTotal + $desVarTotal ); ?> </td>
							 </tr>
							 <tr>
								<td width ="50%">Saldo : </td>
								<td align ="right" width ="50%">
								<?php echo ( $recFixTotal + $recVarTotal )-( $desFixTotal + $desVarTotal ); ?></td>
							 </tr>
							 <tr>
							 	<td></td>
							 	<td>
							 		
								</td>
								<td>
							 	</td>
							 </tr>
					 	</table>
					 	<br>
					 	<input type ="button" onClick ="location.href ='principal.php'" value ='Voltar '>
 						<?php
 					}?>
 			</center>
 		</form >
 	</body >
</html >