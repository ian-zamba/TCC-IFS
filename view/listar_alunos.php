<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Alunos
       <button id="cadastrobtn" class="btn butonsub" type="button" onclick="window.location.href='?pagina=cadastro_aluno'">Cadastrar novo aluno</button>
    </div>
          

    <div class="divtable">
<?php
include "src/conexaobd.php";


$sql = "SELECT * FROM `aluno`";

$result = $conn->query($sql);

echo"
         <table class='display bordas' style='width:100%'  id='tabela_alunos'>
         <thead>
         <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th class='text-center'>CPF</th>
            <th>Idade</th>
            <th class='text-center'>Telefone de contato</th>
            <th class='text-center'>Nome da mãe</th>
            <th class='text-center'>Nome do pai</th>            
            <th>Endereço</th>
            <th>Bairro</th>
            <th class='text-center'>CEP</th>
            <th class='text-center'>Status do aluno</th>
            <th>Editar</th>
            <th class='text-center'>Ver mais</th>
         </tr>
         </thead>
         
   <tbody>";

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
   $mat_aluno = $row['mat_aluno'];
   if($row['cpf_aluno'] != ""){
   $cpf_aluno = Mask("###.###.###-##",$row['cpf_aluno']);
}else{
   $cpf_aluno = "";
}
   $nome_aluno = $row['nome_aluno'];
   $endereco_aluno = $row['endereco_aluno'];
   $bairro = $row['bairro'];
   if($row['cep'] != ""){
   $cep = Mask("#####-###",$row['cep']);
}else{
   $cep = "";
} 
   $telefone_pai = Mask("(##) #####-####",$row['telefone_pai']);  
   $nome_pai = $row['nome_pai'];
   $nome_mae = $row['nome_mae'];
   $status_aluno = $row['status_aluno'];
   $nascimento = $row['nascimento'];


   $data = $nascimento;
   list($dia, $mes, $ano) = explode('/', $data);
   $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
   $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
   $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25); 

   echo"
         <tr>
            <td> $mat_aluno </td>
            <td> $nome_aluno </td>
            <td class='text-center'> $cpf_aluno </td>
            <td class='text-center'> $idade </td>            
            <td> $telefone_pai </td>
            <td> $nome_mae </td>
            <td> $nome_pai </td>
            <td> $endereco_aluno </td>
            <td> $bairro </td>
            <td> $cep </td>
            <td class='text-center'> $status_aluno </td>
            <td  class='text-center'> <a href='?pagina=alterar_aluno&matriculaal=".$mat_aluno."'>
        <img src = 'img/botao-editar.svg' width = '20'> </a> </td>
            <td  class='text-center'> <a href='?pagina=listartudo_alunos&matriculaal=".$mat_aluno."'>
        <img src = 'img\mais.svg' width = '20'> </a> </td>
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
<button id='tudobtn' class='btn butonsub' type='button' onclick="window.location.href='?pagina=listar_todosalunos'">Listar tudo</button>
</div>
<button id="voltarbtn" name="voltar" class="btn btn-danger botaoaluno" type="Button" onclick="window.location.href='index.php?pagina=pessoas'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button><br><br><br>
</div>
</div>


<?php

if(isset($_SESSION["cadastro"])){
   if($_SESSION["cadastro"] == "aluno"){
       echo"
       <script>
           Swal.fire(
               'Aluno cadastrado com sucesso!',
               '',
               'success'
             )
           </script>";
   }
}unset($_SESSION["cadastro"]);

   if(isset($_SESSION["alt"])){
       if($_SESSION["alt"] == "altaluno"){
           echo"
           <script>
           Swal.fire(
               'Aluno alterado com sucesso!',
               '',
               'success'
             )
           </script>";
       }
       }unset($_SESSION["alt"]);