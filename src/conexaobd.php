<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "escola";
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    echo ("Conexão falhou: " . mysqli_connect_error());
}

