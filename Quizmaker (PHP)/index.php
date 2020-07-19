<?php
require "header.php" ;
?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style media="screen">
  #logo{

    max-width:60%;
  }
  

  </style>
  </head>
  <body>
    <main>

      <?php
      if (isset($_GET["error"])) {
          if ($_GET["error"]=="emptyfields") {
              echo '<p class=" text-center text-danger pt-3" >Preenche todos os campos!</p>';
          }
      }
      if (isset($_GET["error"])) {
          if ($_GET["error"]=="naoexiste") {
              echo '<p class=" text-center text-danger pt-3" >Este utilizador não existe!</p>';
          }
      }
      if (isset($_GET["error"])) {
          if ($_GET["error"]=="wrongpwd") {
              echo '<p class=" text-center text-danger pt-3" >Password errada!</p>';
          }
      }

       ?>
       <div class="container-fluid principal">


      <img src="images/logo.png" class="mx-auto d-block pt-5 pb-4" id="logo">
      <div class="d-flex justify-content-center ">
        <div class="col">
        <h5 class="d-flex justify-content-center font-weight-bold"> Bem-vindo ao QuizMaker! A ferramenta para elaborares questionários! Utilizar é simples:</h5>
        <br>
          <h5 class="d-flex justify-content-center"> 1. Se ainda não tiveres conta, cria uma nova através da área de registo.</h5>
          <h5 class="d-flex justify-content-center"> 2. Após entrares na tua conta, cria o Questionário através da opção "Criar questionário".</h5>
          <h5 class="d-flex justify-content-center"> 3. Após a sua criação, os teus Questionários ficam disponíveis na área "Os Meus Questionários".</h5>
          <h5 class="d-flex justify-content-center"> 4. Seleciona o Questionário que pretendes e partilha com os teus amigos, copiando o Link.</h5>
        </div>
      </div>
      </div>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</html>
