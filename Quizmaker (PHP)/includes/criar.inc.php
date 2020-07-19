<?php
if (isset($_POST["criar-submit"])) {
    require "dbh.inc.php";
    session_start();
    $titulo=$_POST["titulo"];
    $iduser=$_SESSION["userid"];
    setcookie("titulo", $titulo, time() + (1800), "/");

    for ($i=1; $i <=8 ; $i++) {
        $pergunta=$_POST["p".$i];
        setcookie("p".$i, $pergunta, time() + (1800), "/");
        for ($j=1; $j<=4 ; $j++) {
            $resposta=$_POST["p".$i."r".$j];
            setcookie("p".$i."r".$j, $resposta, time() + (1800), "/");
        }
    }

    for ($i=1; $i <=6 ; $i++) {
        $resultado=$_POST["res".$i];
        $descricao=$_POST["desc".$i];
        setcookie("res".$i, $resultado, time() + (1800), "/");
        setcookie("desc".$i, $descricao, time() + (1800), "/");
    }

    for ($i=1; $i <=8 ; $i++) {
        $pergunta=$_POST["p".$i];


        for ($j=1; $j<=4 ; $j++) {
            $resposta=$_POST["p".$i."r".$j];

            if (empty($pergunta) || empty($resposta)) {
                header("Location: ../criarquestionario.php?error=vazio");
                exit();
            }
        }
    }
    for ($i=1; $i <=6 ; $i++) {
        $resultado=$_POST["res".$i];
        $descricao=$_POST["desc".$i];
        if (empty($resultado) || empty($descricao)) {
            header("Location: ../criarquestionario.php?error=vazio");
            exit;
        }
    }

    if (empty($titulo)) {
        header("Location: ../criarquestionario.php?error=vazio");
        exit();
    }
    $sql= "INSERT INTO questionarios (titulo, idusers) VALUES (?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../criarquestionario.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "si", $titulo, $iduser);
        mysqli_stmt_execute($stmt);
        $last_id = $conn->insert_id;
        mysqli_stmt_close($stmt);
    }
    for ($i=1; $i <=8 ; $i++) {
        $pergunta=$_POST["p".$i];

        $sql= "INSERT INTO perguntas (pergunta,idquest) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../criarquestionario.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "si", $pergunta, $last_id);
            mysqli_stmt_execute($stmt);
            $last_id2 = $conn->insert_id;
            mysqli_stmt_close($stmt);
            for ($j=1; $j<=4 ; $j++) {
                $resposta=$_POST["p".$i."r".$j];
                if (empty($resposta)) {
                    header("Location: ../criarquestionario.php?error=vazio");
                    exit();
                }
                $sql= "INSERT INTO respostas (resposta,idpergunta,pontos) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../criarquestionario.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "sii", $resposta, $last_id2, $j);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                }
            }
        }
    }
    for ($i=1; $i <=6 ; $i++) {
        $resultado=$_POST["res".$i];
        $descricao=$_POST["desc".$i];

        $sql= "INSERT INTO resultados (resultado,descricao,idquest,tipo) VALUES (?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo $conn->error;
            exit();
        } else {
            echo $resultado;
            mysqli_stmt_bind_param($stmt, "ssii", $resultado, $descricao, $last_id, $i);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
    header("Location: ../criarquestionario.php?create=success");
    exit();
} else {
    header("Location: ../criarquestionario.php");
    exit();
}
