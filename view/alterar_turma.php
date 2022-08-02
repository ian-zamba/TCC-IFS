
<?php
include "src/conexaobd.php";


$sql = "SELECT * FROM `turma` WHERE `cod_turma`=".$_GET['cod_turma'];

$result = $conn->query($sql);

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
    $cod_turma = $row['cod_turma'];
    $nome_turma = $row['nome_turma'];
    $turno = $row['turno'];
    $ano_truma = $row['ano_turma'];
    $ch_portugues = $row['ch_portugues'];
    $ch_geografia = $row['ch_geografia'];
    $ch_historia = $row['ch_historia'];
    $ch_ciencias = $row['ch_ciencias'];
    $ch_matematica = $row['ch_matematica'];
    $ch_fisica = $row['ch_fisica'];
    $ch_artes = $row['ch_artes'];
    $ch_redacao = $row['ch_redacao'];
    $ch_soc_cultura = $row['ch_soc_cultura'];
    $mat_func = $row['mat_func'];
}
}
 ?>


<form class="form-horizontal " action="src\alterarturma.php?cod_turma=<?=$cod_turma?>" method="POST">
<fieldset>
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Alteração de turma</div>
    <div class="panel-body">
    <div class="form-group">
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo obrigatório </p>
</div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome da turma<h11>*</h11></label>  
  <div class="col-md-8"> 
        <input class="form-control" maxlength="20"  name="nome_turma" type="text" required value ='<?=$nome_turma?>'>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Ano da turma<h11>*</h11></label>  
  <div class="col-md-3">
  <input class="form-control" id="ano_turma" name="ano_turma" type="text" maxlength="4" required value ='<?=$ano_truma?>'>
  </div>

  <input type="hidden" id="turnos" value='<?=$turno?>'>
  <label class="col-md-2 control-label" for="Nome">Turno<h11>*</h11></label>  
  <div class="col-md-3">
  <select required id="turno" name="turno" class="form-control">
    <option selected disabled hidden></option>
      <option id="Matutino" value="Matutino">Matutino</option>
      <option id="Vespertino" value="Vespertino">Vespertino</option>
</select>
  </div>
</div>





  <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Professor da turma<h11>*</h11></label>  
  <div class="col-md-8"> 
    <select required id="Professor_turma" name="Professor_turma" class="form-control">
    <option id="<?=$mat_func?>" value = "<?=$mat_func?>"></option>
    <option id="nenhum" value="000">Nenhum</option>
    <?php 
    include "src/conexaobd.php";
    $sql = "SELECT * FROM `funcionario`";

    $result = $conn->query($sql);
    
    
  if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    if($row['mat_func'] != "000" && $row['mat_func'] != "123"){
    $mat_func = $row['mat_func'];
    $nome_func = $row['nome_func'];
  echo "<option id='$mat_func' value='$mat_func'>$nome_func</option>";
}
  }
}
    
    ?>
    </select>
  </div>
</div>



  <div id="newpost">
   <div class="form-group">
    <div class="col-md-2 control-label">
        <h3>Cargas Horárias</h3>
    </div>
    </div>

    <div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Português<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" name="port" type="number" value ='<?=$ch_portugues?>' placeholder="Horas" placeholder="Horas" required>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Geografia<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="geo" type="number" value ='<?=$ch_geografia?>' placeholder="Horas" required>
</div>  

  <label class="col-md-1 control-label" for="Nome">História<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="his" type="number" value ='<?=$ch_historia?>' placeholder="Horas" required>
</div>  
</div>  



<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Ciências<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" name="cie" type="number" value ='<?=$ch_ciencias?>' placeholder="Horas" required>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Matemática<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="mat" type="number" value ='<?=$ch_matematica?>' placeholder="Horas" required>
</div>  

  <label class="col-md-1 control-label" for="Nome">Ed. Física<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="edfis" type="number" value ='<?=$ch_fisica?>' placeholder="Horas" required>
</div> 
</div> 



<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Artes<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control" name="art" type="number" value ='<?=$ch_artes?>' placeholder="Horas" required>
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Redação<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="red" type="number" value ='<?=$ch_redacao?>' placeholder="Horas" required>
</div>  

  <label class="col-md-1 control-label" for="Nome">Soc. e Cultura<h11>*</h11></label>  
  <div class="col-md-2">
  <input class="form-control"  name="soccul" type="number" value ='<?=$ch_soc_cultura?>' placeholder="Horas" required>
</div> 
</div> 

    </div>







<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button" onclick="window.location.href='index.php?pagina=listar_turma'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button>
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit"><img src = 'img\troca (1).svg' width = '20'> Alterar</button>
  </div>
</div>
    </form>
</div>



<script>
		$("#ano_turma").mask("9999");

	</script>

</form>
</fieldset>

<?php

if(isset($_SESSION["erro"])){
  if($_SESSION["erro"] == "nome_turma"){
      echo"
      <script>
          Swal.fire(
              'Turma já existente!',
              '',
              'error'
            )
          </script>";
  }
}unset($_SESSION["erro"]);