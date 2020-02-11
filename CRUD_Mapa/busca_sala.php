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


$num_sala = isset($_POST['num_sala'])? $_POST['num_sala']: '';

if($num_sala == "buscar"){
	
	$pesquisar = trim($_POST['pesquisa']);
	
	$sql = mysqli_query("SELECT * FROM mapa_sala WHERE num_sala LIKE '%".$pesquisa."%' ORDER BY num_sala");
	
	$numRegistros = mysqli_num_rows($sql);
	
	if($numRegistros != 0){
		while($sala_disponivel = mysqli_fetch_object($sql)){
			echo $sala_disponivel->num_sala. "<br/>";
		}
    }else{
        echo "Nenhuma sala_disponivel foi encontrada com o num_sala". $pesquisa."";
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
		<!--<li><a href="busca_sala_anfiteatro.php"> Busca </a></li>-->
		
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