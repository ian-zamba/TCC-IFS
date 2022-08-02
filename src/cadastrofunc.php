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
$deu = true;

if($cargo == "diretor" || $cargo == "coordenador" || $cargo == "secretario"){
    $acesso = 1;
}else{
    $acesso = 0;
}

$sql1 = "SELECT * FROM `funcionario`";

$result = $conn->query($sql1);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($mat == $row['mat_func']){
            $deu = false;
            $_SESSION['erro'] = 'mat_func';  
            header("Location: ../index.php?pagina=cadastro_func");
            die();
        }
        else if($cpf == $row['cpf_func']){
            $deu = false;
            $_SESSION['erro'] = 'cpf_func';  
            header("Location: ../index.php?pagina=cadastro_func");
            die();
        }
        else if($email == $row['email_func']){
            $deu = false;
            $_SESSION['erro'] = 'email_func';  
            header("Location: ../index.php?pagina=cadastro_func");
            die();
        }
        else if($rg == $row['rg_func'] && !empty($row['rg_func' ])){
            $deu = false;
            $_SESSION['erro'] = 'rg_func';  
            header("Location: ../index.php?pagina=cadastro_func");
            die();
        }


    }
}


if($deu == true){


$sql = "INSERT INTO `funcionario`(`mat_func`, `cpf_func`, `nome_func`, `rg_func`, `cargo_func`, `endereco_func`, `telefone_func`, `email_func`, `senha_func`, `acesso_func`, `status_func`) VALUES ('$mat', '$cpf', '$nome', '$rg', '$cargo', '$endereco','$telefone','$email','$senha',$acesso,1)";


if (mysqli_query($conn,$sql)){
    mysqli_close($conn);
    $_SESSION['cadastro'] = 'func';  
    header("Location: ../index.php?pagina=listar_funcionarios");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
    }

?>