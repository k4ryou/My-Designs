<?php
require "header.php" ;
?>
<style media="screen">

</style>
<main>
  <br>
  <?php
  if (isset($_SESSION["userid"])) {
      if (isset($_GET["error"])) {
          if ($_GET["error"]=="vazio") {
              echo '<p class=" text-center text-danger" >Preenche todos os campos!</p>';
          }
      }

      if (isset($_GET["create"])) {
          if ($_GET["create"]=="success") {
              echo '<p class="text-center text-success font-weight-bold" >Questionário criado com sucesso!</p>';
          }
      }
      

      echo '<form action="includes/criar.inc.php " method="post">
    <div class=" d-sm-flex flex-sm-row justify-content-around">
      <div class="col-sm-4">
      <p class="d-flex justify-content-center "> 1. Escolhe um título.</p>';
      if (isset($_COOKIE["titulo"])) {
          echo '<input type="text" class="form-control border border-secondary" name="titulo" placeholder="Título" value="'.$_COOKIE["titulo"].'">';
      } else {
          echo '<input type="text" class="form-control border border-secondary" name="titulo" placeholder="Título">';
      }
      echo '
      </div>
    </div>
    <hr>
    <div class="col-sm-12"><p class="d-flex justify-content-center "> 2. Cria as tuas próprias questões e respostas, atentando ao valor de pontuação de cada uma. No final, será calculada a pontuação total.</p></div>';
      for ($i=1; $i <=8 ; $i++) {
          if (isset($_COOKIE["p".$i])) {
              echo '
        <div class="d-sm-flex flex-sm-row justify-content-center">
          <div class="col-sm-4">
            <input type="text" class="form-control border border-secondary" name="p'.$i.'" placeholder="Pergunta '. $i.'" value="'.$_COOKIE["p".$i].'">
          </div>';
          } else {
              echo '<div class="d-sm-flex flex-sm-row justify-content-center">
              <div class="col-sm-4">
                <input type="text" class="form-control border border-secondary" name="p'.$i.'" placeholder="Pergunta '. $i.'" >
              </div>';
          }
          if (isset($_COOKIE["p".$i."r1"])) {
              echo '<div class="col-sm-2">
            <input type="text" class="form-control border border-secondary" name="p'.$i.'r1" placeholder="1 Ponto" value="'.$_COOKIE["p".$i."r1"].'">
          </div>';
          } else {
              echo '<div class="col-sm-2">
              <input type="text" class="form-control border border-secondary" name="p'.$i.'r1" placeholder="1 Ponto" >
            </div>';
          }
          if (isset($_COOKIE["p".$i."r2"])) {
              echo'<div class="col-sm-2">
            <input type="text" class="form-control border border-secondary" name="p'.$i.'r2" placeholder="2 Pontos" value="'.$_COOKIE["p".$i."r2"].'">
          </div>';
          } else {
              echo '<div class="col-sm-2">
              <input type="text" class="form-control border border-secondary" name="p'.$i.'r2" placeholder="2 Pontos" >
            </div>';
          }
          if (isset($_COOKIE["p".$i."r3"])) {
              echo'<div class="col-sm-2">
            <input type="text" class="form-control border border-secondary" name="p'.$i.'r3" placeholder="3 Pontos" value="'.$_COOKIE["p".$i."r3"].'">
          </div>';
          } else {
              echo '<div class="col-sm-2">
              <input type="text" class="form-control border border-secondary" name="p'.$i.'r3" placeholder="3 Pontos">
            </div>';
          }
          if (isset($_COOKIE["p".$i."r4"])) {
              echo'  <div class="col-sm-2">
              <input type="text" class="form-control border border-secondary" name="p'.$i.'r4" placeholder="4 Pontos" value="'.$_COOKIE["p".$i."r4"].'">
            </div>
          </div>
          <br>';
          } else {
              echo '  <div class="col-sm-2">
                <input type="text" class="form-control border border-secondary" name="p'.$i.'r4" placeholder="4 Pontos">
              </div>
            </div>
            <br>';
          }
      }
      echo '<hr><div class=" flex-sm-column justify-content-center w-90">  <div class="col-sm-12"><p class="d-flex justify-content-center"> 3. Elabora os resultados finais do questionário, atentando que o total da pontuação do participante irá gerar resultados diferentes. A pontuação varia entre 8 e 32 pontos.</p></div>
<div class="col-sm-12"><p class="d-flex justify-content-center">Resultado 1 (8-11 Pontos) | Resultado 2 (12-15 Pontos) | Resultado 3 (16-19 Pontos) | Resultado 4 (20-23 Pontos) | Resultado 5 (24-27 Pontos) | Resultado 6 (28-32 Pontos)</p></div>';
      for ($i=1; $i <=6 ; $i++) {
          if (isset($_COOKIE["res".$i])) {
              echo  '<div class=" d-sm-flex flex-sm-row justify-content-center">
    <div class="col-sm-4">
      <input type="text" class="form-control border border-secondary" name="res'.$i.'" placeholder="Resultado '.$i.'" value="'.$_COOKIE["res".$i].'">
    </div>';
          } else {
              echo '<div class=" d-sm-flex flex-sm-row justify-content-center">
<div class="col-sm-4">
<input type="text" class="form-control border border-secondary" name="res'.$i.'" placeholder="Resultado '.$i.'" >
</div>';
          }
          if (isset($_COOKIE["desc".$i])) {
              echo '  <div class="col-sm-8">
      <input type="text" class="form-control border border-secondary" name="desc'.$i.'"placeholder="Descrição" value="'.$_COOKIE["desc".$i].'">
    </div>
  </div>
  <br>
  ';
          } else {
              echo '<div class="col-sm-8">
    <input type="text" class="form-control border border-secondary" name="desc'.$i.'"placeholder="Descrição">
  </div>
</div>
<br>
';
          }
      }
      echo '
<br><div class="col text-center"> <button type="submit" name="criar-submit" class="btn btn-primary">Criar</button></div><br></form>';
  } else {
      header("index.php");
  }
   ?>
</main>
