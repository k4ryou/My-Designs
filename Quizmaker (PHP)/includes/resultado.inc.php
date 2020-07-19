<?php
require "dbh.inc.php";
$id= $_REQUEST["id"];
$tipo= $_REQUEST["tipo"];
$sql="SELECT resultado, descricao FROM resultados WHERE idquest=? and tipo=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("Location: ../questionario.php?error=sqlerror");
    exit();
} else {
mysqli_stmt_bind_param($stmt, "ii", $id, $tipo);
mysqli_stmt_execute($stmt);
$result= mysqli_stmt_get_result($stmt);
while ($row=mysqli_fetch_assoc($result)) {
  $aux[$row["resultado"]]=$row["descricao"];
  $key=array_keys($aux);
  echo $key[0].'*'.$row["descricao"];
  }
    mysqli_stmt_close($stmt);
  }
 ?>
