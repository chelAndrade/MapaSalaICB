<?php
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include("funcoes/verifica_usuario_logado.php");
//
// Define as variáveis locais 
//
$codigo = "";
$horario = "";
$sala = "";
$anfiteatro = "";
$disciplina = "";
$numero_alunos = "";
$ComandoSQL = "";

// abre conexão com o banco
require_once '../funcoes/conexao.php';
$codigo = $_GET['codigo'];
// abre conexão com o banco
switch ($_POST['form_operacao']){
	case "alteracao":
	try{
		
		$codigo = $_POST['codigo'];
		$horario = $_POST['horario'];
		$sala = $_POST['sala'];
		$anfiteatro = $_POST['anfiteatro'];
		$disciplina = $_POST['disciplina'];
		$numero_alunos = $_POST['numero_alunos'];
		
		$stmt = $conn->prepare('UPDATE tb_mapasala SET horario =:horario, sala =:sala, anfiteatro =:anfiteatro, disciplina =:disciplina,numero_alunos =:numero_alunos');
			
			$stmt->bindValue(':codigo',$codigo);
			$stml->bindValue(':horario', $horario);
			$stml->bindValue(':sala', $sala);
			$stml->bindValue(':anfiteatro', $anfiteatro);
			$stml->bindValue(':disciplina', $disciplina);
			$stml->bindValue(':numero_alunos', $numero_alunos);
			$stml->execute();
					 
		 echo "<script>alert('Sala e Anfiteatro alterados com sucesso!';
		 window.location='consulta_sala_anfiteatro.php';</script>";
		 exit;
		 break;
	}
	catch(PDOException $e){
		//caso ocorra uma exceção, exibe na tela
		print "Erro!: " . $e->getMessage(). "\n";
		die();
	}

	case "exclusao":
	try{
		//recebe os dados formulario
	$codigo = $_POST['codigo'];
	$stmt = $conn->prepare('DELETE from tb_mapasala WHERE codigo =:codigo'); 
	$stmt->bindValue(':codigo',$codigo);
	$stmt->execute();
	  
	echo "<script>alert('Sala e Anfiteatro Excluídos com sucesso!';
	window.location='consulta_sala_anfiteatro.php';</script>";
	exit;
	break;
	
}catch(PDOException $e){
		//caso ocorra uma exceção, exibe na tela
		print "Erro!: " . $e->getMessage(). "\n";
		die();
	}
}
//executa uma instrucao SQL de consulta
$ComandoSQL = "select * from tb_mapasala where codigo = '" . $codigo . "'";
$result = $conn->query($ComandoSQL);
if (!$result){
	echo "<script>alert('Sala e Anfiteatro não encontrado!');
	window.location='consulta_sala_anfiteatro.php';</script>";
	exit;
}

$row = $result->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>CRUD Mapa</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<script LANGUAGE="JavaScript">
  function define_operacao(operacao){
    if (operacao == "alt") {
       document.form_alteracao_exclusao_sala_anfiteatro.form_operacao.value = "alteracao";
    }
    if (operacao == "exc") {
       document.form_alteracao_exclusao_sala_anfiteatro.form_operacao.value = "exclusao";
    }
    document.form_alteracao_exclusao_sala_anfiteatro.submit();
  }
  </script>
</head>
<body>
<div id="tudo">
<div id="conteudo">
	<div id="topo">
	   <h1> Mapa de Sala ICB </h1>
	</div>
	<div id="principal">
	  <!--<a href="mapa.php">Para efetuar ALteracao ou Exclusao de Sala e Anfiteatro faca seu login!</a>-->
	  <h2>CADASTRO DE SALA E ANFITEATRO</h2>
	  <h3>ALTERACAO E EXCLUSAO DE SALA E ANFITEATRO</h3>
	  <form method="POST" action="alteracao_exclusao_sala_anfiteatro.php" name="form_alteracao_exclusao_sala_anfiteatro">
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
			  <input name="anfiteatro" type="anfiteatro" id="tema" size="10" maxlength="10"value="<?php echo $row->anfiteatro ?>" required="required">*
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
			<td colspan='2'class="td_c">* dados obrigatórios </td>
		  </tr>
		  <tr>
			<td colspan='2' class="td_c">
			  <input type="hidden" name="form_operacao" value="consulta">
			  <input name="alterar" type="button" value="Alterar" onClick="define_operacao('alt');">
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
			  <input name="excluir" type="button" value="Excluir" onClick="define_operacao('exc');">
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
			<li><a href="consulta_sala_anfiteatro.php">Consulta (Alteracao e Exclusao) de Sala e Anfiteatro</a>
			<li><a href="relatorio_filtro.php">Relatorio</a></li>
			<li><a href="formulario_sala_anfiteatro.php"> Formulario </a></li>
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