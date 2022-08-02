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
$aluno = $_GET['matriculaal'];
$deu = true;

$sql1 = "SELECT * FROM `funcionario` WHERE `mat_aluno`!= '$aluno'";

$result = $conn->query($sql1);

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
       if($mat == $row['mat_aluno']){
           $deu = false;
           $_SESSION['erro'] = 'mat_aluno';  
           header("Location: ../index.php?pagina=alterar_aluno&matriculaal='$aluno'");
           die();
       }
       else if($cpf == $row['cpf_aluno'] && !empty($row['cpf_aluno'])){
           $deu = false;
           $_SESSION['erro'] = 'cpf_aluno';  
           header("Location: ../index.php?pagina=alterar_aluno&matriculaal='$aluno'");
           die();
       }
       else if($rg == $row['rg_aluno' ] && !empty($row['rg_aluno' ])){
        $deu = false;
        $_SESSION['erro'] = 'rg_aluno';  
        header("Location: ../index.php?pagina=alterar_aluno&matriculaal='$aluno'");
        die();
    }
   }
}


if($deu == true){

$sql = "UPDATE `aluno` SET `mat_aluno`='$mat',`cpf_aluno`='$cpf',`nome_aluno`='$nome',`rg_aluno`='$rg',`cartao_sus`='$cartao_sus',`nascimento`='$nascimento',`sexo`='$sexo',`naturalidade`='$naturalidade',`endereco_aluno`='$endereco',`bairro`='$bairro',`cep`='$cep',`nome_pai`='$nome_pai',`cpf_pai`='$cpf_pai',`telefone_pai`='$telefone_pai',`nome_mae`='$nome_mae',`cpf_mae`='$cpf_mae',`telefone_mae`='$telefone_mae',`bolsa_fam`='$bolsa_fam' WHERE `mat_aluno` = '$aluno'";

if (mysqli_query($conn,$sql)){
    mysqli_close($conn);
    $_SESSION['alt'] = 'altaluno';  
    header("Location: ../index.php?pagina=listar_alunos");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
   }
?>

