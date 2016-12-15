<?php
 	include "includes/valida_sessao.inc";
 	include "includes/conecta_mysql.sql";
 	
 	$nome_usuario = $_SESSION ["nome_usuario"];
 	$id_usuario = $_SESSION ["id_usuario"];
 	
 	$mes = $_GET["mes"];
 	
 	$meses = array ("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho",
 	"Agosto","Setembro","Outubro","Novembro","Dezembro");
 	
 	$resRecVar = mysqli_query ($con," SELECT * FROM receitas_despesas
 	WHERE classe =1 and mes_referencia = $mes and tipo =1 and
 	usuario = $id_usuario");
	
	$resDesVar = mysqli_query ($con," SELECT * FROM receitas_despesas
 	WHERE classe =1 and mes_referencia = $mes and tipo =2 and
 	usuario = $id_usuario ");
 	
 	$resRecFix = mysqli_query ($con," SELECT * FROM receitas_despesas
 	WHERE classe =2 and tipo =1 and usuario = $id_usuario ");
 	
 	$resDesFix = mysqli_query ($con," SELECT * FROM receitas_despesas
 	WHERE classe =2 and tipo =2 and usuario = $id_usuario ");

 // Valores Totais Receitas e Despesas

	 $recVarTotal = 0; $recFixTotal = 0; $desVarTotal = 0; $desFixTotal = 0;
	 mysqli_close ( $con );
?>
