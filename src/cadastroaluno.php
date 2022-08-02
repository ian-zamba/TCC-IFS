<?php
include "conexaobd.php";
session_start();
$nome = $_POST["nome_aluno"];
$mat = $_POST["mat_aluno"];
$cpf = $_POST["cpf_aluno"];
$rg = $_POST["rg_aluno"];
$nascimento = $_POST["nascimento"];
$sexo = $_POST["sexo"];
$nome_pai = $_POST["nome_pai"];
$cpf_pai = $_POST["cpf_pai"];
$telefone_pai = $_POST["telefone_pai"];
$nome_mae = $_POST["nome_mae"];
$cpf_mae = $_POST["cpf_mae"];
$telefone_mae = $_POST["telefone_mae"];
$naturalidade = $_POST["naturalidade"];
$endereco = $_POST["endereco_aluno"];
$bairro = $_POST["bairro"];
$cep = $_POST["cep"];
$cartao_sus = $_POST["cartao_sus"];
$bolsa_fam = $_POST["bolsa_fam"];
$mat1 = $_SESSION["mat1"];
$deu = true;



$sql1 = "SELECT * FROM `aluno`";

$result = $conn->query($sql1);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($mat == $row['mat_aluno']){
            $deu = false;
            $_SESSION['erro'] = 'mat_aluno';  
            header("Location: ../index.php?pagina=cadastro_aluno");
            die();
        }
        else if($cpf == $row['cpf_aluno'] && !empty($row['cpf_aluno'])){
            $deu = false;
            $_SESSION['erro'] = 'cpf_aluno';  
            header("Location: ../index.php?pagina=cadastro_aluno");
            die();
        }
        else if($rg == $row['rg_aluno' ] && !empty($row['rg_aluno' ])){
         $deu = false;
         $_SESSION['erro'] = 'rg_aluno';  
         header("Location: ../index.php?pagina=cadastro_aluno");
         die();
     }
    }
}


if($deu == true){

$sql = "INSERT INTO `aluno`(`mat_aluno`, `cpf_aluno`, `nome_aluno`, `rg_aluno`, `cartao_sus`, `nascimento`, `sexo`, `naturalidade`, `endereco_aluno`, `bairro`, `cep`, `nome_pai`, `cpf_pai`, `telefone_pai`, `nome_mae`, `cpf_mae`, `telefone_mae`, `bolsa_fam`, `status_aluno`,`est_matric`, `mat_func`)
 VALUES ('$mat','$cpf','$nome','$rg','$cartao_sus','$nascimento','$sexo','$naturalidade','$endereco','$bairro','$cep','$nome_pai','$cpf_pai','$telefone_pai','$nome_mae','$cpf_mae','$telefone_mae','$bolsa_fam','matriculado',0,'$mat1')";



if (mysqli_query($conn,$sql)){
    mysqli_close($conn);
    $_SESSION['cadastro'] = 'aluno';  
    header("Location: ../index.php?pagina=listar_alunos");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }


   }
?>


