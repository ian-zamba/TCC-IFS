<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Funcionários 
        <button id="cadastrobtn" class="btn butonsub" type="button" onclick="window.location.href='?pagina=cadastro_func'">Cadastrar novo funcionario</button>
        </div>


<div class="divtable">
<?php
include "src/conexaobd.php";


$sql = "SELECT * FROM `funcionario`";

$result = $conn->query($sql);

echo"
         <table class='display bordas' style='width:100%'  id='tabela_func'>
         <thead>
         <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th class='text-center'>CPF</th>
            <th class='text-center'>RG</th>
            <th class='text-center'>Cargo</th>
            <th class='text-center'>Endereço</th>
            <th class='text-center'>Telefone</th>
            <th class='text-center'>Usuário</th>
            <th>tipo de acesso</th>
            <th>Status</th>
            <th>Editar</th>

         </tr>
         </thead>       
   <tbody>
";

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
    if($row['mat_func'] != "000" && $row['mat_func'] != "123"){
   $nome_func = $row['nome_func'];
   $mat_func = $row['mat_func'];
   $cpf_func = Mask("###.###.###-##",$row['cpf_func']);
   if($row['rg_func'] != ""){
   $rg_func = Mask("##.###.###-#",$row['rg_func']);
}else{
    $rg_func = "";
}

if($row['cargo_func'] == "diretor"){
$cargo_func = "Diretor(a)";
}
else if($row['cargo_func'] == "professor"){
$cargo_func = "Professor(a)";
}
else if($row['cargo_func'] == "coordenador"){
$cargo_func = "Coordenador(a)";
}
else if($row['cargo_func'] == "assistente_administrativo"){
$cargo_func = "Assistente administrativo";
}
else if($row['cargo_func'] == "secretario"){
$cargo_func = "Secretario(a)";
}
else if($row['cargo_func'] == "outros"){
$cargo_func = "Outro";
}



   $endereco_func = $row['endereco_func'];
   if($row['telefone_func'] != ""){
   $telefone_func = Mask("(##) #####-####",$row['telefone_func']);
}else {
    $telefone_func = "";
}
   $email_func = $row['email_func'];
   $acesso_func = $row['acesso_func'];
   $status_func = $row['status_func'];

   echo"
         <tr>
         
    
            <td> $mat_func </td>
            <td> $nome_func </td>
            <td class='text-center'> $cpf_func </td>
            <td class='text-center'> $rg_func </td>
            <td class='text-center'> $cargo_func </td>
            <td class='text-center'> $endereco_func </td>
            <td class='text-center'> $telefone_func </td>
            <td> $email_func </td>
            ";
            if($acesso_func == 1){
                echo"<td> Tem acesso </td>";
            }else {
                echo"<td> Não tem acesso </td>";
            }

            if($status_func == 1){
                echo"<td> Em serviço </td>";
            }else {
                echo"<td> Fora de serviço </td>";
            }
         echo"<td  class='text-center'> <a href='?pagina=alterar_func&matricula=".$mat_func."'>
        <img src = 'img/botao-editar.svg' width = '20'> </a> </td>
         </tr>";
}
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
<button id="voltarbtn" name="voltar" class="btn btn-danger" type="Button" onclick="window.location.href='index.php?pagina=pessoas'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button><br><br><br>
</div>
</div>
</div>

<?php

if(isset($_SESSION["cadastro"])){
    if($_SESSION["cadastro"] == "func"){
        echo"
        <script>
        Swal.fire(
            'Funcionario cadastrado com sucesso!',
            '',
            'success'
          )
        </script>";
    }
}unset($_SESSION["cadastro"]);

if(isset($_SESSION["alt"])){
    if($_SESSION["alt"] == "altfunc"){
        echo"
        <script>
        Swal.fire(
            'Funcionario alterado com sucesso!',
            '',
            'success'
          )
        </script>";
    }
    }unset($_SESSION["alt"]);