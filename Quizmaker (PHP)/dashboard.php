<?php
require "header.php" ;
if (isset($_SESSION["userid"])) {
    $user=$_SESSION["useruid"];
    require "includes\dbh.inc.php";
    $id=$_SESSION["userid"];
    $sql="SELECT titulo, idquest FROM `questionarios` WHERE idusers=?";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../dashboard.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
        if ($result->num_rows > 0) {
            echo '<div class="container " align="center"><h3 class="pb-1 pt-4">Os meus Questionários</h3><br> ';
            while ($row=mysqli_fetch_assoc($result)) {
                echo '  <a class=" mb-1 w-90 list-group-item list-group-item-action text-break rounded-sm border border-secondary" id="list-home-list" style="max-width: 400px;" href="questionario.php?idquest='. $row["idquest"].'&username='.$user.'"target="_blank">'.$row["titulo"].'</a>';
            }
            echo "</div>";
        } else {
            echo '<div class="container mt-5"  align="center"><h1>Ainda não tem Questionários.</h1></div>';
        }
    }
}
