<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ian Matheus Zambanini">
    <title>SAMJS</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.material.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

 
    

</head>
<body>
   
<?php
session_start();


if(isset($_SESSION["logou"])) { ?>
    <div class="header">
      <ul>
        <a href="?pagina=home">
        <img src = 'img\pagina-inicial (1).svg' width = '20'> Início</a>
        <div class="header-centro">
        Você está logado como: <?=$_SESSION["nome"]?>
    

        <div class="header-right">
        <a href="sair.php">
                Sair <img src = 'img\sair (1).svg' width = '20'></a>
        
     </ul>
    </div> 
</div> 
   </div> 


    <?php } else { ?> 
        <div class="header">
        <div class="header-nome">
         Sistema Acadêmico Escola Municipal Manoel de Jesus Silva - SAMJS
        </div>
        <div class="header-right">
            <a href="?pagina=login">login <img src = 'img\entrar (1).svg' width = '20'></a> 
        </div>        
        </div>
       
    <?php } ?>



