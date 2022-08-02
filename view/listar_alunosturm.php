<?php


$turma1 = $_GET['nome_turma'];
?>

<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - <?=$turma1?>
    </div>
          

    <div class="divtable">
<?php
include "src/conexaobd.php";

$turma = $_GET['cod_turma'];

$sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno.mat_aluno = aluno_turma.mat_aluno AND aluno_turma.cod_turma = turma.cod_turma AND turma.cod_turma = '$turma' AND aluno_turma.avaliacao = 'U1'";

$result = $conn->query($sql);

echo"
         <table class='display bordas' style='width:100%'  id='tabela_turma_aluno'>
         <thead>
         <tr>
            <th class='text-center'>Matrícula</th>
            <th class='text-center'>Nome</th>
            <th class='text-center'>CPF</th>           
            <th class='text-center'>Telefone de contato</th>
            <th class='text-center'>Idade</th> 
            <th class='text-center'>Nome da mãe</th>
            <th class='text-center'>Nome do pai</th>            
            <th class='text-center'>Adicionar nota</th>        
         </tr>
         </thead>
         
   <tbody>";

while($row = $result->fetch_assoc()){
   $mat_aluno = $row['mat_aluno'];
   if($row['cpf_aluno'] != ""){
   $cpf_aluno = Mask("###.###.###-##",$row['cpf_aluno']);
}else{
   $cpf_aluno = "";
}
   $nome_aluno = $row['nome_aluno'];
   $telefone_pai = Mask("(##) #####-####",$row['telefone_pai']);
   $nome_pai = $row['nome_pai'];
   $nome_mae = $row['nome_mae'];
   $nascimento = $row['nascimento'];
   $status_turma = $row['status_turma'];
   $nome_turma = $row['nome_turma'];

   if($status_turma == 1){
      $boletimbtn = "<a href='?pagina=adicionar_nota&matriculaal=".$mat_aluno."&cod_turma=".$turma."'>
      <img src = 'img/boletim.svg' width = '30'> </a>";
   }else{
      $boletimbtn = "";
   }
 
   $data = $nascimento;
   list($dia, $mes, $ano) = explode('/', $data);
   $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
   $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
   $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25); 

   echo"
         <tr>
            <td> $mat_aluno </td>
            <td class='text-center'> $nome_aluno </td>
            <td class='text-center'> $cpf_aluno </td>
            <td class='text-center'> $telefone_pai </td>
            <td class='text-center'> $idade </td>
            <td class='text-center'> $nome_mae </td>
            <td class='text-center'> $nome_pai </td>
            <td  class='text-center'> $boletimbtn </td>
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
      if($status_turma == 1){?>
        <button id='tudobtn' class='btn butonsub' type='button' onclick="window.location.href='src/finalizarturm.php?cod_turma=<?=$turma?>'">Finalizar turma</button>
        <?php
     }
?>

<button id="voltarbtn" name="voltar" class="btn btn-danger botaoaluno" type="Button" onclick="window.location.href='index.php?pagina=listar_turma'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button><br><br><br>
</div>
</div>
</div>

<?php



if(isset($_SESSION["nota"])){
   if($_SESSION['nota'] == 'nota_adicionada'){
       echo"
       <script>
       Swal.fire(
           'Notas adicionadas com sucesso!',
           '',
           'success'
         )
       </script>";
   }
   }unset($_SESSION["nota"]);