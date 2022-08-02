<?php
include "conexaobd.php";

session_start();

echo"
<script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js></script>";


if(empty($_POST["username"]) || empty($_POST["password"])){
    $_SESSION["deu"] = "vazio";
    header("Location: ../index.php?pagina=login");
}

else{
$login = trim($_POST["username"]);
$senha = trim($_POST["password"]);

$sql = "SELECT mat_func, nome_func, acesso_func FROM funcionario WHERE email_func = '$login' AND senha_func = '$senha'";
    $result = $conn->query($sql); 
     

    if(mysqli_num_rows($result) > 0 ) {

        $row = mysqli_fetch_assoc($result);
        if($row['acesso_func'] == 0){
            mysqli_close($conn);
            $_SESSION["deu"] = "sem";
            header("Location: ../index.php?pagina=login");
        }           
            else if($row['acesso_func'] == 1){
                $_SESSION["logou"] = true;
                $_SESSION["logado"] = "logado";
                $_SESSION["nome"] = $row['nome_func'];
                $_SESSION["mat1"] = $row['mat_func'];
                header("Location: ../index.php?pagina=home");
            } 
        }
            else{
                $_SESSION["deu"] = "errado";
                header("Location: ../index.php?pagina=login");
            }   
        }