<?php
require "header.php" ;
?>

<?php

$id=$_GET["idquest"];
$username=$_GET["username"];
require "includes/dbh.inc.php";
require "includes/gerar.inc.php";


$titulo=getTitulo($id);
echo '<h1 class="text-center pt-4">'.$titulo.'</h1>
<div class="col text-center"><p class="text-center pt-4"> Criado por: '.$username.'</p>
</div>';

$perguntas=getPerguntas($id);
$j=1;
foreach ($perguntas as $key => $value) {
    echo'<br><div class="container" id="quest">
    <div class="row" align="center">
      <div class="col pb-4 pt-4 pl-4 pr-4 mr-1 mb-1 mt-1 ml-1 bg-primary text-white rounded" id="p'.$j.'" >'.$value.'</div>
    </div><div class="row" align="center">';

    $respostas=getRespostas($key);
    $shuffled_array = array();
    $keys = array_keys($respostas);
    shuffle($keys);
    foreach ($keys as $key) {
        $shuffled_array[$key] = $respostas[$key];
    }
    $i=1;
    foreach ($shuffled_array as $key => $value) {
        echo'  <div class="col mr-1 mb-1 mt-1 ml-1 pt-4 pb-4 pl-4 pr-4 bg-dark text-white rounded" id="p'.$j.'r'.$key.'" onclick="init(id)">'.$value.'</div>';
        $i++;
        if ($i==3) {
            echo '<div class="w-100" align="center"></div>';
        }
    }
    echo '</div>
  </div>';
    $j++;
}

echo '
<br><div class="col text-center"> <button type="submit" name="criar-submit" class="btn btn-danger"  href="#aviso" onclick="calcular('.$id.')">Submeter</button></div><br></form>';
echo '<div class="collapse text-center" id="aviso">
  <div class="card card-body">
  Não selecionaste pelo menos uma opção!
  </div>
</div>';

echo '<div class="container bg-dark text-white rounded mt-4 collapse" align="center" id="divfinal">
  <h4 id="resultado" class="pt-3"></h4>

  <p></p>
<p id="descricao" class="pb-3">
 </p>
</div>'
 ?>
<style media="screen">
#quest, #divfinal{
  width:90%;
  max-width:500px;
}
#aviso{
 width:90%;
 color: red;
 margin:auto;
  }
</style>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->

  <title>Quizmaker 1.0</title>
</head>
<body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="javascript.js"></script>

</body>
</html>
