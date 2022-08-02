<?php
$turma = $_GET['cod_turma'];
$nome_turma = $_GET['nome_turma'];
?>
<input  id ="cod_turma" type="text" value= "<?=$turma?>" hidden>


<div id = "listagem" class = "listagem">
<div class="panel ">
    <div id="subcab" class="panel-heading">SAMJS - Boletim <?=$nome_turma?>
    </div>
          

    <div class="divtable">
    <div class="form-group ">
  <label class="col-md-2 control-label" for="Nome">Unidade</label>  
  <div class="col-md-8"> 
  <select required id="unidade" name="unidade" class="form-control ">
        <option selected disabled hidden>Selecione o período</option>
        <!-- U1, U2, R1, U3, U4, R2, RF -->
        <option id="U1" value="U1">Primeira unidade</option><!--ok-->
        <option id="U2" value="U2">Segunda unidade</option><!--ok-->
        <option id="MPS" value="MPS">Média do primeiro semestre</option><!--ok-->
        <option id="R1" value="R1">Recuperação do primeiro semestre</option><!--ok-->
        <option id="MGPS" value="MGPS">Média geral do primeiro semestre</option><!--ok-->
        <option id="U3" value="U3">Terceira unidade</option><!--ok-->
        <option id="U4" value="U4">Quarta unidade</option><!--ok-->
        <option id="MSS" value="MSS">Média do segundo semestre</option><!--ok-->
        <option id="R2" value="R2">Recuperação do segundo semestre</option><!--ok-->
        <option id="MGSS" value="MGSS">Média geral do segundo semestre</option>
        <option id="MA" value="MA">Média anual</option>
        <option id="RF" value="RF">Recuperação final</option><!--ok-->
        <option id="MF" value="MF">Média final</option>
</select>
  </div>
</div>


                    <div id="boletim">

                    </div>


                    <button id="voltarbtn" name="voltar" class="btn btn-danger botaoaluno" type="Button" onclick="window.location.href='index.php?pagina=boletim_turma'"><img src = 'img\retorna (1).svg' width = '20'> Voltar</button><br><br><br>
</div>
</div>
</div>




<script type="text/javascript">
    function buscar(unidade, cod_turma){
        
        $.ajax
                ({
                    type: 'POST',// método que será usado
                    dataType: 'html', // tipo de retorno
                    url: 'src/boletim.php', //pagina php responsável pela busca no bd, para a qual a função vai mandar alguns parametros
                    beforeSend: function () {//Serve como mesagem para o usuário enquanto a pesquisa n finaliza
                        $("#boletim").html("Carregando...");// por gif de carregamento
                    },
                    data: {unidade: unidade, cod_turma: cod_turma},//mandando parametro palavra
                    success: function (msg) //recebendo retorno 
                    {
                        $("#boletim").html(msg);// pondo na div com o id='dados' o retorno no formato html
                    }
                });
    }
        $('#unidade').on('change', function() {
            
            buscar($("#unidade").val(), $("#cod_turma").val())

            // alert( this.value );
             if(this.value != ""){
                $("#boletim").show();
             }else{
                $("#boletim").hide();
             }
        });




</script>


