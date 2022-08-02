<?php
session_start();
$_SESSION["finalizarturm"] = "inexistente";

header("Location: ../index.php?pagina=listar_turma");