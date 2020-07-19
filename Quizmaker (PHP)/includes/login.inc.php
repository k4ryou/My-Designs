<?php

if (isset($_POST["login-submit"])) {
    require "dbh.inc.php";
    $username= $_POST["username"];
    $password= $_POST["password"];

    $sql="SELECT uidusers FROM users";
    $stmt= mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();
  } else {

    mysqli_stmt_execute($stmt);
    $result= mysqli_stmt_get_result($stmt);
    while ($row=mysqli_fetch_assoc($result)) {
        if ($username!=$row["uidusers"]) {
          header("Location: ../index.php?error=naoexiste");
        }
      }
    }


    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql="SELECT * FROM users WHERE uidusers=?";
        $stmt= mysqli_stmt_init($conn);
    }
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);

        if ($row=mysqli_fetch_assoc($result)) {

            $pwdcheck=password_verify($password, $row["pwdusers"]);
            if ($pwdcheck==false) {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            } elseif ($pwdcheck==true) {
                session_start();
                $_SESSION["userid"]= $row["idusers"];
                $_SESSION["useruid"]= $row["uidusers"];
                header("Location: ../dashboard.php?login=success");
                exit();
            } else {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
