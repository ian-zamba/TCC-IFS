<?php

    include "header.php";
?>
        
        <?php
            $pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : "";
            switch($pagina){
                    case 'login':
                        include_once 'view/login.php';
                        $index = '';
                        break;

                    case 'home':
                        include_once 'view/home.php';
                        $index = '';
                        break;

                    case 'cadastros':
                        include_once 'view/cadastros.php';
                        $index = '';
                        break;

                    case 'cadastro_aluno':
                        include_once 'view/cadastro_aluno.php';
                        $index = '';
                        break;

                    case 'cadastro_func':
                        include_once 'view/cadastro_func.php';
                        $index = '';
                        break;  

                    case 'cadastro_disciplina':
                        include_once 'view\cadastro_disciplina.php';
                        $index = '';
                        break;  

                    case 'cadastro_turma':
                        include_once 'view\cadastro_turma.php';
                        $index = '';
                        break;  

                    case 'alterar_func':
                        include_once 'view\alterar_func.php';
                        $index = '';
                        break; 

                    case 'listar_funcionarios':
                        include_once 'view\listar_funcionarios.php';
                        $index = '';
                        break; 
                         
                    case 'listar_alunos':
                        include_once 'view\listar_alunos.php';
                        $index = '';
                        break;  

                    case 'alterar_aluno':
                        include_once 'view\alterar_aluno.php';
                        $index = '';
                        break;  
                        
                    case 'listartudo_alunos':
                        include_once 'view\listartudo_alunos.php';
                        $index = '';
                        break;  
                        
                    case 'listar_todosalunos':
                        include_once 'view\listar_todosalunos.php';
                        $index = '';
                        break; 

                    case 'listar_turma':
                        include_once 'view\listar_turma.php';
                        $index = '';
                        break;  

                    case 'alterar_turma':
                        include_once 'view\alterar_turma.php';
                        $index = '';
                        break;  

                    case 'listar_ch':
                        include_once 'view\listar_ch.php';
                        $index = '';
                        break;  

                    case 'listar_alunosturm':
                        include_once 'view\listar_alunosturm.php';
                        $index = '';
                        break;  

                    case 'listar_alunosturm2':
                        include_once 'view\listar_alunosturm2.php';
                        $index = '';
                        break;  

                    case 'listar_todasch':
                        include_once 'view\listar_todasch.php';
                        $index = '';
                        break; 

                    case 'boletim':
                        include_once 'view\boletim.php';
                        $index = '';
                        break;  

                    case 'boletim_aluno':
                        include_once 'view\boletim_aluno.php';
                        $index = '';
                        break;  

                    case 'boletim_turma':
                        include_once 'view\boletim_turma.php';
                        $index = '';
                        break;  

                    case 'pessoas':
                        include_once 'view\pessoas.php';
                        $index = '';
                        break;  

                    case 'adicionar_alunos':
                        include_once 'view\adicionar_alunos.php';
                        $index = '';
                        break;  

                    case 'adicionar_nota':
                        include_once 'view\adicionar_nota.php';
                        $index = '';
                        break;  

                    case 'mostrar_boletimturma':
                        include_once 'view\mostrar_boletimturma.php';
                        $index = '';
                        break;  

                    case 'mostrar_boletimaluno':
                        include_once 'view\mostrar_boletimaluno.php';
                        $index = '';
                        break;  
                        

                    //repetir para todas as paginas
                
                    default :
                    include_once "index.php";
                    $index = 'index';
                    break;
            }
            if($index == 'index'){
        ?>
        <img class = "imagem" src="img\Brasao.jpg">
<?php
}
    include "footer.php";

    function Mask($mask,$str){

        $str = str_replace(" ","",$str);
    
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
    
        return $mask;
    
    }


?>