<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Mapa de Sala ICB</title>52
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>

<div id="tudo">

	<div id="conteudo">
	
		<div id="topo">
		
		  <h1>Mapa de Sala ICB</h1>
		</div>
		
		<div id="principal">
		
		  <h5> Bem-vindo ao site onde que sera feito a sua reserva da sala ou anfiteatro! </h5> 	
		</div> <!-- Fim da div#principal -->
		
<?php
   /*session_start();
   
    //Recebe o valor digitado no campo sala e anfiteatro
	
    $sala = $_POST['sala'];
	$anfiteatro = $_POST['anfiteatro']; 
	$quanAlunos = $_POST['quanAlunos'];
	

   if(isset($_POST["quanAlunos"])){
        echo $_POST["quanAlunos"];
        echo "<br>";

        //$sala = $_POST["quanAlunos"];
		$quanAlunos = $_POST["quanAlunos"];

        if($quanAlunos <= 60){
            echo "Sala informada esta ocupada";
        }else{
            echo "Sala disponivel";
        }
    }
	
	if(isset($_POST["anfiteatro"],$_POST["quanAlunos"])){
		echo $_POST["anfiteatro"],$_POST["quanAlunos"];
		echo "<br>";
		
		$anfiteatro = $_POST["anfiteatro"];
		$quanAlunos = $_POST["quanAlunos"];
		
		if($anfiteatro == 0 && quanAlunos <= 300 ){
			echo "Anfiteatro informado esta ocupado";
        }else{
            echo "Anfiteatro disponivel";
        }
	}*/
	
?>

	<!--<form method="POST">
        <input type="text" name="sala"/>
        <input type="submit">
		
		<input type="text" name="anfiteatro"/>
        <input type="submit">
		
    </form>-->	
		
		<div id="auxiliar">
		
			<h4>MENU</h4>
			<ul id="nav">
				<li class="um"><a href="mapa.php">Home</a></li>
			    <li><a href="inclusao_sala_anfiteatro.php">Inclusao de Sala e Anfiteatro</a></li>
				<li><a href="consulta_sala_anfiteatro.php">Consulta (Alteracao e Exclusao) de Sala</a></li>
				<li><a href="relatorio_filtro.php">Relatorio</a></li>
				<li><a href="formulario_sala_anfiteatro.php"> Formulario </a></li>
				<li><a href="pesquisar_sala.php"> Pesquisa Sala</a></li>
				<li><a href="pesquisar_anfiteatro.php"> Pesquisa Anfiteatro</a></li>
				<li><a href="busca_sala_anfiteatro.php"> Busca </a></li>
				<!--<li><a href="pesquisa_sala_anfiteatro.php"> Pesquisa </a></li>-->
				<!--<li><a href="logout.php">Logout</a></li>-->
			</ul>

		</div> <!-- Fim da div#auxiliar -->
		

		<div class="clear"></div>

	</div> <!-- Fim da div#conteudo -->
	
	<div id="rodape">
	  <p>  ©2020 </p>
	</div>
	
</div> <!-- Fim da div#tudo -->
</body>
</html>
