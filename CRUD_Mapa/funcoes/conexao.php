<?php
 //instancia objeto PDO, conectando no mysql


//$conn = new PDO('mysql:host=localhost;dbname=bd_id11907361_mapa','id11907361_icb','icb2020'); 
/*try{
	$conn = new PDO('mysql:host=localhost;dbname=mapa_sala','anfiteatro','');
	$conn = new PDO('mysql:host=localhost;dbname=mapa_sala','sala','');
	
	// local, nome do banco, nome da tabela, senha
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo 'ERROR: ' .$e->getMessage();
}*/

$conn = new PDO('mysql:host=localhost;dbname=mapa_sala', $username, $password);
?>

<?php
try {
  $conn = new PDO('mysql:host=localhost;dbname=mapa_sala', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

	
?>


