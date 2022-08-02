<?php
/*
session_start();
if(isset($_SESSION["logado"])){
  if($_SESSION["logado"] != "logado"){
      $_SESSION["logado"] = "deslogado";
      header("Location: ../index.php?pagina=login");
  }
}

*/

?>





<form class="form-horizontal " action="src\adicionaralunos.php" method="POST">
<fieldset>
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Adicionar alunos</div>
    <div class="panel-body">
    <div class="form-group">
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo obrigatório </p>
</div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Adicionar aluno<h11>*</h11></label>  
  <div class="col-md-8"> 
    <select required id="mat_aluno" name="mat_aluno" class="form-control">
    <option selected disabled hidden></option>


    <?php 
include "src/conexaobd.php";

$turma = $_GET['cod_turma'];

$sql = "SELECT * FROM aluno,turma Where turma.cod_turma = '$turma' AND aluno.status_aluno = 'matriculado' AND aluno.est_matric = 0";

$result = $conn->query($sql);
    
    
  if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    $mat_aluno = $row['mat_aluno'];
    $nome_aluno = $row['nome_aluno'];
    $_SESSION["cod_turmas"] = $row['cod_turma'];
  echo "<option id='mat_aluno' value='$mat_aluno'>$nome_aluno</option>";

  }
}
    ?>

    </select>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cancelar" name="Cancelar" type="button" class="btn btn-danger" onclick="window.location.href='?pagina=listar_turma'"><img src = 'img\retorna (1).svg'  width = '21'> Voltar</button>
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit"><img src = 'img\adicionar.svg' width = '21'> Cadastrar</button>
  </div>
</div>
    </form>
</div>



</form>
</fieldset>