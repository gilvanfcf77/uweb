<?php

	include "includes/valida_sessao.inc";
	$nome_usuario = $_SESSION["nome_usuario"];

 // £resultado = mysql_query (" SELECT id FROM usuarios WHERE login =’ £nome_usuario ’");
 // £id = mysql_result ( £resultado ,0," id ");
 // mysql_close ( £con );
	$t= $_GET["t"];

	switch ($t)
	 {
		case 1:
			$tipo = "receita";
			break;

		case 2:
			$tipo = "despesa";
			break;

		default:
			# code...
			break;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Controle de Finanças</title>
	</head>
	<body>

	<center>
		<img src="ouro.jpg" width="15%">
		<h1>Sistema de Controle de Finanças Empresarial</h1>
		<hr width="700px"> <br/>Formulário de Cadastro de
		<?php echo $tipo ?>(* Obrigatório) <br><br>
		<form method="POST" action="gravar.php" name="fCadRecDes">
			<table>
				<tr>
					<td width="130px">
					Nome*:
					</td>
					<td width="200px">
						<input size="80" type="text" name="nome">
					</td>
				</tr>
				<tr>
					<td width ="130 px">
						Classe *:
					</td >
 					<td width ="200 px">
 						<input type =" radio " name =" classe " value ="1" checked >Variável
 						<input type =" radio " name =" classe " value ="2" onclick ="">Fixa
 					</td >
				</tr>

				<tr >
 					<td width ="130 px">Mês de Referência *: </td >
 					<td width ="200 px">
                        <select name ="mesRef">
                            <option value ="1">Janeiro </option >
                            <option value ="2">Fevereiro </option >
                            <option value ="3">¸cMaro </option >
                             <option value ="4">Abril </option >
                             <option value ="5">Maio </option >
                             <option value ="6">Junho </option >
                             <option value ="7">Julho </option >
                             <option value ="8">Agosto </option >
                             <option value ="9">Setembro </option >
                             <option value ="10">Outubro </option >
                             <option value ="11">Novembro </option >
                             <option value ="12">Dezembro </option >
                        </select >
                     </td >
                </tr >
                <tr >
                    <td width ="130 px">Valor * (R$ ): </td >
                    <td width ="200 px">
                    <input size ="10" type =" text " name =" valor "> ( formato (xx.xx ))
                    </td >
                    </tr >
                     <tr >
                     <td width ="130 px">¸c~aDescrio : </td >
                     <td width ="200 px">
                     <textarea rows ="7" cols ="69" name =" descricao " ></textarea >
                    </td >
                     </tr >
                     <tr >
                     <td width ="130 px">
                     <input type =" button " value =" Voltar " name =" voltar "
                     onclick =" javascript : history . back ()">
                     </td >
                     <td width ="200 px">
                     <input type =" reset " value =" Limpar ">
                     <input type =" submit " value =" Salvar ">
                     <input type =" hidden " name ="t"
                     value =" <?php echo $t?>">
                     </td >
                     </tr >

			</table>
		</form>
	</center>

	</body>
</html>
