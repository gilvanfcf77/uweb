<?php
	//configurações do banco de dados
	// A senha real foi removida do repositório. Para voltar a funcionar:
	// 1. Crie o banco de dados e importe gerenciador_de_financas.sql.
	// 2. Preencha $servidor, $usuario_bd, $senha_bd e $banco com os dados do seu MySQL.
	// 3. Não faça commit da senha real. Use uma senha nova, diferente da que estava aqui.
	// 4. Antes de publicar em um servidor, renomeie este arquivo para .php e atualize os includes:
	//    com a extensão .sql, o navegador pode baixá-lo como texto, mostrando a senha.
	$servidor = "localhost";
	$usuario_bd = "root";
	$senha_bd = "SUA_SENHA_DO_BANCO";
	$banco = "bancofinancas";
	$con = mysqli_connect($servidor, $usuario_bd,$senha_bd,$banco) or die ("Problema ao Conectar ao Banco de Dados");
 ?>