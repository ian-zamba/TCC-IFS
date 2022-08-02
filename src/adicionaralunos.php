<?php
//U1, U2, R1, U3, U4, R2, RF
include "conexaobd.php";
session_start();

$cod_turmas = $_SESSION["cod_turmas"];
$mat_aluno = $_POST["mat_aluno"];
$unidade = 1;

while($unidade != 10){
if ($unidade == 1){
    $sql = "INSERT INTO `aluno_turma`(`avaliacao`, `situacao`, `faltas`,`mat_aluno`, `cod_turma`) VALUES ('U1','matriculado',0,'$mat_aluno','$cod_turmas')";
    if (mysqli_query($conn,$sql)){
        $unidade++;
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }

}else if ($unidade == 2){
    $sql = "INSERT INTO `aluno_turma`(`avaliacao`, `situacao`, `faltas`,`mat_aluno`, `cod_turma`) VALUES ('U2','matriculado',0,'$mat_aluno','$cod_turmas')";
    if (mysqli_query($conn,$sql)){
        $unidade++;
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }

}else if ($unidade == 3){
    $sql = "INSERT INTO `aluno_turma`(`avaliacao`, `situacao`, `faltas`,`mat_aluno`, `cod_turma`) VALUES ('R1','matriculado',0,'$mat_aluno','$cod_turmas')";
    if (mysqli_query($conn,$sql)){
        $unidade++;
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }

}else if ($unidade == 4){
    $sql = "INSERT INTO `aluno_turma`(`avaliacao`, `situacao`, `faltas`,`mat_aluno`, `cod_turma`) VALUES ('U3','matriculado',0,'$mat_aluno','$cod_turmas')";
    if (mysqli_query($conn,$sql)){
        $unidade++;
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }

}else if ($unidade == 5){
    $sql = "INSERT INTO `aluno_turma`(`avaliacao`, `situacao`, `faltas`,`mat_aluno`, `cod_turma`) VALUES ('U4','matriculado',0,'$mat_aluno','$cod_turmas')";
    if (mysqli_query($conn,$sql)){
        $unidade++;
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }

}else if ($unidade == 6){
    $sql = "INSERT INTO `aluno_turma`(`avaliacao`, `situacao`, `faltas`,`mat_aluno`, `cod_turma`) VALUES ('R2','matriculado',0,'$mat_aluno','$cod_turmas')";
    if (mysqli_query($conn,$sql)){
        $unidade++;
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }

}else if ($unidade == 7){
    $sql = "INSERT INTO `aluno_turma`(`avaliacao`, `situacao`, `faltas`,`mat_aluno`, `cod_turma`) VALUES ('RF','matriculado',0,'$mat_aluno','$cod_turmas')";
    if (mysqli_query($conn,$sql)){
        $unidade++;
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }

}else if ($unidade == 8){
  $sql = "UPDATE `aluno` SET `est_matric`= 1 WHERE `mat_aluno` = '$mat_aluno'";
  if (mysqli_query($conn,$sql)){
      $unidade++;
        }
        else {
           echo "Erro: ".mysqli_error($conn);
        }

}else if ($unidade == 9){
   $sql = "UPDATE `turma` SET `tem_alunosturma`= 'sim' WHERE `cod_turma` = '$cod_turmas'";
   if (mysqli_query($conn,$sql)){
       $unidade++;
         }
         else {
            echo "Erro: ".mysqli_error($conn);
         }
 
 }


}

header("Location: ../index.php?pagina=adicionar_alunos&cod_turma=".$cod_turmas);





