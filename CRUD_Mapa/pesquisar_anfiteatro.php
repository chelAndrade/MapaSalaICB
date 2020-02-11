<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Mapa de Sala</title>
	    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="ajax.js"></script>
			<style type="text/css">
				table alter,th,td{
					border:3px solid black;
					background:#ffc;
					
				}
		
				th {
					background-color:black;
					color:yellow;
				}
			</style>  
</head>

<body>
 <h2>Mapa de Sala ICB</h2>
<table id="tabela" >
		    <!--<thead>-->
		        <tr>
		            <th><td>ID</th></td>
		            <th><td>Disciplina</th></td>
					<th><td>Codigo</th></td>
		            <th><td>Periodo</th></td>
					<th><td>Dia da Semana</th></td>
					<th><td>Horario Inicio</th></td>
					<th><td>Horario Termino</th></td>
					<th><td>Sala ou Anfiteatro</th></td>
					<th><td>Quantidade de Matriculados</th></td>
		        </tr>
		    <!--</thead>
		    <tbody id="tabela">
		    </tbody>-->
		</table>
<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "mapa_sala";
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	$result_anfiteatros = "SELECT * FROM mapa2020";
	$resultado_anfiteatros = mysqli_query($conn, $result_anfiteatros);
	while($row_anfiteatro = mysqli_fetch_assoc($resultado_anfiteatros)){
	  echo "<table>";	
	  echo "<tr>";	
	  echo "<td> Id: " . $row_anfiteatro['Id'] ."<br> </td>";
	  echo "<td> Disciplina: " . $row_anfiteatro['Disciplina'] ."<br> </td>";
	  echo "<td> Codigo: " . $row_anfiteatro['Codigo'] ."<br> </td>";
	  echo "<td> Periodo: " . $row_anfiteatro['Periodo'] ."<br> </td>";
	  echo "<td> Dia da Semana: " . $row_anfiteatro['Dia da Semana'] ."<br> </td>";
	  echo "<td> Horario Inicio: " . $row_anfiteatro['Horario Inicio'] ."<br> </td>";
	  echo "<td> Horario Termino: " . $row_anfiteatro['Horario Termino'] ."<br> </td>";
	  echo "<td> Sala/Anfiteatro: " . $row_anfiteatro['Sala/Anfiteatro'] ."<br> </td>";
	  echo "<td> Quantidade de Matriculados: " . $row_anfiteatro['Quantidade de Matriculados'] ."<br> </td> <hr>";
	  echo "</tr>";
	  echo "</table>";
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
		<li><a href="pesquisar_anfiteatro.php"> Pesquisa Anfiteatro</a></li>
		<li><a href="pesquisar_sala.php"> Pesquisa Sala</a></li>
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