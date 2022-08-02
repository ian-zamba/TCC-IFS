<?php
session_start();
include "../src/conexaobd.php";

$turma = $_GET['cod_turma'];

$sql1 = "SELECT * FROM aluno,turma,aluno_turma Where aluno.mat_aluno = aluno_turma.mat_aluno AND aluno_turma.cod_turma = turma.cod_turma AND turma.cod_turma = '$turma' AND aluno_turma.avaliacao = 'U1'";


$result = $conn->query($sql1);


while($row = $result->fetch_assoc()){
    $mat_aluno = $row['mat_aluno'];

    $sql = "UPDATE aluno,turma SET aluno.est_matric= 0, turma.status_turma=2 WHERE aluno.mat_aluno = '$mat_aluno' AND turma.cod_turma = '$turma'";

    if (mysqli_query($conn,$sql)){
          }
          else {
             echo "Erro: ".mysqli_error($conn);
          }
}


$_SESSION['finalizarturm'] = 'finalizada';  
header("Location: ../index.php?pagina=listar_turma");
