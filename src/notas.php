<?php 
$unidade = $_POST['unidade'];
$cod_turma = $_POST['cod_turma'];
$matriculaal = $_POST['matriculaal'];


include "../src/conexaobd.php";

$sql = "SELECT * FROM aluno_turma Where mat_aluno = '$matriculaal' AND cod_turma = '$cod_turma' AND avaliacao = '$unidade'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    if($row['portugues'] != "-1"){
    $portugues = $row['portugues'];
    }else{
        $portugues = "";
    }
    if($row['geografia'] != "-1"){
        $geografia = $row['geografia'];
        }else{
            $geografia = "";
        }
    if($row['historia'] != "-1"){
        $historia = $row['historia'];
        }else{
            $historia = "";
        }
    if($row['ciencias'] != "-1"){
        $ciencias = $row['ciencias'];
        }else{
            $ciencias = "";
        }
    if($row['matematica'] != "-1"){
        $matematica = $row['matematica'];
        }else{
            $matematica = "";
        }
    if($row['ed_fisica'] != "-1"){
        $ed_fisica = $row['ed_fisica'];
        }else{
            $ed_fisica = "";
        }
    if($row['artes'] != "-1"){
        $artes = $row['artes'];
        }else{
            $artes = "";
        }
    if($row['redacao'] != "-1"){
        $redacao = $row['redacao'];
        }else{
            $redacao = "";
        }
    if($row['soc_cultura'] != "-1"){
        $soc_cultura = $row['soc_cultura'];
        }else{
            $soc_cultura = "";
        }
    if($row['faltas'] != "-1"){
        $faltas = $row['faltas'];
        }else{
            $faltas = "";
        }

    
}
?>
<div id="newpost">
                    <div class="form-group">
                        <div class="col-md-2 control-label">
                            <h3>Notas</h3>
                        </div>
                        </div>

                        <div class="form-group">
                    <label class="col-md-2 control-label" for="Nome">Português<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="port_nota" name="port_nota" type="text" value="<?=$portugues ?>" >
                    </div>
                    
                    <label class="col-md-1 control-label" for="Nome">Geografia<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="geo_nota"  name="geo_nota" type="text" value="<?=$geografia ?>"  >
                    </div>  

                    <label class="col-md-1 control-label" for="Nome">História<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="his_nota" name="his_nota" type="text" value="<?=$historia ?>"  >
                    </div>  
                    </div>  



                    <div class="form-group">
                    <label class="col-md-2 control-label" for="Nome">Ciências<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="cie_nota" name="cie_nota" type="text" value="<?=$ciencias ?>"  >
                    </div>
                    
                    <label class="col-md-1 control-label" for="Nome">Matemática<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="mat_nota" name="mat_nota" type="text" value="<?=$matematica ?>"  >
                    </div>  

                    <label class="col-md-1 control-label" for="Nome">Ed. Física<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="edfis_nota" name="edfis_nota" type="text" value="<?=$ed_fisica ?>"  >
                    </div> 
                    </div> 



                    <div class="form-group">
                    <label class="col-md-2 control-label" for="Nome">Artes<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="art_nota" name="art_nota" type="text" value="<?=$artes ?>"  >
                    </div>
                    
                    <label class="col-md-1 control-label" for="Nome">Redação<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="red_nota" name="red_nota" type="text" value="<?=$redacao ?>"  >
                    </div>  

                    <label class="col-md-1 control-label" for="Nome">Soc. e Cultura<h10>*</h10></label>  
                    <div class="col-md-2">
                    <input class="form-control" id="soccul_nota" name="soccul_nota" type="text" value="<?=$soc_cultura ?>"  >
                    </div> 
                    </div> 

                    <div class="form-group">
                    <label class="col-md-2 control-label" for="Nome">Faltas<h10>*</h10></label>  
                    <div class="col-md-8"> 
                    <input class="form-control" id="faltas" name="faltas" type="number" value="<?=$faltas ?>"  >
                    </div>
                    </div>

                        </div>

                    


                    <script>
                $("#port_nota").val($('#port_nota').val().replace('.', ','));
                $("#geo_nota").val($('#geo_nota').val().replace('.', ','));
                $("#his_nota").val($('#his_nota').val().replace('.', ','));

                $("#cie_nota").val($('#cie_nota').val().replace('.', ','));
                $("#mat_nota").val($('#mat_nota').val().replace('.', ','));
                $("#edfis_nota").val($('#edfis_nota').val().replace('.', ','));

                $("#art_nota").val($('#art_nota').val().replace('.', ','));
                $("#red_nota").val($('#red_nota').val().replace('.', ','));
                $("#soccul_nota").val($('#soccul_nota').val().replace('.', ','));
                </script>

