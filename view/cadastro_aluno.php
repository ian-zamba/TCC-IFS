<form class="form-horizontal " action="src\cadastroaluno.php" method="POST">
<fieldset>
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Cadastro de aluno</div>
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
  <label class="col-md-2 control-label"  for="Nome">Matrícula<h11>*</h11></label>  
  <div class="col-md-8"> 
  <input class="form-control"  name="mat_aluno"  placeholder="Até 15 Caracteres" maxlength="15" type="text" required>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  
  <div class="col-md-3">
  <input class="form-control" maxlength="45" name="nome_aluno" type="text" required>
  </div>

  <label class="col-md-2 control-label" for="Nome">Sexo<h11>*</h11></label>  
  <div class="col-md-3">
    <select  id="sexo" name="sexo" class="form-control" required>
    <option selected disabled hidden></option>
      <option id="h" value="h">Masculino</option>
      <option id="f" value="f">Feminino</option>
      <option id="o" value="o">Outro</option>
</select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">CPF<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control"  name="cpf_aluno" id="cpf" maxlength="11" placeholder="000.000.000-00" type="text">
  </div>
  
  <label class="col-md-1 control-label" for="Nome">RG<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control"  name="rg_aluno" id="rg" placeholder="0.000.000-0" maxlength="9" type="text">
</div>  
  <label class="col-md-1 control-label" for="Nome">Nascimento<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" id="nascimento" name="nascimento" placeholder="dd/mm/aaaa"  type="text" required>
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome da mâe<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="45" name="nome_mae" type="text" required>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">CPF da mâe<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" name="cpf_mae" id="cpf_mae" placeholder="000.000.000-00" maxlength="11" type="text" required>
</div>  
  <label class="col-md-1 control-label" for="Nome">Telefone de contato<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="11" id="telefone" placeholder="(00) 00000-0000" name="telefone_pai"  type="text" required>
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome do pai<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="45" name="nome_pai" type="text">
  </div>
  
  <label class="col-md-1 control-label" for="Nome">CPF do pai<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" name="cpf_pai" id="cpf_pai" placeholder="000.000.000-00" maxlength="11" type="text">
</div>
  <label class="col-md-1 control-label" for="Nome">Telefone de contato<h10>*</h10></label>  
  <div class="col-md-2">
  <input class="form-control" maxlength="11" id="telefone1" placeholder="(00) 00000-0000" name="telefone_mae" type="text">
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Endereço<h11>*</h11></label>  
  <div class="col-md-8"> 
  <input class="form-control" maxlength="50" name="endereco_aluno" type="text" required>
  </div>
</div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Bairro<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" maxlength="20" name="bairro" type="text" >
  </div>
  
  <label class="col-md-1 control-label" for="Nome">CEP<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" id="cep"  name="cep" maxlength="8" type="text" placeholder="00000-000">
</div>  
  <label class="col-md-1 control-label" for="Nome">Naturalidade<h10>*</h10></label>  
  <div class="col-md-2">
        <input class="form-control" maxlength="20" name="naturalidade" type="text">
</div>  
  </div>

  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Cartao do SUS<h10>*</h10></label>  
  <div class="col-md-3"><input class="form-control" id="sus" maxlength="19" placeholder="000.000.000.000.000" name="cartao_sus" type="text">
  </div>

  <label class="col-md-2 control-label" for="Nome">Bolsa família<h10>*</h10></label>  
  <div class="col-md-3">
  <input class="form-control" maxlength="16" id="bolsafam" name="bolsa_fam" placeholder="0000000000000000" type="text">
  </div>
</div>

  



<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Button" onclick="window.location.href='index.php?pagina=listar_alunos'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button>
    <button id="Cadastrar" name="Cadastrar" onclick="RemoveMaskAndSubmit()" class="btn btn-success" type="Submit"><img src = 'img\adicionar.svg' width = '21'> Cadastrar</button>
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



		$("#sus").mask("999.999.999.999.999");

		$("#matricula").mask("999999999999999");

		$("#nascimento").mask("99/99/9999");

	</script>

<script type="text/javascript">
            function RemoveMaskAndSubmit() {
                $("#telefone").val($('#telefone').val().replace('(', '').replace(')', '').replace(' ', '').replace('-', ''));
                $("#telefone1").val($('#telefone1').val().replace('(', '').replace(')', '').replace(' ', '').replace('-', ''));
               

                $('#cpf').val($('#cpf').val().replace('.', '').replace('.', '').replace('-', ''));
                $('#cpf_mae').val($('#cpf_mae').val().replace('.', '').replace('.', '').replace('-', ''));
                $('#cpf_pai').val($('#cpf_pai').val().replace('.', '').replace('.', '').replace('-', ''));
                
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