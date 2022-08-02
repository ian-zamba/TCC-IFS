<?php

include "conexaobd.php";
session_start();
$nome = $_POST["nome_func"];
$mat = $_POST["mat_func"];
$cpf = $_POST["cpf_func"];
$rg = $_POST["rg_func"];
$cargo = $_POST["cargo_func"];
$endereco = $_POST["endereco_func"];
$telefone = $_POST["telefone_func"];
$email = $_POST["email_func"];
$senha = $_POST["senha_func"];
$acesso = $_POST["acesso_func"];
$status = $_POST["status_func"];
$func = $_GET['matricula'];
$deu = true;


$sql1 = "SELECT * FROM `funcionario` WHERE `mat_func`!= '$func'";

$result = $conn->query($sql1);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($mat == $row['mat_func']){
            $deu = false;
            $_SESSION['erro'] = 'mat_func';  
            header("Location: ../index.php?pagina=alterar_func&matricula='$func'");
            die();
        }
        else if($cpf == $row['cpf_func']){
            $deu = false;
            $_SESSION['erro'] = 'cpf_func';  
            header("Location: ../index.php?pagina=alterar_func&matricula='$func'");
            die();
        }
        else if($email == $row['email_func']){
            $deu = false;
            $_SESSION['erro'] = 'email_func';  
            header("Location: ../index.php?pagina=alterar_func&matricula='$func'");
            die();
        }
        else if($rg == $row['rg_func'] && !empty($row['rg_func'])){
            $deu = false;
            $_SESSION['erro'] = 'rg_func';  
            header("Location: ../index.php?pagina=alterar_func&matricula='$func'");
            die();
        }


    }
}

if($deu == true){

$sql = "UPDATE `funcionario` SET `mat_func`='$mat',`cpf_func`='$cpf',`nome_func`='$nome',`rg_func`='$rg',`cargo_func`='$cargo',`endereco_func`='$endereco',`telefone_func`='$telefone',`email_func`='$email',`senha_func`='$senha',`acesso_func`=$acesso,`status_func`=$status WHERE `mat_func`= '$func'";

echo $sql;



if (mysqli_query($conn,$sql)){
    mysqli_close($conn);
    $_SESSION['alt'] = 'altfunc'; 
    header("Location: ../index.php?pagina=listar_funcionarios");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
   }
?>