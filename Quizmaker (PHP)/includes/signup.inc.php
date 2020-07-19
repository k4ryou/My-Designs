 <?php
if (isset($_POST["signup-submit"])) {
    require "dbh.inc.php";

    $username = $_POST["uid"];
    $password = $_POST["pwd"];
    $passwordrepeat = $_POST["pwd-repeat"];

    if (empty($username) || empty($password) || empty($passwordrepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$password);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid");
        exit();
    } elseif ($password!==$passwordrepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username);
        exit();
    } else {
        $sql= "SELECT uidusers FROM users WHERE uidusers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck=mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                header("Location: ../signup.php?error=usertaken");
                exit();
            } else {
                $sql= "INSERT INTO users (uidusers, pwdusers) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpwd= password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}
