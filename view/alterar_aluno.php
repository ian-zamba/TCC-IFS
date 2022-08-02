<?php
include "src/conexaobd.php";


$sql = "SELECT * FROM `aluno` WHERE `mat_aluno`=". $_GET['matriculaal'];

$result = $conn->query($sql);

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
   $mat_aluno = $row['mat_aluno'];
   $cpf_aluno = $row['cpf_aluno'];
   $nome_aluno = $row['nome_aluno'];
   $rg_aluno = $row['rg_aluno'];
   $cartao_sus = $row['cartao_sus'];
   $nascimento = $row['nascimento'];
   $sexo = $row['sexo'];
   $naturalidade = $row['naturalidade'];
   $endereco_aluno = $row['endereco_aluno'];
   $bairro = $row['bairro'];
   $cep = $row['cep'];
   $nome_pai = $row['nome_pai'];
   $cpf_pai = $row['cpf_pai'];
   $telefone_pai = $row['telefone_pai'];
   $nome_mae = $row['nome_mae'];
   $cpf_mae = $row['cpf_mae'];
   $telefone_mae = $row['telefone_mae'];
   $bolsa_fam = $row['bolsa_fam'];
   $status_aluno = $row['status_aluno'];
   $data_trans = $row['data_trans'];
   $mat_func = $row['mat_func'];
}
}
   ?>

<form class="form-horizontal " action="src\alteraraluno.php?matriculaal=<?=$mat_aluno?>" method="POST">
<fieldset>
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Alteração de aluno</div>
    <div class="panel-body">
    <div class="form-group">
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo obrigatório </p>
</div>
<div class="col-md-11 control-label">
        <p class="help-block"><h10>*</h10> Campo recomendado </p>
</div>
</div>



<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Matrícula<h11>*</h11></label>  
  <div class="col-md-8"> 
  <input class="form-control"  name="mat_aluno" placeholder="Até 15 Caracteres" maxlength="15" type="text" required value ='<?=$mat_aluno?>'>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  
  <div class="col-md-3">
  <input class="form-control" maxlength="45" name="nome_aluno" type="text" required value ='<?=$nome_aluno?>'>
  </div>

  
  <input type="hidden" id="sexy" value='<?=$sexo?>'>
  <label class="col-md-2 control-label" for="Nome">Sexo<h11>*</h11></label>  
  <div class="col-md-3">
        <select required id="sexo" name="sexo" class="form-control" >
      <option value ="<?=$sexo?>" selected disabled hidden></option>
      <option id="Masculino" value="h">Masculino</option>
      <option id="Feminino" value="f">Feminino</option>
      <option id="Outro" value="o">Outro</option>
</select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">CPF<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control"  name="cpf_aluno" id="cpf" placeholder="000.000.000-00" maxlength="11" type="text" value ='<?=$cpf_aluno?>'>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">RG<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control"  name="rg_aluno" id="rg" placeholder="0.000.000-0" maxlength="9" type="text" value ='<?=$rg_aluno?>'>
</div>  
  <label class="col-md-1 control-label" for="Nome">Nascimento<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" id="nascimento" name="nascimento"  type="text" required value ='<?=$nascimento?>' >
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome da mâe<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="45" name="nome_mae" type="text" required value ='<?=$nome_mae?>'>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">CPF da mâe<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" name="cpf_mae" id="cpf_mae" placeholder="000.000.000-00" maxlength="11" type="text" required value ='<?=$cpf_mae?>'>
</div>
  <label class="col-md-1 control-label" for="Nome">Telefone de contato<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="11" id="telefone" name="telefone_pai" placeholder="(00) 00000-0000" id="telefone" type="text" required value ='<?=$telefone_pai?>'>
</div>  
  </div>

  <div class="form-group">
    <label class="col-md-2 control-label" for="Nome">Nome do pai<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="45" name="nome_pai" type="text" value ='<?=$nome_pai?>'>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">CPF do pai<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" name="cpf_pai" id="cpf_pai" placeholder="000.000.000-00" maxlength="11" type="text" value ='<?=$cpf_pai?>'>
