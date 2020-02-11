<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Mapa de Sala</title>
</head>

<body>


<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "mapa_sala";
	
// Conexão com o banco de dados
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die("Não foi possível a conexão com o Banco");
// Selecionando banco
//$db = mysqli_select_db("sala_disponivel", $conn) or die("Não foi possível selecionar o Banco");
 
// Recuperamos a ação enviada pelo formulário
$num_sala = isset($_POST['num_sala'])? $_POST['num_sala']: '';
 
// Verificamos se a ação é de busca
if($num_sala == "buscar"){
 
	// Pegamos a pesquisa
	$pesquisa = trim($_POST['pesquisa']);
 
	// Verificamos no banco de dados produtos equivalente a sala digitada
	$sql = mysqli_query("SELECT * FROM mapa_sala WHERE num_sala LIKE '%".$pesquisa."%' ORDER BY num_sala");
 
	// Descobrimos o total de registros encontrados
	$numRegistros = mysqli_num_rows($sql);
 
	// Se houver pelo menos um registro, exibe-o
	if ($numRegistros != 0) {
		// Exibe as salas
		while($sala_disponivel = mysqli_fetch_object($sql)){
			echo $sala_disponivel->num_sala. "<br/>";
		}
	// Se não houver registros
	} else {
		echo "Nenhuma sala_disponivel foi encontrada com o num_sala". $pesquisa."";
	}
}

// Recuperamos a ação enviada pelo formulário
$num_anfiteatro = isset($_POST['num_anfiteatro'])? $_POST['num_anfiteatro']: '';
 
// Verificamos se a ação é de busca
if($num_anfiteatro == "buscar"){
 
	// Pegamos a pesquisa
	$pesquisa = trim($_POST['pesquisa']);
 
	// Verificamos no banco de dados produtos equivalente a sala digitada
	$sql = mysqli_query("SELECT * FROM mapa_sala WHERE num_anfiteatro LIKE '%".$pesquisa."%' ORDER BY num_anfiteatro");
 
	// Descobrimos o total de registros encontrados
	$numRegistros = mysqli_num_rows($sql);
 
	// Se houver pelo menos um registro, exibe-o
	if ($numRegistros != 0) {
		// Exibe os anfiteatros 
		while($anfiteatro_disponivel = mysqli_fetch_object($sql)){
			echo $anfiteatro_disponivel->num_anfiteatro. "<br/>";
		}
	// Se não houver registros
	} else {
		 echo "Nenhuma anfiteatro_disponivel foi encontrada com o num_anfiteatro". $pesquisa."";
	}
}
?>


<div id="auxiliar">
	<h4>MENU</h4>
	<ul>
		<div id="nav">
		<li class="um"><a href="mapa.php">Home</a></li>
		<li><a href="inclusao_sala_anfiteatro.php">Inclusao de Sala e Anfiteatro</a></li>
		<li><a href="consulta_sala_anfiteatro.php">Consulta (Alteracao e Exclusao) de Sala</a>
		<li><a href="relatorio_filtro.php">Relatorio</a></li>
		<li><a href="formulario_sala_anfiteatro.php"> Formulario </a></li>
		<li><a href="busca_sala_anfiteatro.php"> Busca </a></li>
		
	</ul>

	</div> <!-- Fim da div#auxiliar -->

	<div class="clear"></div>

</div> <!-- Fim da div#conteudo -->
<div id="rodape">
 <p>  © 2020 </p>
</div>
</div> <!-- Fim da div#tudo -->
</body>

</html>