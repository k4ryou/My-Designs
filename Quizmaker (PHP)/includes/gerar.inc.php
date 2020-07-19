
<?php

function getTitulo($idquest){
require "dbh.inc.php";

$sql="SELECT titulo, idusers FROM questionarios WHERE idquest=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo $idquest;
    header("Location: ../questionario.php?error=sqlerror");
    exit();
} else {
mysqli_stmt_bind_param($stmt, "i", $idquest);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
if ($row=mysqli_fetch_assoc($result)) {
    $row["titulo"];
  }
    mysqli_stmt_close($stmt);
    return $row["titulo"];
  }
}
function getPerguntas($idquest){
require "dbh.inc.php";

$sql="SELECT idpergunta, pergunta FROM perguntas WHERE idquest=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo $idquest;
    header("Location: ../questionario.php?error=sqlerror");
    exit();
} else {
mysqli_stmt_bind_param($stmt, "i", $idquest);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
while ($row=mysqli_fetch_assoc($result)) {
  $aux[$row["idpergunta"]]=$row["pergunta"];
  }
    mysqli_stmt_close($stmt);
    return $aux;
  }
}
function getRespostas($idpergunta){
require "dbh.inc.php";

$sql="SELECT resposta, pontos FROM respostas WHERE idpergunta=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo $idquest;
    header("Location: ../questionario.php?error=sqlerror");
    exit();
} else {
mysqli_stmt_bind_param($stmt, "i", $idpergunta);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
while ($row=mysqli_fetch_assoc($result)) {
  $aux[$row["pontos"]]=$row["resposta"];
  }
    mysqli_stmt_close($stmt);
    return $aux;
  }
}
?>
