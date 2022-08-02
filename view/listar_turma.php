<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Turmas
       <button id="cadastrobtn" class="btn butonsub" type="button" onclick="window.location.href='?pagina=cadastro_turma'">Cadastrar nova turma</button>
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
            <th class='text-center'>Nome</th>
            <th class='text-center'>Turno</th>
            <th class='text-center'>Ano</th>
            <th class='text-center'>Professor</th>
            <th class='text-center'>Status</th>
            <th class='text-center'>Adicionar alunos</th>
            <th class='text-center'>Ver alunos da turma</th>            
            <th class='text-center'>Ver carga horária</th>
            <th class='text-center'>Editar</th>
         </tr>
         </thead>
         
   <tbody>";


    while($row = $result->fetch_assoc()){
      
         $nome_func = $row['nome_func'];
         

       $cod_turma = $row['cod_turma'];
       $nome_turma = $row['nome_turma'];
       $turno = $row['turno'];
       $ano_truma = $row['ano_turma'];
       
       if($row['tem_alunosturma'] == "sim"){
            $listar = "<a href='?pagina=listar_alunosturm&cod_turma=".$cod_turma."&nome_turma=".$nome_turma."'>
            <img src = 'img/mais.svg' width = '20'> </a>";
       }else{
         $listar = "<a href='src\listaralunosturm1.php'>
         <img src = 'img/mais.svg' width = '20'> </a>";
       }

       if($row['status_turma'] == 1){
          $status_turma = "Ativa";
          $botaoadic = "<a href='?pagina=adicionar_alunos&cod_turma=".$cod_turma."'>
          <img src = 'img/adicionar (1).svg' width = '20'> </a>";
          $botaoeditar = "<a href='?pagina=alterar_turma&cod_turma=".$cod_turma."'>
          <img src = 'img/botao-editar.svg' width = '20'> </a>";
       }
       else{
          $status_turma = "Inativa";
          $botaoadic = "";
          $botaoeditar = "";
       }

   echo"
         <tr>
            <td> $nome_turma </td>
            <td class='text-center'> $turno </td>
            <td class='text-center'> $ano_truma </td>
            <td class='text-center'> $nome_func </td>
            <td class='text-center'> $status_turma </td>

            <td class='text-center'> $botaoadic </td>

            <td class='text-center'> $listar </td>

            <td class='text-center'> <a href='?pagina=listar_ch&cod_turma=".$cod_turma."'>
            <img src = 'img/relogio.svg' width = '20'> </a> </td>

            <td class='text-center'> $botaoeditar </td>
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
<button id='tudobtn' class='btn butonsub' type='button' onclick="window.location.href='?pagina=listar_todasch'">Ver cargas horárias </button><br><br><br>
</div>
</div>
</div>


<?php
if(isset($_SESSION["cadastro"])){
   if($_SESSION["cadastro"] == "turm"){
       echo"
       <script>
       Swal.fire(
           'Turma cadastrada com sucesso!',
           '',
           'success'
         )
       </script>";
   }
}unset($_SESSION["cadastro"]);

   if(isset($_SESSION["alt"])){
       if($_SESSION["alt"] == "altturm"){
           echo"
           <script>
           Swal.fire(
               'Turma alterada com sucesso!',
               '',
               'success'
             )
           </script>";
       }
       }unset($_SESSION["alt"]);

if(isset($_SESSION["finalizarturm"])){
   if($_SESSION["finalizarturm"] == "finalizada"){
       echo"
       <script>
           Swal.fire(
               'Turma desativada com sucesso!',
               '',
               'success'
             )
           </script>";
   }else if($_SESSION["finalizarturm"] == "inexistente"){
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