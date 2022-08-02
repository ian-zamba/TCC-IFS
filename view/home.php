
 
<div id="menu" class="panel">
 <div id="subcab" class="panel-heading ">SAMJS - Início</div>
 <div class="menuesquerda">
<a href="index.php?pagina=pessoas"><img id="imgmenu1" src="img\Pessoas.png" ></a>
</div>
 <div class="menuesquerda">
<a  href="index.php?pagina=listar_turma"><img id="imgmenu2" src="img\TURMA (1).png" ></a>
</div>
 <div>
<a  href="index.php?pagina=boletim_turma"><img id="imgmenu3" src="img\BOLETIM (1).png" ></a>
</div>
</div>








 <?php
if(isset($_SESSION["cadastro"])){
    if($_SESSION["cadastro"] == "aluno"){
        echo"
        <script>
            Swal.fire(
                'Aluno cadastrado com sucesso!',
                '',
                'success'
              )
            </script>";
    }else if($_SESSION["cadastro"] == "func"){
        echo"
        <script>
        Swal.fire(
            'Funcionario cadastrado com sucesso!',
            '',
            'success'
          )
        </script>";
    }else if($_SESSION["cadastro"] == "turm"){
        echo"
        <script>
        Swal.fire(
            'Turma cadastrada com sucesso!',
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
        else if($_SESSION["alt"] == "altaluno"){
            echo"
            <script>
            Swal.fire(
                'Aluno alterado com sucesso!',
                '',
                'success'
              )
            </script>";
        }
        else if($_SESSION["alt"] == "altturm"){
            echo"
            <script>
            Swal.fire(
                'Turma alterada com sucesso!',
                '',
                'success'
              )
            </script>";
        }
        }unset($_SESSION["alt"]);
?>