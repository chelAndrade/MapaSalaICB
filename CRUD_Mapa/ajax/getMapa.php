<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
</html
<?php
	$q=$_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("mapa_catalog.xml");

$x=$xmlDoc->getElementsByTagName('MAPA');

for ($i=0; $i<=$x->length-1; $i++){
//Process only element nodes
if ($x->item($i)->nodeType==1){
  if ($x->item($i)->childNodes->item(0)->nodeValue == $q){ 
    $y=($x->item($i)->parentNode);
    }
  }
}

$nome_livro=($y->childNodes);

for ($i=0;$i<$cd->length;$i++)
{ 
//Process only element nodes
if ($cd->item($i)->nodeType==1){ 
  echo($nome_livro->item($i)->nodeName);
  echo(": ");
  echo($nome_livro->item($i)->childNodes->item(0)->nodeValue);
  echo("<br />");
  } 
}
?>