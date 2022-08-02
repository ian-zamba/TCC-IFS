<div id="fundo-externo">
    <div id="fundo">
        <img src="img\fundologin.jpg"/>
    </div>
</div>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 shadow rounded">
                        <form id="login-form" class="form" action="src/checa_login.php" method="post">
                            <h3  class="text-center  longin1">Login no sistema</h3>
                            <div class="form-group">
                                <label  for="username" class=" longin1">Usuário:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label  for="password" class=" longin1">Senha:</label><br>
                                <input type="password" name="password" id="senha_func" class="form-control">
                                <button class="mostrar" type="Button" onclick="mostrar()"><img src = 'img\olho (1).svg' width = '20'></button>
                            </div>
                            <div class="form-group">
        
                                <input type="submit" id="botao1" name="Entra" class="btn botao1 " value="Entrar">
                            </div>
                        </form>
                        <?php
                            if(isset($_SESSION["deu"])){
                                if($_SESSION["deu"] == "sem"){
                                    echo"
                                    <script>
                                    Swal.fire(
                                            'Usuario não tem acesso!', 
                                            '',
                                            'error',
                                            )
                                    </script>";
                                }else if($_SESSION["deu"] == "errado"){
                                    echo"
                                    <script>
                                    Swal.fire(
                                            'Usuário e/ou Senha incorretos!', 
                                            '',
                                            'error',
                                            )
                                    </script>";
                                }
                                else if($_SESSION["deu"] == "vazio"){
                                    echo"
                                    <script>
                                    Swal.fire(
                                            'Preencha todos os campos!', 
                                            '',
                                            'error',
                                            )
                                    </script>";
                                }
                            }unset($_SESSION["deu"]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>