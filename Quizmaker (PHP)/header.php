<?php
session_start();
 ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta http-equiv="refresh" content="3200;url=includes/logout.inc.php" /> -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Quizmaker 1.0</title>

</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <a class="navbar-brand">
      <img src="images/logo.png" alt="Logo" class="pb-1" style="width:100px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item active ">
            <a class="nav-link " href="index.php">Início <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="signup.php">Registo <span class="sr-only">(current)</span></a>
          </li>
          <?php
            if (isset($_SESSION["userid"])) {
                echo ' <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Os Meus Questionários<span class="sr-only">(current)</span></a>
              </li>  <li class="nav-item active ">
              <a class="nav-link " href="criarquestionario.php">Criar Questionário<span class="sr-only">(current)</span></a>
            </li> </ul>
<hr>

          <form  action="includes/logout.inc.php " method="post">
          <span class="navbar-smalltext pr-1 "> Bem-vindo, '.
            $_SESSION["useruid"].
          '!</span>
                  <button type="submit" name="logout-submit" class="btn btn-primary">Sair</button>
                </form>  ';
            } else {
                echo '
              </ul>  <hr>  <form  id="login" action="includes/login.inc.php " method="post">
              <div class="form-row ">
              <div class="col">
              <input type="text" name="username" placeholder="Utilizador" class="form-control border border-secondary">
              </div>
              <div class="col">
                     <input type="password" name="password" placeholder="Password" class="form-control border border-secondary">
                     </div>

                     <button type="submit" name="login-submit" class="btn btn-primary">Entrar</button>

              </div>

              </form>
              </div>
              ';
            }
             ?>
      </div>
    </nav>
  </header>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
