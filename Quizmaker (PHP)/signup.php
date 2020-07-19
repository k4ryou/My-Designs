<?php
require "header.php" ;
?>

<style media="screen">
  #signup {
    width: 90%;
    max-width:300px;
  }

  .container {
    padding-top: 5%;
  }
</style>
<main>

  <div class="container-fluid   pt-5" align="center" >
    <section>
      <h2>Registo</h2>
      <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"]=="emptyfields") {
            echo '<p class=" text-center text-danger" >Preenche todos os campos!</p>';
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"]=="invaliduid") {
            echo '<p class=" text-center text-danger" Nome de utilizador inválido</p>';
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"]=="passwordcheck") {
            echo '<p class=" text-center text-danger" >As duas Passwords têm que ser iguais!</p>';
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"]=="usertaken") {
            echo '<p class=" text-center text-danger" >Este utilizador já existe!</p>';
        }
    }
    if (isset($_GET["signup"])) {
        if ($_GET["signup"]=="success") {
            echo '<p class="text-center text-success font-weight-bold" >Utilizador criado com sucesso!</p>';
        }
    }
     ?>
      <form action="includes/signup.inc.php" method="post">
        <div id="signup" class="form-group">
          <label for="exampleInputEmail1">Utilizador</label>
          <input type="text" class="form-control border border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" name="uid" placeholder="Introduza o nome de utilizador">
          <small id="emailHelp" class="form-text text-muted">Utilize apenas letras e números</small>
        </div>
        <div id="signup" class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control border border-secondary" id="exampleInputPassword1" name="pwd" placeholder="Introduza a Password">
        </div>
        <div id="signup" class="form-group">
          <label for="exampleInputPassword1">Reintroduza a Password</label>
          <input type="password" class="form-control border border-secondary" id="exampleInputPassword1" name="pwd-repeat" placeholder="Reintroduza a Password">

        </div>
        <button type="submit" name="signup-submit" class="btn btn-primary">Registar</button>
      </form>
    </section>

  </div>
</main>