</div>  
  <label class="col-md-1 control-label" for="Nome">Telefone de contato<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="11" id="telefone1" name="telefone_mae" placeholder="(00) 00000-0000" type="text" value ='<?=$telefone_mae?>'>
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Endereço<h11>*</h11></label>  
  <div class="col-md-8"> 
  <input class="form-control" maxlength="50" name="endereco_aluno" type="text" required value ='<?=$endereco_aluno?>'>
  </div>
</div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Bairro<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" maxlength="20" name="bairro" type="text" value ='<?=$bairro?>' >
  </div>
  
  <label class="col-md-1 control-label" for="Nome">CEP<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" id="cep" name="cep" placeholder="00000-000" maxlength="8" type="text" value ='<?=$cep?>'>
</div>  
  <label class="col-md-1 control-label" for="Nome">Naturalidade<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" maxlength="20" name="naturalidade" type="text" value ='<?=$naturalidade?>'>
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Cartao do SUS<h10>*</h10></label>  
  <div class="col-md-3"><input class="form-control" id="sus" placeholder="000.000.000.000.000" maxlength="19" name="cartao_sus" type="text" value ='<?=$cartao_sus?>'>
  </div>

  <label class="col-md-2 control-label" for="Nome">Bolsa família<h10>*</h10></label>  
  <div class="col-md-3">
  <input class="form-control" maxlength="16" placeholder="0000000000000000" id="bolsafam" name="bolsa_fam" type="text" value ='<?=$bolsa_fam?>'>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Button" onclick="window.location.href='index.php?pagina=listar_alunos'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button>
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit" onclick="RemoveMaskAndSubmit()"><img src = 'img\troca (1).svg' width = '20'> Alterar</button>
  </div>
</div>


<script>
		$("#telefone").mask("(99) 99999-9999");
		$("#telefone1").mask("(99) 99999-9999");

		$("#cpf").mask("999.999.999-99");
		$("#cpf_mae").mask("999.999.999-99");
		$("#cpf_pai").mask("999.999.999-99");

		$("#rg").mask("99.999.999-*");

		$("#cep").mask("99999-999");

		$("#bolsafam").mask("9999999999999999");

		$("#sus").mask("999.999.999.999.999");

    

		$("#nascimento").mask("99/99/9999");

	</script>

<script type="text/javascript">
            function RemoveMaskAndSubmit() {
                $("#telefone").val($('#telefone').val().replace('(', '').replace(')', '').replace(' ', '').replace('-', ''));
                $("#telefone1").val($('#telefone1').val().replace('(', '').replace(')', '').replace(' ', '').replace('-', ''));
               

                $('#cpf').val($('#cpf').val().replace('.', '').replace('.', '').replace('-', ''));
                $('#cpf_mae').val($('#cpf').val().replace('.', '').replace('.', '').replace('-', ''));
                $('#cpf_pai').val($('#cpf').val().replace('.', '').replace('.', '').replace('-', ''));
                
                $('#rg').val($('#rg').val().replace('.', '').replace('.', '').replace('-', ''));
                
                $("#cep").val($('#cep').val().replace('-', ''));

                $("#sus").val($('#sus').val().replace('.', '').replace('.', '').replace('.', '').replace('.', ''));


                 $('#formId').submit();
            }
        </script>


</div>
</div>
</form>
</fieldset>


<?php

if(isset($_SESSION["erro"])){
  if($_SESSION["erro"] == "mat_aluno"){
      echo"
      <script>
          Swal.fire(
              'Matrícula já existente!',
              '',
              'error'
            )
          </script>";
  }
  else if($_SESSION["erro"] == "cpf_aluno"){
      echo"
      <script>
          Swal.fire(
              'CPF já existente!',
              '',
              'error'
            )
          </script>";
  }
  else if($_SESSION["erro"] == "rg_aluno"){
      echo"
      <script>
          Swal.fire(
              'RG já existente!',
              '',
              'error'
            )
          </script>";
  }
}unset($_SESSION["erro"]);