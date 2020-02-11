<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Mapa de Sala</title>
			<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        	<script src="ajax.js"></script>
</head>

<body>

<table border="1" width="500">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Disciplina</th>
		            <th>Periodo</th>
					<th>Dia da Semana</th>
					<th>Horario Inicio</th>
					<th>Horario Termino</th>
					<th>Sala ou Anfiteatro</th>
		        </tr>
		    </thead>
		    <tbody id="tabela">
		    </tbody>
		</table>

<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "mapa_sala";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	
	$result_salas = "SELECT * FROM sala";
	$resultado_salas = mysqli_query($conn, $result_salas);
	while($row_sala = mysqli_fetch_assoc($resultado_salas)){
	  echo "<tr>";
	  echo "<td>" "Id:  " . $row_sala['Id'] ."<br>" "</td>";
	  echo "<td>" "Dia da Semana : " . $row_sala['Dia da Semana'] ."<br>";
	  echo "<td>" "Sala : " . $row_sala['Sala'] ."<br>";
	  echo "<td>" "Capacidade : " . $row_sala['Capacidade'] ."<br><hr>";
	  
	$result_anfiteatros = "SELECT * FROM anfiteatro";
	$resultado_anfiteatros = mysqli_query($conn, $result_anfiteatros);
	while($row_anfiteatro = mysqli_fetch_assoc($resultado_anfiteatros)){
	  echo "Id :  " . $row_anfiteatro['Id'] ."<br>";
	  echo "Dia da Semana : " . $row_anfiteatro['Dia da Semana'] ."<br>";
	  echo "Anfiteatro : " . $row_anfiteatro['Anfiteatro'] ."<br>";
	  echo "Capacidade : " . $row_anfiteatro['Capacidade'] ."<br><hr>";
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
		<!--<li><a href="pesquisar_anfiteatro.php"> Pesquisa Anfiteatro</a></li>
		<li><a href="pesquisar_sala.php"> Pesquisa Sala</a></li>-->
		<li><a href="pesquisa_sala_anfiteatro.php"> Pesquisa </a></li>
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