<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Cargas Horárias
    </div>
          

    <div class="divtable">
<?php
include "src/conexaobd.php";


$sql = "SELECT * FROM `turma`";

$result = $conn->query($sql);

echo"
         <table class='display bordas' style='width:100%'  id='tabela_turma'>
         <thead>
         <tr>
            <th class='text-center'>Nome</th>
            <th class='text-center'>Ano</th>
            <th class='text-center'>Português</th>
            <th class='text-center'>Geografia</th>
            <th class='text-center'>História</th>
            <th class='text-center'>Ciências</th>
            <th class='text-center'>Matemática</th>
            <th class='text-center'>Ed. Física</th>
            <th class='text-center'>Artes</th>
            <th class='text-center'>Redação</th>
            <th class='text-center'>Soc. e Cultura</th>
            <th class='text-center'>Editar</th>
         </tr>
         </thead>
         
   <tbody>";

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
   $cod_turma = $row['cod_turma'];
   $nome_turma = $row['nome_turma'];
   $ch_portugues = $row['ch_portugues'];
   $ch_geografia = $row['ch_geografia'];
   $ch_historia = $row['ch_historia'];
   $ch_ciencias = $row['ch_ciencias'];
   $ch_matematica = $row['ch_matematica'];
   $ch_fisica = $row['ch_fisica'];
   $ch_artes = $row['ch_artes'];
   $ch_redacao = $row['ch_redacao'];
   $ch_soc_cultura = $row['ch_soc_cultura'];
   $ano_truma = $row['ano_turma'];
   

   echo"
         <tr>
            <td class='text-center'> $nome_turma </td>            
            <td class='text-center'> $ano_truma </td>
            <td class='text-center'> $ch_portugues h</td>
            <td class='text-center'> $ch_geografia h</td>
            <td class='text-center'> $ch_historia h</td>
            <td class='text-center'> $ch_ciencias h</td>
            <td class='text-center'> $ch_matematica h</td>
            <td class='text-center'> $ch_fisica h</td>
            <td class='text-center'> $ch_artes h</td>
            <td class='text-center'> $ch_redacao h</td>
            <td class='text-center'> $ch_soc_cultura h</td>


            <td  class='text-center'> <a href='?pagina=alterar_turma&cod_turma=".$cod_turma."'>
        <img src = 'img/botao-editar.svg' width = '20'> </a> </td>

         </tr>";
}
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
<button id="voltarbtn" name="voltar" class="btn btn-danger" type="Button" onclick="window.location.href='index.php?pagina=listar_turma'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button><br><br><br>
</div>
</div>
</div>
