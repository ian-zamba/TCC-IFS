<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Gerar boletim
       
    </div>
          

    <div class="divtable">
<?php
include "src/conexaobd.php";


$sql = "SELECT * FROM turma,funcionario WHERE turma.mat_func = funcionario.mat_func";

$result = $conn->query($sql);

echo"
         <table class='display bordas' style='width:100%'  id='tabela_turma'>
         <thead>
         <tr>
            <th>Nome</th>
            <th>turno</th>
            <th class='text-center'>ano</th>
            <th class='text-center'>Professor</th>
            <th class='text-center'>Status</th>
            <th class='text-center'>Ver alunos da turma</th>
            <th class='text-center'>Gerar boletim</th>
         </tr>
         </thead>
         
   <tbody>";

while($row = $result->fetch_assoc()){
   
   $nome_func = $row['nome_func'];
   $cod_turma = $row['cod_turma'];
   $nome_turma = $row['nome_turma'];
   $turno = $row['turno'];
   $ano_truma = $row['ano_turma'];

   if($row['status_turma'] == 1){
      $status_turma = "Ativa";
   }
   else{
      $status_turma = "Inativa";
   }

   if($row['tem_alunosturma'] == "sim"){
      $listar = "<a href='?pagina=listar_alunosturm2&cod_turma=".$cod_turma."&nome_turma=".$nome_turma."'>
      <img src = 'img/mais.svg' width = '20'> </a>";
      $gerar = "<a href='?pagina=mostrar_boletimturma&cod_turma=".$cod_turma."&nome_turma=".$nome_turma."'>
      <img src = 'img/boletim.svg' width = '30'> </a>";
 }else{
   $listar = "<a href='src\listaralunosturm3.php'>
   <img src = 'img/mais.svg' width = '20'> </a>";
   $gerar = "<a href='src\listaralunosturm3.php'>
      <img src = 'img/boletim.svg' width = '30'> </a>";
 }
   

   echo"
         <tr>
            <td> $nome_turma </td>
            <td> $turno </td>
            <td class='text-center'> $ano_truma </td>            
            <td class='text-center'>  $nome_func </td>
            <td class='text-center'> $status_turma </td>

            <td  class='text-center'> $listar </td>

            <td  class='text-center'> $gerar </td>
        
        
         </tr>";
}


echo"</tbody> 
</table>";

if (mysqli_query($conn,$sql)){
    echo "";
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
?>
</div>
</div>
</div>

<?php

if(isset($_SESSION["finalizarturm"])){
if($_SESSION["finalizarturm"] == "inexistente"){
   echo"
   <script>
       Swal.fire(
           'Ainda não há alunos nessa turma!',
           '',
           'error'
         )
       </script>";
}
}unset($_SESSION["finalizarturm"]);