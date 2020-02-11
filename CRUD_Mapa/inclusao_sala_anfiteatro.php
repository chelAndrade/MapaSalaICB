<?php
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//include("funcoes/verifica_usuario_logado.php");
//
// Define as variáveis locais 
//

$codigo = "";
$horario = "";
$sala = "";
$anfiteatro = "";
$disciplina = "";
$numero_alunos = "";
$data_hora_processamento = date("Y-m-d H:i:s"); 
$ComandoSQL = "";

$ComandoSQL = "";

if ($_POST['form_operacao'] == "solicitacao_sala_anfiteatro") {
	require_once '../funcoes/conexao.php';
	
	try{
// abre conexão com o banco
		
// recebe os dados do formulário
	
	$codigo = $_POST['codigo'];
		$horario = $_POST['horario'];
		$sala = $_POST['sala'];
		$anfiteatro = $_POST['anfiteatro'];
		$disciplina = $_POST['disciplina'];
		$numero_alunos = $_POST['numero_alunos'];
	
	$stmt = $conn->prepare('INSERT INTO tb_mapasala VALUES(:codigo,:horario,:sala,
							:anfiteatro,:disciplina,:numero_alunos)');
	
	$stml->bindValue(':horario', $horario);
	$stml->bindValue(':sala', $sala);
	$stml->bindValue(':anfiteatro', $anfiteatro);
	$stml->bindValue(':disciplina', $disciplina);
	$stml->bindValue(':numero_alunos', $numero_alunos);
	$stmt->execute();
	}
	
	
	catch (PDOException $e){
		//caso ocorra uma exceção, exibe na tela
		print "Erro!: " . $e->getMessage(). "\n";
		die();
	}
	  echo "<script>alert('Sala e Anfiteatro cadastrado com sucesso!');window.location='solicitacao_sala_anfiteatro.php';</script>";
	
	}	
	
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
 <meta charset="utf-8"> 

<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title> Ajax -  Cadastro de Sala e Anfiteatro</title>
	
</head>
<body>
<div class="container">


<div id="tudo">
<div id="conteudo">
	<div id="topo">
	  <h1> Mapa de Sala ICB </h1>
	</div>
	<div id="principal">
	 <h2>CADASTRO DE SALA E ANFITEATRO</h2>
	 <h3>ALTERACAO E EXCLUSAO DE SALA E ANFITEATRO</h3>
	  <a href="index.php">Para efetuar Solicitacao de Sala e Anfiteatro faca seu login!</a>
   </div>
    <div id="lista_sala_anfiteatro">
	  <form method="POST" action="solicitacao_sala_anfiteatro.php" name="form_solitacao_sala_anfiteatro">
		<table width="600">
		<tr>
			<td class="td_r">Codigo:</td>
			<td>
  			  <input name="codigo" type="text" id="codigo" size="1" maxlength="10" value=" <?php echo $row->codigo ?>" required="required">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Horario:</td>
			<td>
			  <input name="horario" type="text" id="horario" size="30" maxlength="30"value=" <?php echo $row->horario ?>" required="required">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Sala:</td>
			<td>
			  <input name="sala" type="text" id="sala" size="3" maxlength="3"value=" <?php echo $row->sala ?>" required="required">*			
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Anfiteatro:</td>
			<td>
			  <input name="anfiteatro" type="anfiteatro" id="anfiteatro" size="10" maxlength="10"value="<?php echo $row->anfiteatro ?>" required="required">*
			</td>
		  </tr>
		  <tr>
			<td class="td_r">Disciplina:</td>
			<td>
  			  <input name="disciplina" type="text" id="disciplina" size="20" maxlength="20" value=" <?php echo $row->disciplina ?>" required="required">*
			</td>
		  </tr>
		    <tr>
			<td class="td_r">Numero Alunos:</td>
			<td>
  			  <input name="numero_alunos" type="text" id="numero_alunos" size="20" maxlength="20" value=" <?php echo $row->numero_alunos ?>" required="required">*
			</td>
		  </tr>
		  <tr>
			<td colspan='2'class="td_c">* dados obrigatorios </td>
		  </tr>
		  <tr>
			<td colspan='2' class="td_c">
				<br /><input type="hidden" name="form_operacao" value="solicitacao_sala_anfiteatro">
				<input type="submit" name="Button" value="Solicitacao Sala ou Anfiteatro">
			</td>
		  </tr>
		  </table>
	  </form> 

	  </div> <!-- Fim da div#principal --> 

	<div id="auxiliar">
	<h4>MENU</h4>
	<ul>
		<div id="nav">
		<li class="um"><a href="mapa.php">Home</a></li>
		<li><a href="inclusao_sala_anfiteatro.php">Inclusao de Sala e Anfiteatro</a></li>
		<li><a href="consulta_sala_anfiteatro.php">Consulta (Alteracao e Exclusao) de Sala</a>
		<li><a href="relatorio_filtro.php">Relatorio</a></li>
		<li><a href="formulario_sala_anfiteatro.php"> Formulario </a></li>
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