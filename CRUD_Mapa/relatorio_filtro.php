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
	  <h1>Mapa de Sala ICB</h1>
	</div>
	<div id="principal">
	  <h3>Mapa de Sala ICB</h3>
		<form name="form_acesso" method="post" action="relatorio_paginacao_filtro.php">
			<table width="600">
			<tr>
			  <td>Sala: 
				<input name="filtro" type="text" id="filtro" size="30" maxlength="30"></td>
			</tr>
			<tr>
			  <td>Anfiteatro: 
				<input name="filtro" type="text" id="filtro" size="30" maxlength="30"></td>
			</tr>
		  </table>
		   <div align="center"><br>
			 <input type="submit" name="submit" value="Pesquisar">
			</div>
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
	</ul>

	</div> <!-- Fim da div#auxiliar -->

	<div class="clear"></div>

</div> <!-- Fim da div#conteudo -->
<div id="rodape">
  <p> ©2020 </p>
</div>
</div> <!-- Fim da div#tudo -->
</body>
</html>