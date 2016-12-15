 	<?php
 	include "includes/conecta_mysql.sql";

 	if(isset($_GET["id"]))
 	{
 		$query = "DELETE FROM receita_despesas WHERE id = $_GET[id]";
 		if(mysqli_query($con,$query))
 			echo " deletado com sucesso";
 		else
 			echo "Falha ao deletar";
 	}



	 mysqli_close ( $con );
?>
<a href="saldosMensaisPlan.php">Voltar</a>
