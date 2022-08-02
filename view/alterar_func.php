<?php
include "src/conexaobd.php";


$sql = "SELECT * FROM `funcionario` WHERE `mat_func`=".$_GET['matricula'];

$result = $conn->query($sql);

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
   $nome_func = $row['nome_func'];
   $mat_func = $row['mat_func'];
   $cpf_func = $row['cpf_func'];
   $rg_func = $row['rg_func'];
   $cargo_func = $row['cargo_func'];
   $endereco_func = $row['endereco_func'];
   $telefone_func = $row['telefone_func'];
   $email_func = $row['email_func'];
   $senha_func = $row['senha_func'];
   $acesso_func = $row['acesso_func'];
   $status_func = $row['status_func'];
}
}
if($mat_func == "000"){
  header("Location: index.php?pagina=home");
}
 ?>

<form class="form-horizontal " action="src\alterarfunc.php?matricula=<?=$mat_func?>" method="POST">
<fieldset>
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Alteração de funcionario</div>
    <div class="panel-body">
    <div class="form-group">
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
</div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Matrícula <h11>*</h11></label>  
  <div class="col-md-8"> 
  <input class="form-control"  name="mat_func"  placeholder="Até 15 Caracteres" maxlength="15" type="text" required value ='<?=$mat_func?>'>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
  <div class="col-md-8">
  <input class="form-control"  name="nome_func" type="text" maxlength="45" required value ='<?=$nome_func?>'>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" id="cpf_func" name="cpf_func" maxlength="11" type="text" placeholder="000.000.000-00" required value ='<?=$cpf_func?>'>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">RG<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" id="rg_func" name="rg_func" maxlength="9" type="text" placeholder="0.000.000-0" value ='<?=$rg_func?>'>
</div>  
  <label class="col-md-1 control-label" for="Nome">Telefone<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" id="telefone_func" name="telefone_func" maxlength="11" type="text" placeholder="(00) 00000-0000" value ='<?=$telefone_func?>'>
</div>  
  </div>

  <div class="form-group">
<input type="hidden" id="cargo_funci" value='<?=$cargo_func?>'>
  <label class="col-md-2 control-label" for="Nome">Cargo <h11>*</h11></label>  
  <div class="col-md-8"> 
  <select required id="cargo_func" name="cargo_func" class="form-control">
    <option selected disabled hidden></option>
        <option id="diretor" value="diretor">Diretor(a)</option>
        <option id="professor" value="professor">Professor(a)</option>
        <option id="coordenador" value="coordenador">Coordenador(a)</option>
        <option id="assistente_administrativo" value="assistente_administrativo">Assistente administrativo</option>
        <option id="secretario" value="secretario">Secretario(a)</option>
        <option id="outros" value="outros">Outro</option>
</select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Endereço <h10>*</h10></label>  
  <div class="col-md-8"> 
  <input class="form-control"  name="endereco_func" maxlength="300" type="text" value ='<?=$endereco_func?>' >
  </div>
</div>


<div class="form-group">
<input type="hidden" id="acesso_funci" value='<?=$acesso_func?>'>
  <label class="col-md-2 control-label" for="Nome">Acesso<h11>*</h11></label>  
  <div class="col-md-2">
  <select required id="acesso_func" name="acesso_func" class="form-control">
    <option value =<?=$acesso_func?>></option>
      <option id="Temacesso" value="1">Tem acesso</option>
      <option id="Naotem" value="0">Não tem acesso</option>
</select>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Status<h11>*</h11></label>  
  <div class="col-md-2">
<input type="hidden" id="status_funci" value='<?=$status_func?>'>
  <select required id="status_func" name="status_func" class="form-control">
    <option value =<?=$status_func?>></option>
      <option id="Emservico" value="1">Em serviço</option>
      <option id="Foradeservico" value="0">Fora de serviço</option>
</select>
</div>   
  </div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Usuário<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="email_func" maxlength="200" type="text" required value ='<?=$email_func?>'>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Senha<h11>*</h11></label>  
  <div class="col-md-2">
        <input class="form-control" id="senha_func" name="senha_func" maxlength="256" required type="password" value ='<?=$senha_func?>'>
        <button class="mostrar" type="Button" onclick="mostrar()"><img src = 'img\olho.svg' width = '20'></button>
        <script> type="text/javascript" src="js/script.js"</script>
</div>   
  </div>


  <div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Button" onclick="window.location.href='index.php?pagina=listar_funcionarios'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button>
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" onclick="RemoveMaskAndSubmit()" type="Submit"><img src = 'img\troca (1).svg' width = '20'> Alterar</button>
  </div>
</div>

<script>
		$("#telefone_func").mask("(99) 99999-9999");

		$("#cpf_func").mask("999.999.999-99");

		$("#rg_func").mask("99.999.999-*");

	</script>

<script type="text/javascript">
            function RemoveMaskAndSubmit() {
                $("#telefone_func").val($('#telefone_func').val().replace('(', '').replace(')', '').replace(' ', '').replace('-', ''));
               
                $('#cpf_func').val($('#cpf_func').val().replace('.', '').replace('.', '').replace('-', ''));

                $('#rg_func').val($('#rg_func').val().replace('.', '').replace('.', '').replace('-', ''));

                 $('#formId').submit();
            }
        </script>


</div>
</div>
</form>
</fieldset>

<?php

if(isset($_SESSION["erro"])){
  if($_SESSION["erro"] == "mat_func"){
      echo"
      <script>
          Swal.fire(
              'Matrícula já existente!',
              '',
              'error'
            )
          </script>";
  }
  else if($_SESSION["erro"] == "cpf_func"){
      echo"
      <script>
          Swal.fire(
              'CPF já existente!',
              '',
              'error'
            )
          </script>";
  }
  else if($_SESSION["erro"] == "email_func"){
      echo"
      <script>
          Swal.fire(
              'Usuário já existente!',
              '',
              'error'
            )
          </script>";
  }
  else if($_SESSION["erro"] == "rg_func"){
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