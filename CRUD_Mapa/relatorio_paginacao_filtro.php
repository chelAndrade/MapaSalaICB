<?php
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//
// Define as variáveis locais 
//
$codigo = "";
$horario = "";
$sala = "";
$anfiteatro = "";
$disciplina = "";
$ComandoSQL = "";

$filtro = '';
$maximo = 0;
$pagina = 0;
$inicio = 0;

// abre conexão com o banco
require_once '../funcoes/conexao.php';

if (isset($_REQUEST['filtro'])) {
	$filtro = $_REQUEST['filtro'];
 }
 
// Maximo de registros por pagina
	$maximo = 5;
	
// Declaração da pagina inicial
	$pagina = intval(($_GET["pagina"]));
	if($pagina == "") {
    	$pagina = "1";
	}
 
// Calculando o registro inicial
	$inicio = $pagina - 1;
	$inicio = $maximo * $inicio;
// Conta os resultados no total da query
//
    $ComandoSQL = "select * from tb_mapasala where horario like '$filtro%'";
	$result= $conn->query("SELECT * FROM tb_mapa");
	$total = $conn->query("SELECT * FROM tb_mapa");

	$ComandoSQL = "select * from tb_mapasala where horario like '$filtro%' 
	LIMIT $inicio, $maximo";
	$result= $conn->query("SELECT * FROM tb_mapa");
	
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>CRUD Mapa</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div id="tudo">
<div id="conteudo">
	<div id="topo">
	  <h1 id="mapa">Mapa de Sala ICB</h1>
	</div>
	<div id="principal">
	  <h2 id="cadastro">CADASTRO DE SALA E ANFITEATRO</h2>
	  <h3 id="consulta">CONSULTA DE SALA E ANFITEATRO</h3>
<?php
    if (mysql_num_rows($result)==0)

	{
              echo "<p>Nenhuma sala ou anfiteatro foram encontrados!</p>\n";
	}
	else
	{
	  echo "<table>";	
	  echo "<tr>\n";
	  echo "<td>\n";
	  echo "<b>Codigo</b>\n";
	  echo "</td>\n";
	  echo "<td>\n";
	  echo "<b>Horario<br />\n";
	  echo "</td>\n";
	  echo "<td>\n";
	  echo "<b>Sala<br/>\n";
	  echo "</td>\n";
	  echo "<td>\n";
	  echo "<b>Anfiteatro<br/>\n";
	  echo "</td>\n";
	  echo "<td>\n";
	  echo "<b>Disciplina</b>\n";
	  echo "</td>\n";
	  echo "<td>\n";
	  echo "<b>Operacao</b>\n";
	  echo "</td>\n";
	  echo "</tr>\n";
	  echo "<tr><td colspan='9' height='5' bgcolor='#5FB404'></td></tr>\n";
	 
		while ($row = $result->fetch(PDO::FETCH_OBJ))  
	  {
		echo "<tr>\n";
		echo "<td>\n";
		
		echo $row->codigo . "&nbsp;\n";
		echo "</td>\n";
		echo "<td>\n";
		
		echo $row->horario . "&nbsp;\n";
		echo "</td>\n";
		echo "<td>\n";
		
		echo $row->sala . "&nbsp;\n";
		echo "</td>\n";
		echo "<td>\n";
		
		echo $row->anfiteatro . "&nbsp;\n";
		echo "</td>\n";
		echo "<td>\n";
		
		echo $row->disciplina . "&nbsp;\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<td>\n";
		echo "<a href='alteracao_exclusao_livros.php?codigo=".$row->codigo ."'>";
		
		echo "<img src='imagens/b_edit.png' border='0'><img src='imagens/b_drop.png' border='0'></a>&nbsp;\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr><td colspan='9' height='3' bgcolor='#F0F0F0'></td></tr>\n";
		echo "</table>";
		
		
	$conn = null;
		$menos = $pagina - 1;
	$mais = $pagina + 1;
 	$pgs = ceil($total / $maximo);
	if($pgs > 1 ) {
 			echo "<br clear='all'/><br /><br />";
    // Mostragem de pagina
   		if($menos > 0) {
			echo "<a href='relatorio_paginacao_filtro.php?pagina=$menos&filtro=$filtro'>anterior</a>&nbsp; ";
   		}

    // Listando as paginas
		for($i=1;$i <= $pgs;$i++) {
			if($i != $pagina) {
				echo "<a href='relatorio_paginacao_filtro.php?pagina=$i&filtro=$filtro'>$i</a> | ";
			} else {
				echo " <strong><font color='#000'>$i</font></strong> | ";
			}
		}
 
		if($mais <= $pgs) {
			echo "<a href='relatorio_paginacao_filtro.php?pagina=$mais&filtro=$filtro'>Pr&oacute;xima</a>";
		}
	}

	
	?>
	</div> <!-- Fim da div#principal -->

	<div id="auxiliar">
	<h4>MENU</h4>
	<ul>
		<div id="nav">
		<li class="um"><a href="index.php">Home</a></li>
		<li><a href="inclusao_sala_anfiteatro.php">Inclusao de Sala e Anfiteatro</a></li>
		<li><a href="consulta_sala_anfiteatro.php">Consulta (Alteracao e Exclusao) de Sala</a>
		<li><a href="relatorio_filtro.php">Relatorio</a></li>
	</ul>

	</div> <!-- Fim da div#auxiliar -->

	<div class="clear"></div>

</div> <!-- Fim da div#conteudo -->
<div id="rodape">
 <p> © 2020 </p>
</div>
</div> <!-- Fim da div#tudo -->
</body>
</html>
		