<form class="form-horizontal " action="src\cadastrofunc.php" method="POST">
<fieldset>
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Cadastro de funcionário</div>
    <div class="panel-body">
    <div class="form-group">
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
</div>
<div class="col-md-11 control-label">
        <p class="help-block"><h10>*</h10> Campo recomendado </p>
</div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Matrícula <h11>*</h11></label>  
  <div class="col-md-8"> 
  <input class="form-control" placeholder="Até 15 Caracteres" name="mat_func" maxlength="15" type="text" required>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
  <div class="col-md-8">
  <input class="form-control"  name="nome_func" type="text" maxlength="45" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" id="cpf_func" name="cpf_func" maxlength="11" type="text" placeholder="000.000.000-00" required>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">RG<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" id="rg_func" name="rg_func" maxlength="9" placeholder="0.000.000-0" type="text">
</div>  
  <label class="col-md-1 control-label" for="Nome">Telefone<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" id="telefone_func" name="telefone_func" maxlength="11" type="text" placeholder="(00) 00000-0000" >
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Cargo <h11>*</h11></label>  
  <div class="col-md-8"> 
  <select required id="cargo_func" name="cargo_func" class="form-control" >
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
  <input class="form-control"  name="endereco_func" maxlength="300" type="text" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Usuário<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="email_func" maxlength="200" type="text" required>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Senha<h11>*</h11></label>  
  <div class="col-md-2">
        <input class="form-control" id="senha_func" name="senha_func" maxlength="256" type="password" required>
        <button class="mostrar" type="Button" onclick="mostrar()"><img src = 'img\olho.svg' width = '20'></button>
        <script> type="text/javascript" src="js/script.js"</script>
        
</div>   
  </div>


  <div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Button" onclick="window.location.href='index.php?pagina=listar_funcionarios'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button>
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" onclick="RemoveMaskAndSubmit()" type="Submit"><img src = 'img\adicionar.svg' width = '21'> Cadastrar</button>
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