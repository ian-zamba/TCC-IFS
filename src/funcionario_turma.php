<?php
include "conexaobd.php";
session_start();

$sql1 = "SELECT * FROM `turma` WHERE ";

$result = $conn->query($sql1);

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
       $cod_turma = $row['cod_turma'];
       }
   }


$Professor_turma = $_SESSION["Professor_turma"];
$sql = "INSERT INTO `funcionario_turma`(`cod_turma`, `mat_func`)
 VALUES ([value-2],'$Professor_turma')";

if (mysqli_query($conn,$sql)){
    $_SESSION['cadastro'] = 'turm';
    header("Location: src/funcionario_turma.php");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
   }
?>