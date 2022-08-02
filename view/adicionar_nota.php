<?php
$turma = $_GET['cod_turma'];
$aluno = $_GET['matriculaal'];
?>
<input  id ="cod_turma" type="text" value= "<?=$turma?>" hidden>
<input  id ="matriculaal" type="text" value= "<?=$aluno?>" hidden>
<!-- U1, U2, R1, U3, U4, R2, RF -->
<form class="form-horizontal " action="src\adicionarnota.php?matriculaal=<?=$aluno?>&cod_turma=<?=$turma?>" method="POST">
<fieldset>
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Cadastro de turma</div>
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
  <label class="col-md-2 control-label" for="Nome">Unidade<h11>*</h11></label>  
  <div class="col-md-8"> 
  <select required id="unidade" name="unidade" class="form-control">
        <option selected disabled hidden></option>
        <!-- U1, U2, R1, U3, U4, R2, RF -->
        <option id="U1" value="U1">Primeira unidade</option>
        <option id="U2" value="U2">Segunda unidade</option>
        <option id="R1" value="R1">Recuperação do primeiro semestre</option>
        <option id="U3" value="U3">Terceira unidade</option>
        <option id="U4" value="U4">Quarta unidade</option>
        <option id="R2" value="R2">Recuperação do segundo semestre</option>
        <option id="RF" value="RF">Recuperação final</option>
</select>
  </div>
</div>




                    <div id="notas">

                    </div>

                    <div id="notas_botão">
                    <div class="form-group">
                    <label class="col-md-2 control-label" for="Cadastrar"></label>
                    <div class="col-md-8">
                        <button id="Cancelar" name="Cancelar" type="button" class="btn btn-danger" onclick="history.back()"><img src = 'img\retorna (1).svg'  width = '21'> Voltar</button>
                        <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit"><img src = 'img\adicionar-grupo (1).svg' width = '21'> Cadastrar</button>
                    </div>
                    </div>
                    </div>


                    
    </form>
</div>




<script type="text/javascript">
    function buscar(unidade, cod_turma, matriculaal){
        
        $.ajax
                ({
                    type: 'POST',// método que será usado
                    dataType: 'html', // tipo de retorno
                    url: 'src/notas.php', //pagina php responsável pela busca no bd, para a qual a função vai mandar alguns parametros
                    beforeSend: function () {//Serve como mesagem para o usuário enquanto a pesquisa n finaliza
                        $("#notas").html("Carregando...");// por gif de carregamento
                    },
                    data: {unidade: unidade, cod_turma: cod_turma, matriculaal: matriculaal},//mandando parametro palavra
                    success: function (msg) //recebendo retorno 
                    {
                        $("#notas").html(msg);// pondo na div com o id='dados' o retorno no formato html
                    }
                });
    }
        $('#unidade').on('change', function() {
            
            buscar($("#unidade").val(), $("#cod_turma").val(), $("#matriculaal").val())

            // alert( this.value );
             if(this.value != ""){
                $("#notas").show();
                $("#notas_botão").show();
             }else{
                $("#notas").hide();
                $("#notas_botão").hide();
             }
        });



            function RemoveMaskAndSubmit() {
               
                
                $("#port_nota").val($('#port_nota').val().replace(',', '.'));
                $("#geo_nota").val($('#geo_nota').val().replace(',', '.'));
                $("#his_nota").val($('#his_nota').val().replace(',', '.'));

                $("#cie_nota").val($('#cie_nota').val().replace(',', '.'));
                $("#mat_nota").val($('#mat_nota').val().replace(',', '.'));
                $("#edfis_nota").val($('#edfis_nota').val().replace(',', '.'));

                $("#art_nota").val($('#art_nota').val().replace(',', '.'));
                $("#red_nota").val($('#red_nota').val().replace(',', '.'));
                $("#soccul_nota").val($('#soccul_nota').val().replace(',', '.'));
                  

            }



        </script>

</form>
</fieldset>