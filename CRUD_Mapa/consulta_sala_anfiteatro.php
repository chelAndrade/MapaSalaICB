<?php
require_once '..funcoes/conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT id, codigo, horario, sala, anfiteatro, disciplina, numero_alunos FROM tab_mapa_sala';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$mapa_sala = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, codigo, horario, sala, anfiteatro, disciplina , numero_alunos FROM tab_mapa_sala WHERE sala LIKE :sala OR anfiteatro LIKE :anfiteatro';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':sala', $termo.'%');
	$stm->bindValue(':anfiteatro', $termo.'%');
	$stm->execute();
	$mapa_sala = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Mapa de Sala</title>
</head>

<head>
    <meta charset="utf-8">
	<title>Listagem de Salas</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<head>
    <meta charset="utf-8">
	<title>Listagem de Anfiteatro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<legend><h1>Listagem de Salas</h1></legend>

			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome a sala">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='index.php' class="btn btn-primary">Ver Todos</a>
			</form>

			<a href='alteracao_exclusao_sala_anfiteatro.php' class="btn btn-success pull-right">Cadastro de Salas</a>
			<div class='clearfix'></div>

			<?php if(!empty($mapa_sala)):?>

				<table class="table table-striped">
					<tr class='active'>
						<th>Id</th>
						<th>Codigo</th>
						<th>Horario</th>
						<th>Sala</th>
						<th>Disciplina</th>
						<th>Numero de Alunos</th>
					</tr>
					<?php foreach($mapa_sala as $mapa_sala):?>
						<tr>
							<td><?=$mapa_sala->id?></td>
							<td><?=$mapa_sala->codigo?></td>
							<td><?=$mapa_sala->horario?></td>
							<td><?=$mapa_sala->sala?></td>
							<td><?=$mapa_sala->disciplina?></td>
							<td><?=$mapa_sala->numero_alunos?></td>
							<td>
								<a href='alteracao_exclusao_sala_anfiteatro.php?id=<?=$mapa_sala->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$mapa_sala->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<h3 class="text-center text-primary">Não existem salas cadastradas!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<div class='container'>
		<fieldset>

			<legend><h1>Listagem de Anfiteatro</h1></legend>

			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o anfiteatro">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='index.php' class="btn btn-primary">Ver Todos</a>
			</form>

			<a href='alteracao_exclusao_sala_anfiteatro.php' class="btn btn-success pull-right">Cadastro de Anfiteatro</a>
			<div class='clearfix'></div>

			<?php if(!empty($mapa_sala)):?>

				<table class="table table-striped">
					<tr class='active'>
						<th>Id</th>
						<th>Codigo</th>
						<th>Horario</th>
						<th>Anfiteatro</th>
						<th>Disciplina</th>
						<th>Numero de Alunos</th>
					</tr>
					<?php foreach($mapa_sala as $mapa_sala):?>
						<tr>
							<td><?=$mapa_sala->id?></td>
							<td><?=$mapa_sala->codigo?></td>
							<td><?=$mapa_sala->horario?></td>
							<td><?=$mapa_sala->anfiteatro?></td>
							<td><?=$mapa_sala->disciplina?></td>
							<td><?=$mapa_sala->numero_alunos?></td>
							<td>
								<a href='alteracao_exclusao_sala_anfiteatro.php?id=<?=$cliente->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$cliente->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<h3 class="text-center text-primary">Não existem anfiteatros cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
	
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
