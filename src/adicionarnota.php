<?php 
include "conexaobd.php";
session_start();

$turma = $_GET['cod_turma'];
$aluno = $_GET['matriculaal'];

echo $turma."<br>";
echo $aluno;

$sql1 = "SELECT nome_turma FROM turma WHERE cod_turma = $turma";

$result = $conn->query($sql1);

while($row = $result->fetch_assoc()){
    $nome_turma = $row['nome_turma'];
}



$unidade = $_POST['unidade'];
if($_POST['port_nota'] != ""){
$portugues = str_replace(",",".",$_POST['port_nota']);
}else {
    $portugues = '-1';
}
if($_POST['geo_nota'] != ""){
    $geografia = str_replace(",",".",$_POST['geo_nota']);
}else {
    $geografia = '-1';
}
if($_POST['his_nota'] != ""){
    $historia = str_replace(",",".",$_POST['his_nota']);
}else {
    $historia = '-1';
}
if($_POST['cie_nota'] != ""){
    $ciencias = str_replace(",",".",$_POST['cie_nota']);
}else {
    $ciencias = '-1';
}
if($_POST['mat_nota'] != ""){
    $matematica = str_replace(",",".",$_POST['mat_nota']);
}else {
    $matematica = '-1';
}
if($_POST['edfis_nota'] != ""){
    $fisica = str_replace(",",".",$_POST['edfis_nota']);
}else {
    $fisica = '-1';
}
if($_POST['art_nota'] != ""){
    $artes = str_replace(",",".",$_POST['art_nota']);
}else {
    $artes = '-1';
}
if($_POST['red_nota'] != ""){
    $redacao = str_replace(",",".",$_POST['red_nota']);
}else {
    $redacao = '-1';
}
if($_POST['soccul_nota'] != ""){
    $soc_cultura = str_replace(",",".",$_POST['soccul_nota']);
}else {
    $soc_cultura = '-1';
}

if($_POST['faltas'] != ""){
    $faltas = $_POST['faltas'];
}else{
    $faltas = '0';
}
      
$sql = "UPDATE `aluno_turma` SET `portugues`='$portugues',`geografia`='$geografia',`historia`='$historia',`ciencias`='$ciencias',`matematica`='$matematica',`ed_fisica`='$fisica',`artes`='$artes',`redacao`='$redacao',`soc_cultura`='$soc_cultura', `faltas` = $faltas WHERE `mat_aluno` = '$aluno' AND `cod_turma` = '$turma' AND `avaliacao` = '$unidade'";



if (mysqli_query($conn,$sql)){
    mysqli_close($conn);
    $_SESSION['nota'] = 'nota_adicionada';  
    header("Location: ../index.php?pagina=listar_alunosturm&cod_turma=$turma&nome_turma=$nome_turma");
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
   
?>