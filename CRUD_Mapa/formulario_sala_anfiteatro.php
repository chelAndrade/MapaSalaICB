<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Mapa de Sala</title>
</head>

<body>

<form name="frmBusca" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?num_sala=buscar" >
    <input type="text" name="pesquisar" />
    <input type="submit"  value="buscar" />
</form>

<form name="frmBusca" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>?num_anfiteatro=buscar" >
    <input type="text" name="pesquisar" />
    <input type="submit"  value="buscar" />
</form>


 <!--<form method="GET" action="formulario_sala_anfiteatro.php">
		Sala:<input type="text" name="consulta" placeholder="Sala">			
	<input type="submit" value="ENVIAR">	
</form>

 <form method="GET" action="formulario_sala_anfiteatro.php">
		Anfiteatro:<input type="text" name="pesquisar" placeholder="Anfiteatro">
	<input type="submit" value="ENVIAR">	
</form>-->
	 
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