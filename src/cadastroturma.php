<?php
include "conexaobd.php";
session_start();

$nome_turma = trim($_POST["nome_turma"]);
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
$deu = true;


$sql1 = "SELECT * FROM `turma`";

$result = $conn->query($sql1);

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
       if($nome_turma == $row['nome_turma'] && $turno == $row['turno'] && $ano_turma == $row['ano_turma']){
           $deu = false;
           $_SESSION['erro'] = 'nome_turma';  
           header("Location: ../index.php?pagina=cadastro_turma");
           die();
       }
   }
}



if($deu == true){
$sql = "INSERT INTO `turma`( `nome_turma`, `turno`, `ano_turma`,`status_turma`, `ch_portugues`, `ch_geografia`, `ch_historia`, `ch_ciencias`, `ch_matematica`, `ch_fisica`, `ch_artes`, `ch_redacao`, `ch_soc_cultura`,`tem_alunosturma`,`mat_func`) 
VALUES ('$nome_turma','$turno','$ano_turma',1,$ch_portugues,$ch_geografia,$ch_historia,$ch_ciencias,$ch_matematica,$ch_fisica,$ch_artes,$ch_redacao,$ch_soc_cultura,'nao','$mat_func')";

if (mysqli_query($conn,$sql)){
    $_SESSION['cadastro'] = 'turm';  
    header("Location: ../index.php?pagina=listar_turma");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
   }
?>