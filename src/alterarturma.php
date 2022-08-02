<?php
include "conexaobd.php";
session_start();

$nome_turma = $_POST["nome_turma"];
$turno = $_POST["turno"];
$ano_turma = $_POST["ano_turma"];
$ch_portugues = $_POST['port'];
$ch_geografia = $_POST['geo'];
$ch_historia = $_POST['his'];
$ch_ciencias = $_POST['cie'];
$ch_matematica = $_POST['mat'];
$ch_fisica = $_POST['edfis'];
$ch_artes = $_POST['art'];
$ch_redacao = $_POST['red'];
$ch_soc_cultura = $_POST['soccul'];
$mat_func = $_POST['Professor_turma'];
$turma = $_GET['cod_turma'];
$deu = true;


$sql1 = "SELECT * FROM `turma` WHERE `cod_turma` != '$turma'"  ;

$result = $conn->query($sql1);

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
       if($nome_turma == $row['nome_turma'] && $turno == $row['turno'] && $ano_turma == $row['ano_turma']){
           $deu = false;
           $_SESSION['erro'] = 'nome_turma';  
           header("Location: ../index.php?pagina=alterar_turma&cod_turma='$turma'");
           die();
       }
   }
}


if($deu == true){
$sql = "UPDATE `turma` SET `nome_turma`='$nome_turma',`turno`='$turno',`ano_turma`='$ano_turma',`ch_portugues`=$ch_portugues,`ch_geografia`=$ch_geografia,`ch_historia`=$ch_historia,`ch_ciencias`=$ch_ciencias,`ch_matematica`=$ch_matematica,`ch_fisica`=$ch_fisica,`ch_artes`=$ch_artes,`ch_redacao`=$ch_redacao,`ch_soc_cultura`=$ch_soc_cultura, `mat_func`='$mat_func' WHERE `cod_turma` = '$turma'";



if (mysqli_query($conn,$sql)){
    mysqli_close($conn);
    $_SESSION['alt'] = 'altturm';  
    header("Location: ../index.php?pagina=listar_turma");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
   }
?>