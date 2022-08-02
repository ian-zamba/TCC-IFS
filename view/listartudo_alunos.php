<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Aluno</div>

    
<div class="divtable">
<?php
include "src/conexaobd.php";
$aluno = $_GET['matriculaal'];


echo"
         <table class='display bordas' style='width:100%'  id='tabela_aluno1'>
         <thead>
         <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th class='text-center'>CPF</th>
            <th class='text-center'>RG</th>
            <th>Idade</th>
            <th class='text-center'>Data de nascimeto</th>
            <th>Sexo</th>
            <th class='text-center'>Nome da mãe</th>
            <th class='text-center'>CPF da mãe</th>
            <th class='text-center'>Telefone de contato</th>
            <th class='text-center'>Nome do pai</th>
            <th class='text-center'>CPF do pai</th>
            <th class='text-center'>Telefone de contato</th>
            <th>Naturalidade</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>SUS</th>
            <th>Bolsa familia</th>
            <th>Status do aluno</th>
            <th>Data de tranferência</th>
            <th>Funcionario</th>
            <th class='text-center'>Editar</th>
         </tr>
         </thead>
   <tbody>";

   $sql = "SELECT * FROM aluno,funcionario WHERE  aluno.mat_func = funcionario.mat_func AND `mat_aluno` = '$aluno'";

   $result = $conn->query($sql);


if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
   $mat_aluno = $row['mat_aluno']; 
   if($row['cpf_aluno'] != ""){
      $cpf_aluno = Mask("###.###.###-##",$row['cpf_aluno']);
   }else{
      $cpf_aluno = "";
   }
   $nome_aluno = $row['nome_aluno'];
   if($row['rg_aluno'] != ""){
   $rg_aluno = Mask("##.###.###-#",$row['rg_aluno']);
}else{
   $rg_aluno = "";
}
   $cartao_sus = $row['cartao_sus'];
   $nascimento1 = $row['nascimento'];
   $sexo = $row['sexo'];
   $naturalidade = $row['naturalidade'];
   $endereco_aluno = $row['endereco_aluno'];
   $bairro = $row['bairro'];
   if($row['cep'] != ""){
      $cep = Mask("#####-###",$row['cep']);
   }else{
      $cep = "";
   } 
   $nome_pai = $row['nome_pai'];
   if($row['cpf_pai'] != ""){
   $cpf_pai = Mask("###.###.###-##",$row['cpf_pai']);
}else {
   $cpf_pai = "";
}
   $telefone_pai = Mask("(##) #####-####",$row['telefone_pai']);
   $nome_mae = $row['nome_mae'];
   $cpf_mae = Mask("###.###.###-##",$row['cpf_mae']);
if($row['telefone_mae'] != ""){
   $telefone_mae = Mask("(##) #####-####",$row['telefone_mae']);
}else{
   $telefone_mae = "";
}
   if($row['bolsa_fam'] != ""){
   $bolsa_fam = Mask("###.###.###.###.###",$row['bolsa_fam']);
}else {
   $bolsa_fam = "";
}
   $status_aluno = $row['status_aluno'];
   $data_trans = $row['data_trans'];
   $nome_func = $row['nome_func'];

   $nascimento = $nascimento1;
   $data = $nascimento;
   list($dia, $mes, $ano) = explode('/', $data);
   $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
   $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
   $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25); 

   echo"
         <tr>
            <td> $mat_aluno </td>
            <td> $nome_aluno </td>
            <td> $cpf_aluno </td>
            <td> $rg_aluno </td>
            <td class='text-center'> $idade </td>
            <td> $nascimento1 </td>
            ";
            if($sexo == 'h'){
               echo" <td  class='text-center'> Masculino </td>";
               }else if($sexo == 'f'){ 
                  echo"<td  class='text-center'> Feminino </td>";
               }else if($sexo == 'o'){ 
                  echo"<td  class='text-center'> Outro </td>";
               }

            echo "<td> $nome_mae </td>
            <td> $cpf_mae </td>
            <td> $telefone_pai </td>
            <td> $nome_pai </td>
            <td> $cpf_pai </td>
            <td> $telefone_mae </td>
            <td> $naturalidade </td>
            <td> $endereco_aluno </td>
            <td> $bairro </td>
            <td> $cep </td>
            <td> $cartao_sus </td>
            <td> $bolsa_fam </td>
            <td> $status_aluno </td>
            <td> $data_trans </td>
            <td> $nome_func </td>
            <td  class='text-center'> <a href='?pagina=alterar_aluno&matriculaal=".$mat_aluno."'>
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
<button id="voltarbtn" name="voltar" class="btn btn-danger" type="Button" onclick="window.location.href='index.php?pagina=listar_alunos'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button><br><br><br>
</div>
</div>
</div>