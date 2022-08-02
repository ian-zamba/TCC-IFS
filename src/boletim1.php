<?php

$unidade = $_POST['unidade'];
$turma = $_POST['cod_turma'];
$matriculaal = $_POST['matriculaal'];



include "../src/conexaobd.php";

/*==================================U1, U2, R1, U3, U4, R2, RF=============================================*/
if($unidade == "U1" || $unidade == "U2" ||$unidade == "R1" ||
$unidade == "U3" ||$unidade == "U4" ||$unidade == "R2" ||$unidade == "RF" ){

$sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno.mat_aluno = aluno_turma.mat_aluno 
AND aluno_turma.cod_turma = turma.cod_turma AND turma.cod_turma = '$turma' AND aluno.mat_aluno = '$matriculaal' AND aluno_turma.avaliacao = '$unidade'";

$result = $conn->query($sql);

echo"
         <table class='display bordas' style='width:100%'  id='mostrar_boletimaluno'>
         <thead>
         <tr>
            <th class='text-center'>Matrícula</th>
            <th class='text-center'>Nome</th>
            <th class='text-center'>Português</th>
            <th class='text-center'>Geografia</th>
            <th class='text-center'>História</th>
            <th class='text-center'>Ciências</th>
            <th class='text-center'>Matemática</th>
            <th class='text-center'>Ed. Física</th>
            <th class='text-center'>Artes</th>            
            <th class='text-center'>Redação</th>
            <th class='text-center'>Soc. e Cultura</th>
            <th class='text-center'>Faltas</th>
         </tr>
         </thead>
         
   <tbody>";

while($row = $result->fetch_assoc()){
    $nome_aluno = $row['nome_aluno'];
    $mat_aluno = $row['mat_aluno'];

    if($row['portugues'] != "-1"){
    $portugues = $row['portugues'];
    $portugues = number_format($portugues, 1, '.', '');
    $portugues = str_replace(".",",",$portugues);
    }else{
        $portugues = 0;
        $portugues = number_format($portugues, 1, '.', '');
        $portugues = str_replace(".",",",$portugues);
    }

    if($row['geografia'] != "-1"){
        $geografia = $row['geografia'];
        $geografia = number_format($geografia, 1, '.', '');
        $geografia = str_replace(".",",",$geografia);
        }else{
            $geografia = 0;
            $geografia = number_format($geografia, 1, '.', '');
            $geografia = str_replace(".",",",$geografia);
        }

    if($row['historia'] != "-1"){
        $historia = $row['historia'];
        $historia = number_format($historia, 1, '.', '');
        $historia = str_replace(".",",",$historia);
        }else{
            $historia = 0;
            $historia = number_format($historia, 1, '.', '');
            $historia = str_replace(".",",",$historia);
        }

    if($row['ciencias'] != "-1"){
        $ciencias = $row['ciencias'];
        $ciencias = number_format($ciencias, 1, '.', '');
        $ciencias = str_replace(".",",",$ciencias);
        }else{
            $ciencias = 0;
            $ciencias = number_format($ciencias, 1, '.', '');
            $ciencias = str_replace(".",",",$ciencias);
        }

    if($row['matematica'] != "-1"){
        $matematica = $row['matematica'];
        $matematica = number_format($matematica, 1, '.', '');
        $matematica = str_replace(".",",",$matematica);
        }else{
            $matematica = 0;
            $matematica = number_format($matematica, 1, '.', '');
            $matematica = str_replace(".",",",$matematica);
        }

    if($row['ed_fisica'] != "-1"){
        $ed_fisica = $row['ed_fisica'];
        $ed_fisica = number_format($ed_fisica, 1, '.', '');
        $ed_fisica = str_replace(".",",",$ed_fisica);
        }else{
            $ed_fisica = 0;
            $ed_fisica = number_format($ed_fisica, 1, '.', '');
            $ed_fisica = str_replace(".",",",$ed_fisica);
        }

    if($row['artes'] != "-1"){
        $artes = $row['artes'];
        $artes = number_format($artes, 1, '.', '');
        $artes = str_replace(".",",",$artes);
        }else{
            $artes = 0;
            $artes = number_format($artes, 1, '.', '');
            $artes = str_replace(".",",",$artes);
        }

    if($row['redacao'] != "-1"){
        $redacao = $row['redacao'];
        $redacao = number_format($redacao, 1, '.', '');
        $redacao = str_replace(".",",",$redacao);
        }else{
            $redacao = 0;
            $redacao = number_format($redacao, 1, '.', '');
            $redacao = str_replace(".",",",$redacao);
        }

    if($row['soc_cultura'] != "-1"){
        $soc_cultura = $row['soc_cultura'];
        $soc_cultura = number_format($soc_cultura, 1, '.', '');
        $soc_cultura = str_replace(".",",",$soc_cultura);
        }else{
            $soc_cultura = 0;
            $soc_cultura = number_format($soc_cultura, 1, '.', '');
            $soc_cultura = str_replace(".",",",$soc_cultura);
        }

        $faltas = $row['faltas'];

    
        echo"
        <tr>
           <td class='text-center'> $mat_aluno </td>
           <td class='text-center'> $nome_aluno </td>
           <td class='text-center'> $portugues </td>
           <td class='text-center'> $geografia </td>
           <td class='text-center'> $historia </td>
           <td class='text-center'> $ciencias </td>
           <td class='text-center'> $matematica </td>
           <td class='text-center'> $ed_fisica </td>
           <td class='text-center'> $artes </td>
           <td class='text-center'> $redacao </td>
           <td class='text-center'> $soc_cultura </td>
           <td class='text-center'> $faltas </td>
        </tr>";
}

echo"</tbody> 
</table>";
}

/*========================================Média do primeiro semestre============================================================*/

else if($unidade == "MPS"){
$sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno_turma.cod_turma = turma.cod_turma AND
turma.cod_turma = '$turma' AND aluno.mat_aluno = '$matriculaal' AND aluno.mat_aluno = aluno_turma.mat_aluno ";

$result = $conn->query($sql);
echo"
         <table class='display bordas' style='width:100%'  id='mostrar_boletimaluno'>
         <thead>
         <tr>
            <th class='text-center'>Matrícula</th>
            <th class='text-center'>Nome</th>
            <th class='text-center'>Português</th>
            <th class='text-center'>Geografia</th>
            <th class='text-center'>História</th>
            <th class='text-center'>Ciências</th>
            <th class='text-center'>Matemática</th>
            <th class='text-center'>Ed. Física</th>
            <th class='text-center'>Artes</th>            
            <th class='text-center'>Redação</th>
            <th class='text-center'>Soc. e Cultura</th>
            <th class='text-center'>Faltas</th>
         </tr>
         </thead>
         
   <tbody>";


while($row = $result->fetch_assoc()){
        
    $nome_aluno = $row['nome_aluno'];
    $mat_aluno = $row['mat_aluno'];

if($row['avaliacao'] == "U1"){

    if($row['portugues'] != "-1"){
    $portugues1 = $row['portugues'];
    }else{
        $portugues1 = 0;
    }

    if($row['geografia'] != "-1"){
        $geografia1 = $row['geografia'];
        }else{
            $geografia1 = 0;
        }

    if($row['historia'] != "-1"){
        $historia1 = $row['historia'];
        }else{
            $historia1 = 0;
        }

    if($row['ciencias'] != "-1"){
        $ciencias1 = $row['ciencias'];
        }else{
            $ciencias1 = 0;
        }

    if($row['matematica'] != "-1"){
        $matematica1 = $row['matematica'];
        }else{
            $matematica1 = 0;
        }

    if($row['ed_fisica'] != "-1"){
        $ed_fisica1 = $row['ed_fisica'];
        }else{
            $ed_fisica1 = 0;
        }

    if($row['artes'] != "-1"){
        $artes1 = $row['artes'];
        }else{
            $artes1 = 0;
        }

    if($row['redacao'] != "-1"){
        $redacao1 = $row['redacao'];
        }else{
            $redacao1 = 0;
        }

    if($row['soc_cultura'] != "-1"){
        $soc_cultura1 = $row['soc_cultura'];
        }else{
            $soc_cultura1 = 0;
        }

        $faltas1 = $row['faltas'];
    }
    
    if($row['avaliacao'] == "U2"){

        if($row['portugues'] != "-1"){
        $portugues2 = $row['portugues'];
        }else{
            $portugues2 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia2 = $row['geografia'];
            }else{
                $geografia2 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia2 = $row['historia'];
            }else{
                $historia2 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias2 = $row['ciencias'];
            }else{
                $ciencias2 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica2 = $row['matematica'];
            }else{
                $matematica2 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica2 = $row['ed_fisica'];
            }else{
                $ed_fisica2 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes2 = $row['artes'];
            }else{
                $artes2 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao2 = $row['redacao'];
            }else{
                $redacao2 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura2 = $row['soc_cultura'];
            }else{
                $soc_cultura2 = 0;
            }
    
            $faltas2 = $row['faltas'];

        $portugues = ($portugues1+$portugues2)/2;
        $portugues = number_format($portugues, 1, '.', '');
        $portugues = str_replace(".",",",$portugues);

        $geografia = ($geografia1+$geografia2)/2;  
        $geografia = number_format($geografia, 1, '.', '');
        $geografia = str_replace(".",",",$geografia);

        $historia = ($historia1+$historia2)/2;
        $historia = number_format($historia, 1, '.', '');
        $historia = str_replace(".",",",$historia);

        $ciencias = ($ciencias1+$ciencias2)/2;
        $ciencias = number_format($ciencias, 1, '.', '');
        $ciencias = str_replace(".",",",$ciencias);

        $matematica = ($matematica1+$matematica2)/2;
        $matematica = number_format($matematica, 1, '.', '');
        $matematica = str_replace(".",",",$matematica);

        $ed_fisica = ($ed_fisica1+$ed_fisica2)/2;
        $ed_fisica = number_format($ed_fisica, 1, '.', '');
        $ed_fisica = str_replace(".",",",$ed_fisica);

        $artes = ($artes1+$artes2)/2;
        $artes = number_format($artes, 1, '.', '');
        $artes = str_replace(".",",",$artes);

        $redacao = ($redacao1+$redacao2)/2;
        $redacao = number_format($redacao, 1, '.', '');
        $redacao = str_replace(".",",",$redacao);

        $soc_cultura = ($soc_cultura1+$soc_cultura2)/2;
        $soc_cultura = number_format($soc_cultura, 1, '.', '');
        $soc_cultura = str_replace(".",",",$soc_cultura);

        $faltas = $faltas1+$faltas2;
        


        
    echo"
            <tr>
               <td class='text-center'> $mat_aluno </td>
               <td class='text-center'> $nome_aluno </td>
               <td class='text-center'> $portugues </td>
               <td class='text-center'> $geografia </td>
               <td class='text-center'> $historia </td>
               <td class='text-center'> $ciencias </td>
               <td class='text-center'> $matematica </td>
               <td class='text-center'> $ed_fisica </td>
               <td class='text-center'> $artes </td>
               <td class='text-center'> $redacao </td>
               <td class='text-center'> $soc_cultura </td>
               <td class='text-center'> $faltas </td>
               
            </tr>";

}
   
        }
    
echo"</tbody> 
</table>";
}

/*===========================================Média do segundo semestre=======================================*/

else if($unidade == "MSS"){
    $sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno_turma.cod_turma = turma.cod_turma AND
    turma.cod_turma = '$turma' AND aluno.mat_aluno = '$matriculaal' AND aluno.mat_aluno = aluno_turma.mat_aluno ";
    
    $result = $conn->query($sql);
    echo"
             <table class='display bordas' style='width:100%'  id='mostrar_boletimaluno'>
             <thead>
             <tr>
                <th class='text-center'>Matrícula</th>
                <th class='text-center'>Nome</th>
                <th class='text-center'>Português</th>
                <th class='text-center'>Geografia</th>
                <th class='text-center'>História</th>
                <th class='text-center'>Ciências</th>
                <th class='text-center'>Matemática</th>
                <th class='text-center'>Ed. Física</th>
                <th class='text-center'>Artes</th>            
                <th class='text-center'>Redação</th>
                <th class='text-center'>Soc. e Cultura</th>
                <th class='text-center'>Faltas</th>
             </tr>
             </thead>
             
       <tbody>";
    
    
    while($row = $result->fetch_assoc()){
        
        $nome_aluno = $row['nome_aluno'];
        $mat_aluno = $row['mat_aluno'];
    
    if($row['avaliacao'] == "U3"){
    
        if($row['portugues'] != "-1"){
        $portugues1 = $row['portugues'];
        }else{
            $portugues1 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia1 = $row['geografia'];
            }else{
                $geografia1 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia1 = $row['historia'];
            }else{
                $historia1 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias1 = $row['ciencias'];
            }else{
                $ciencias1 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica1 = $row['matematica'];
            }else{
                $matematica1 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica1 = $row['ed_fisica'];
            }else{
                $ed_fisica1 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes1 = $row['artes'];
            }else{
                $artes1 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao1 = $row['redacao'];
            }else{
                $redacao1 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura1 = $row['soc_cultura'];
            }else{
                $soc_cultura1 = 0;
            }
    
            $faltas1 = $row['faltas'];
        }
        
        if($row['avaliacao'] == "U4"){
    
            if($row['portugues'] != "-1"){
            $portugues2 = $row['portugues'];
            }else{
                $portugues2 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia2 = $row['geografia'];
                }else{
                    $geografia2 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia2 = $row['historia'];
                }else{
                    $historia2 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias2 = $row['ciencias'];
                }else{
                    $ciencias2 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica2 = $row['matematica'];
                }else{
                    $matematica2 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica2 = $row['ed_fisica'];
                }else{
                    $ed_fisica2 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes2 = $row['artes'];
                }else{
                    $artes2 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao2 = $row['redacao'];
                }else{
                    $redacao2 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura2 = $row['soc_cultura'];
                }else{
                    $soc_cultura2 = 0;
                }
        
                $faltas2 = $row['faltas'];
    
                $portugues = ($portugues1+$portugues2)/2;
                $portugues = number_format($portugues, 1, '.', '');
                $portugues = str_replace(".",",",$portugues);
        
                $geografia = ($geografia1+$geografia2)/2;
                $geografia = number_format($geografia, 1, '.', '');
                $geografia = str_replace(".",",",$geografia);
        
                $historia = ($historia1+$historia2)/2;
                $historia = number_format($historia, 1, '.', '');
                $historia = str_replace(".",",",$historia);
        
                $ciencias = ($ciencias1+$ciencias2)/2;
                $ciencias = number_format($ciencias, 1, '.', '');
                $ciencias = str_replace(".",",",$ciencias);
        
                $matematica = ($matematica1+$matematica2)/2;
                $matematica = number_format($matematica, 1, '.', '');
                $matematica = str_replace(".",",",$matematica);
        
                $ed_fisica = ($ed_fisica1+$ed_fisica2)/2;
                $ed_fisica = number_format($ed_fisica, 1, '.', '');
                $ed_fisica = str_replace(".",",",$ed_fisica);
        
                $artes = ($artes1+$artes2)/2;
                $artes = number_format($artes, 1, '.', '');
                $artes = str_replace(".",",",$artes);
        
                $redacao = ($redacao1+$redacao2)/2;
                $redacao = number_format($redacao, 1, '.', '');
                $redacao = str_replace(".",",",$redacao);
        
                $soc_cultura = ($soc_cultura1+$soc_cultura2)/2;
                $soc_cultura = number_format($soc_cultura, 1, '.', '');
                $soc_cultura = str_replace(".",",",$soc_cultura);
        
                $faltas = $faltas1+$faltas2;
            
    
    
            
        echo"
                <tr>
                   <td class='text-center'> $mat_aluno </td>
                   <td class='text-center'> $nome_aluno </td>
                   <td class='text-center'> $portugues </td>
                   <td class='text-center'> $geografia </td>
                   <td class='text-center'> $historia </td>
                   <td class='text-center'> $ciencias </td>
                   <td class='text-center'> $matematica </td>
                   <td class='text-center'> $ed_fisica </td>
                   <td class='text-center'> $artes </td>
                   <td class='text-center'> $redacao </td>
                   <td class='text-center'> $soc_cultura </td>
                   <td class='text-center'> $faltas </td>
                   
                </tr>";
    
    }
       
            }
        
    echo"</tbody> 
    </table>";
    }

/*=======================================Média geral do primeiro semestre=====================================*/

    else if($unidade == "MGPS"){
        $sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno_turma.cod_turma = turma.cod_turma AND
        turma.cod_turma = '$turma' AND aluno.mat_aluno = '$matriculaal' AND aluno.mat_aluno = aluno_turma.mat_aluno ";
        
        $result = $conn->query($sql);
        echo"
                 <table class='display bordas' style='width:100%'  id='mostrar_boletimaluno'>
                 <thead>
                 <tr>
                    <th class='text-center'>Matrícula</th>
                    <th class='text-center'>Nome</th>
                    <th class='text-center'>Português</th>
                    <th class='text-center'>Geografia</th>
                    <th class='text-center'>História</th>
                    <th class='text-center'>Ciências</th>
                    <th class='text-center'>Matemática</th>
                    <th class='text-center'>Ed. Física</th>
                    <th class='text-center'>Artes</th>            
                    <th class='text-center'>Redação</th>
                    <th class='text-center'>Soc. e Cultura</th>
                    <th class='text-center'>Faltas</th>
                 </tr>
                 </thead>
                 
           <tbody>";
        
        
        while($row = $result->fetch_assoc()){
            $portugues = 0;
                $geografia = 0;
                $historia = 0;
                $ciencias = 0;
                $matematica = 0;
                $ed_fisica = 0;
                $artes = 0;
                $redacao = 0;
                $soc_cultura = 0;
                $faltas = 0;
            
            $nome_aluno = $row['nome_aluno'];
            $mat_aluno = $row['mat_aluno'];
        
        if($row['avaliacao'] == "U1"){
        
            if($row['portugues'] != "-1"){
            $portugues1 = $row['portugues'];
            }else{
                $portugues1 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia1 = $row['geografia'];
                }else{
                    $geografia1 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia1 = $row['historia'];
                }else{
                    $historia1 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias1 = $row['ciencias'];
                }else{
                    $ciencias1 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica1 = $row['matematica'];
                }else{
                    $matematica1 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica1 = $row['ed_fisica'];
                }else{
                    $ed_fisica1 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes1 = $row['artes'];
                }else{
                    $artes1 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao1 = $row['redacao'];
                }else{
                    $redacao1 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura1 = $row['soc_cultura'];
                }else{
                    $soc_cultura1 = 0;
                }
        
                $faltas1 = $row['faltas'];
            }
            
            if($row['avaliacao'] == "U2"){
        
                if($row['portugues'] != "-1"){
                $portugues2 = $row['portugues'];
                }else{
                    $portugues2 = 0;
                }
            
                if($row['geografia'] != "-1"){
                    $geografia2 = $row['geografia'];
                    }else{
                        $geografia2 = 0;
                    }
            
                if($row['historia'] != "-1"){
                    $historia2 = $row['historia'];
                    }else{
                        $historia2 = 0;
                    }
            
                if($row['ciencias'] != "-1"){
                    $ciencias2 = $row['ciencias'];
                    }else{
                        $ciencias2 = 0;
                    }
            
                if($row['matematica'] != "-1"){
                    $matematica2 = $row['matematica'];
                    }else{
                        $matematica2 = 0;
                    }
            
                if($row['ed_fisica'] != "-1"){
                    $ed_fisica2 = $row['ed_fisica'];
                    }else{
                        $ed_fisica2 = 0;
                    }
            
                if($row['artes'] != "-1"){
                    $artes2 = $row['artes'];
                    }else{
                        $artes2 = 0;
                    }
            
                if($row['redacao'] != "-1"){
                    $redacao2 = $row['redacao'];
                    }else{
                        $redacao2 = 0;
                    }
            
                if($row['soc_cultura'] != "-1"){
                    $soc_cultura2 = $row['soc_cultura'];
                    }else{
                        $soc_cultura2 = 0;
                    }
            
                    $faltas2 = $row['faltas'];
        
                $portugues3 = ($portugues1+$portugues2)/2;
                $geografia3 = ($geografia1+$geografia2)/2;
                $historia3 = ($historia1+$historia2)/2;
                $ciencias3 = ($ciencias1+$ciencias2)/2;
                $matematica3 = ($matematica1+$matematica2)/2;
                $ed_fisica3 = ($ed_fisica1+$ed_fisica2)/2;
                $artes3 = ($artes1+$artes2)/2;
                $redacao3 = ($redacao1+$redacao2)/2;
                $soc_cultura3 = ($soc_cultura1+$soc_cultura2)/2;
                $faltas3 = $faltas1+$faltas2;
                
        }

        if($row['avaliacao'] == "R1"){
        
            if($row['portugues'] != "-1"){
            $portugues1 = $row['portugues'];
            }else{
                $portugues1 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia1 = $row['geografia'];
                }else{
                    $geografia1 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia1 = $row['historia'];
                }else{
                    $historia1 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias1 = $row['ciencias'];
                }else{
                    $ciencias1 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica1 = $row['matematica'];
                }else{
                    $matematica1 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica1 = $row['ed_fisica'];
                }else{
                    $ed_fisica1 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes1 = $row['artes'];
                }else{
                    $artes1 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao1 = $row['redacao'];
                }else{
                    $redacao1 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura1 = $row['soc_cultura'];
                }else{
                    $soc_cultura1 = 0;
                }
        
                $faltas1 = $row['faltas'];
            if($portugues3 <= ($portugues1+$portugues3)/2){
                $portugues = ($portugues1+$portugues3)/2;
                $portugues = number_format($portugues, 1, '.', '');
                $portugues = str_replace(".",",",$portugues);
            }else{
                $portugues = $portugues3;
                $portugues = number_format($portugues, 1, '.', '');
                $portugues = str_replace(".",",",$portugues);
            }

            if($geografia3 <= ($geografia1+$geografia3)/2){
                $geografia = ($geografia1+$geografia3)/2;
                $geografia = number_format($geografia, 1, '.', '');
                $geografia = str_replace(".",",",$geografia);
            }else{
                $geografia = $geografia3;
                $geografia = number_format($geografia, 1, '.', '');
                $geografia = str_replace(".",",",$geografia);
            }

            if($historia3 <= ($historia1+$historia3)/2){
                $historia = ($historia1+$historia3)/2;
                $historia = number_format($historia, 1, '.', '');
                $historia = str_replace(".",",",$historia);
            }else{
                $historia = $historia3;
                $historia = number_format($historia, 1, '.', '');
                $historia = str_replace(".",",",$historia);
            }

            if($ciencias3 <= ($ciencias1+$ciencias3)/2){
                $ciencias = ($ciencias1+$ciencias3)/2;
                $ciencias = number_format($ciencias, 1, '.', '');
                $ciencias = str_replace(".",",",$ciencias);
            }else{
                $ciencias = $ciencias3;
                $ciencias = number_format($ciencias, 1, '.', '');
                $ciencias = str_replace(".",",",$ciencias);
            }
            
            if($matematica3 <= ($matematica1+$matematica3)/2){
                $matematica = ($matematica1+$matematica3)/2;
                $matematica = number_format($matematica, 1, '.', '');
                $matematica = str_replace(".",",",$matematica);
            }else{
                $matematica = $matematica3;
                $matematica = number_format($matematica, 1, '.', '');
                $matematica = str_replace(".",",",$matematica);
            }
            
            if($ed_fisica3 <= ($ed_fisica1+$ed_fisica3)/2){
                $ed_fisica = ($ed_fisica1+$ed_fisica3)/2;
                $ed_fisica = number_format($ed_fisica, 1, '.', '');
                $ed_fisica = str_replace(".",",",$ed_fisica);
            }else{
                $ed_fisica = $ed_fisica3;
                $ed_fisica = number_format($ed_fisica, 1, '.', '');
                $ed_fisica = str_replace(".",",",$ed_fisica);
            }
            
            if($artes3 <= ($artes1+$artes3)/2){
                $artes = ($artes1+$artes3)/2;
                $artes = number_format($artes, 1, '.', '');
                $artes = str_replace(".",",",$artes);
            }else{
                $artes = $artes3;
                $artes = number_format($artes, 1, '.', '');
                $artes = str_replace(".",",",$artes);
            }
            
            if($redacao3 <= ($redacao1+$redacao3)/2){
                $redacao = ($redacao1+$redacao3)/2;
                $redacao = number_format($redacao, 1, '.', '');
                $redacao = str_replace(".",",",$redacao);
            }else{
                $redacao = $redacao3;
                $redacao = number_format($redacao, 1, '.', '');
                $redacao = str_replace(".",",",$redacao);
            }
            
            if($soc_cultura3 <= ($soc_cultura1+$soc_cultura3)/2){
                $soc_cultura = ($soc_cultura1+$soc_cultura3)/2;
                $soc_cultura = number_format($soc_cultura, 1, '.', '');
                $soc_cultura = str_replace(".",",",$soc_cultura);
            }else{
                $soc_cultura = $soc_cultura3;
                $soc_cultura = number_format($soc_cultura, 1, '.', '');
                $soc_cultura = str_replace(".",",",$soc_cultura);
            }
            
                $faltas = $faltas1+$faltas3;

                echo"
                    <tr>
                       <td class='text-center'> $mat_aluno </td>
                       <td class='text-center'> $nome_aluno </td>
                       <td class='text-center'> $portugues </td>
                       <td class='text-center'> $geografia </td>
                       <td class='text-center'> $historia </td>
                       <td class='text-center'> $ciencias </td>
                       <td class='text-center'> $matematica </td>
                       <td class='text-center'> $ed_fisica </td>
                       <td class='text-center'> $artes </td>
                       <td class='text-center'> $redacao </td>
                       <td class='text-center'> $soc_cultura </td>
                       <td class='text-center'> $faltas </td>
                       
                    </tr>";
            }
           
                }
            
        echo"</tbody> 
        </table>";
        
        }
/*=======================================Média geral do segundo semestre=====================================*/

else if($unidade == "MGSS"){
    $sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno_turma.cod_turma = turma.cod_turma AND
    turma.cod_turma = '$turma' AND aluno.mat_aluno = '$matriculaal' AND aluno.mat_aluno = aluno_turma.mat_aluno ";
    
    $result = $conn->query($sql);
    echo"
             <table class='display bordas' style='width:100%'  id='mostrar_boletimaluno'>
             <thead>
             <tr>
                <th class='text-center'>Matrícula</th>
                <th class='text-center'>Nome</th>
                <th class='text-center'>Português</th>
                <th class='text-center'>Geografia</th>
                <th class='text-center'>História</th>
                <th class='text-center'>Ciências</th>
                <th class='text-center'>Matemática</th>
                <th class='text-center'>Ed. Física</th>
                <th class='text-center'>Artes</th>            
                <th class='text-center'>Redação</th>
                <th class='text-center'>Soc. e Cultura</th>
                <th class='text-center'>Faltas</th>
             </tr>
             </thead>
             
       <tbody>";
    
    
    while($row = $result->fetch_assoc()){
        $portugues = 0;
            $geografia = 0;
            $historia = 0;
            $ciencias = 0;
            $matematica = 0;
            $ed_fisica = 0;
            $artes = 0;
            $redacao = 0;
            $soc_cultura = 0;
            $faltas = 0;
        
        $nome_aluno = $row['nome_aluno'];
        $mat_aluno = $row['mat_aluno'];
    
    if($row['avaliacao'] == "U3"){
    
        if($row['portugues'] != "-1"){
        $portugues1 = $row['portugues'];
        }else{
            $portugues1 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia1 = $row['geografia'];
            }else{
                $geografia1 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia1 = $row['historia'];
            }else{
                $historia1 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias1 = $row['ciencias'];
            }else{
                $ciencias1 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica1 = $row['matematica'];
            }else{
                $matematica1 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica1 = $row['ed_fisica'];
            }else{
                $ed_fisica1 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes1 = $row['artes'];
            }else{
                $artes1 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao1 = $row['redacao'];
            }else{
                $redacao1 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura1 = $row['soc_cultura'];
            }else{
                $soc_cultura1 = 0;
            }
    
            $faltas1 = $row['faltas'];
        }
        
        if($row['avaliacao'] == "U4"){
    
            if($row['portugues'] != "-1"){
            $portugues2 = $row['portugues'];
            }else{
                $portugues2 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia2 = $row['geografia'];
                }else{
                    $geografia2 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia2 = $row['historia'];
                }else{
                    $historia2 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias2 = $row['ciencias'];
                }else{
                    $ciencias2 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica2 = $row['matematica'];
                }else{
                    $matematica2 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica2 = $row['ed_fisica'];
                }else{
                    $ed_fisica2 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes2 = $row['artes'];
                }else{
                    $artes2 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao2 = $row['redacao'];
                }else{
                    $redacao2 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura2 = $row['soc_cultura'];
                }else{
                    $soc_cultura2 = 0;
                }
        
                $faltas2 = $row['faltas'];
    
            $portugues3 = ($portugues1+$portugues2)/2;
            $geografia3 = ($geografia1+$geografia2)/2;
            $historia3 = ($historia1+$historia2)/2;
            $ciencias3 = ($ciencias1+$ciencias2)/2;
            $matematica3 = ($matematica1+$matematica2)/2;
            $ed_fisica3 = ($ed_fisica1+$ed_fisica2)/2;
            $artes3 = ($artes1+$artes2)/2;
            $redacao3 = ($redacao1+$redacao2)/2;
            $soc_cultura3 = ($soc_cultura1+$soc_cultura2)/2;
            $faltas3 = $faltas1+$faltas2;
            
    }

    if($row['avaliacao'] == "R2"){
    
        if($row['portugues'] != "-1"){
        $portugues1 = $row['portugues'];
        }else{
            $portugues1 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia1 = $row['geografia'];
            }else{
                $geografia1 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia1 = $row['historia'];
            }else{
                $historia1 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias1 = $row['ciencias'];
            }else{
                $ciencias1 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica1 = $row['matematica'];
            }else{
                $matematica1 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica1 = $row['ed_fisica'];
            }else{
                $ed_fisica1 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes1 = $row['artes'];
            }else{
                $artes1 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao1 = $row['redacao'];
            }else{
                $redacao1 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura1 = $row['soc_cultura'];
            }else{
                $soc_cultura1 = 0;
            }
    
            $faltas1 = $row['faltas'];
            if($portugues3 <= ($portugues1+$portugues3)/2){
            $portugues = ($portugues1+$portugues3)/2;
            $portugues = number_format($portugues, 1, '.', '');
            $portugues = str_replace(".",",",$portugues);
        }else{
            $portugues = $portugues3;
            $portugues = number_format($portugues, 1, '.', '');
            $portugues = str_replace(".",",",$portugues);
        }

        if($geografia3 <= ($geografia1+$geografia3)/2){
            $geografia = ($geografia1+$geografia3)/2;
            $geografia = number_format($geografia, 1, '.', '');
            $geografia = str_replace(".",",",$geografia);
        }else{
            $geografia = $geografia3;
            $geografia = number_format($geografia, 1, '.', '');
            $geografia = str_replace(".",",",$geografia);
        }

        if($historia3 <= ($historia1+$historia3)/2){
            $historia = ($historia1+$historia3)/2;
            $historia = number_format($historia, 1, '.', '');
            $historia = str_replace(".",",",$historia);
        }else{
            $historia = $historia3;
            $historia = number_format($historia, 1, '.', '');
            $historia = str_replace(".",",",$historia);
        }

        if($ciencias3 <= ($ciencias1+$ciencias3)/2){
            $ciencias = ($ciencias1+$ciencias3)/2;
            $ciencias = number_format($ciencias, 1, '.', '');
            $ciencias = str_replace(".",",",$ciencias);
        }else{
            $ciencias = $ciencias3;
            $ciencias = number_format($ciencias, 1, '.', '');
            $ciencias = str_replace(".",",",$ciencias);
        }
        
        if($matematica3 <= ($matematica1+$matematica3)/2){
            $matematica = ($matematica1+$matematica3)/2;
            $matematica = number_format($matematica, 1, '.', '');
            $matematica = str_replace(".",",",$matematica);
        }else{
            $matematica = $matematica3;
            $matematica = number_format($matematica, 1, '.', '');
            $matematica = str_replace(".",",",$matematica);
        }
        
        if($ed_fisica3 <= ($ed_fisica1+$ed_fisica3)/2){
            $ed_fisica = ($ed_fisica1+$ed_fisica3)/2;
            $ed_fisica = number_format($ed_fisica, 1, '.', '');
            $ed_fisica = str_replace(".",",",$ed_fisica);
        }else{
            $ed_fisica = $ed_fisica3;
            $ed_fisica = number_format($ed_fisica, 1, '.', '');
            $ed_fisica = str_replace(".",",",$ed_fisica);
        }
        
        if($artes3 <= ($artes1+$artes3)/2){
            $artes = ($artes1+$artes3)/2;
            $artes = number_format($artes, 1, '.', '');
            $artes = str_replace(".",",",$artes);
        }else{
            $artes = $artes3;
            $artes = number_format($artes, 1, '.', '');
            $artes = str_replace(".",",",$artes);
        }
        
        if($redacao3 <= ($redacao1+$redacao3)/2){
            $redacao = ($redacao1+$redacao3)/2;
            $redacao = number_format($redacao, 1, '.', '');
            $redacao = str_replace(".",",",$redacao);
        }else{
            $redacao = $redacao3;
            $redacao = number_format($redacao, 1, '.', '');
            $redacao = str_replace(".",",",$redacao);
        }
        
        if($soc_cultura3 <= ($soc_cultura1+$soc_cultura3)/2){
            $soc_cultura = ($soc_cultura1+$soc_cultura3)/2;
            $soc_cultura = number_format($soc_cultura, 1, '.', '');
            $soc_cultura = str_replace(".",",",$soc_cultura);
        }else{
            $soc_cultura = $soc_cultura3;
            $soc_cultura = number_format($soc_cultura, 1, '.', '');
            $soc_cultura = str_replace(".",",",$soc_cultura);
        }
            $faltas = $faltas1+$faltas3;

            echo"
                <tr>
                   <td class='text-center'> $mat_aluno </td>
                   <td class='text-center'> $nome_aluno </td>
                   <td class='text-center'> $portugues </td>
                   <td class='text-center'> $geografia </td>
                   <td class='text-center'> $historia </td>
                   <td class='text-center'> $ciencias </td>
                   <td class='text-center'> $matematica </td>
                   <td class='text-center'> $ed_fisica </td>
                   <td class='text-center'> $artes </td>
                   <td class='text-center'> $redacao </td>
                   <td class='text-center'> $soc_cultura </td>
                   <td class='text-center'> $faltas </td>
                   
                </tr>";
        }
       
            }
        
    echo"</tbody> 
    </table>";
    
    }


/*=======================================Média anual=====================================*/

else if($unidade == "MA"){
    $sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno_turma.cod_turma = turma.cod_turma AND
    turma.cod_turma = '$turma' AND aluno.mat_aluno = '$matriculaal' AND aluno.mat_aluno = aluno_turma.mat_aluno ";
    
    $result = $conn->query($sql);
    echo"
             <table class='display bordas' style='width:100%'  id='mostrar_boletimaluno'>
             <thead>
             <tr>
                <th class='text-center'>Matrícula</th>
                <th class='text-center'>Nome</th>
                <th class='text-center'>Português</th>
                <th class='text-center'>Geografia</th>
                <th class='text-center'>História</th>
                <th class='text-center'>Ciências</th>
                <th class='text-center'>Matemática</th>
                <th class='text-center'>Ed. Física</th>
                <th class='text-center'>Artes</th>            
                <th class='text-center'>Redação</th>
                <th class='text-center'>Soc. e Cultura</th>
                <th class='text-center'>Faltas</th>
             </tr>
             </thead>
             
       <tbody>";
    
    
    while($row = $result->fetch_assoc()){
        $portugues = 0;
            $geografia = 0;
            $historia = 0;
            $ciencias = 0;
            $matematica = 0;
            $ed_fisica = 0;
            $artes = 0;
            $redacao = 0;
            $soc_cultura = 0;
            $faltas = 0;
        
        $nome_aluno = $row['nome_aluno'];
        $mat_aluno = $row['mat_aluno'];
    
    if($row['avaliacao'] == "U1"){
    
        if($row['portugues'] != "-1"){
        $portugues1 = $row['portugues'];
        }else{
            $portugues1 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia1 = $row['geografia'];
            }else{
                $geografia1 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia1 = $row['historia'];
            }else{
                $historia1 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias1 = $row['ciencias'];
            }else{
                $ciencias1 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica1 = $row['matematica'];
            }else{
                $matematica1 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica1 = $row['ed_fisica'];
            }else{
                $ed_fisica1 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes1 = $row['artes'];
            }else{
                $artes1 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao1 = $row['redacao'];
            }else{
                $redacao1 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura1 = $row['soc_cultura'];
            }else{
                $soc_cultura1 = 0;
            }
    
            $faltas1 = $row['faltas'];
        }
        
        if($row['avaliacao'] == "U2"){
    
            if($row['portugues'] != "-1"){
            $portugues2 = $row['portugues'];
            }else{
                $portugues2 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia2 = $row['geografia'];
                }else{
                    $geografia2 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia2 = $row['historia'];
                }else{
                    $historia2 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias2 = $row['ciencias'];
                }else{
                    $ciencias2 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica2 = $row['matematica'];
                }else{
                    $matematica2 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica2 = $row['ed_fisica'];
                }else{
                    $ed_fisica2 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes2 = $row['artes'];
                }else{
                    $artes2 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao2 = $row['redacao'];
                }else{
                    $redacao2 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura2 = $row['soc_cultura'];
                }else{
                    $soc_cultura2 = 0;
                }
        
                $faltas2 = $row['faltas'];
    
            $portugues3 = ($portugues1+$portugues2)/2;
            $geografia3 = ($geografia1+$geografia2)/2;
            $historia3 = ($historia1+$historia2)/2;
            $ciencias3 = ($ciencias1+$ciencias2)/2;
            $matematica3 = ($matematica1+$matematica2)/2;
            $ed_fisica3 = ($ed_fisica1+$ed_fisica2)/2;
            $artes3 = ($artes1+$artes2)/2;
            $redacao3 = ($redacao1+$redacao2)/2;
            $soc_cultura3 = ($soc_cultura1+$soc_cultura2)/2;
            $faltas3 = $faltas1+$faltas2;
            
    }

    if($row['avaliacao'] == "R1"){
    
        if($row['portugues'] != "-1"){
        $portugues1 = $row['portugues'];
        }else{
            $portugues1 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia1 = $row['geografia'];
            }else{
                $geografia1 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia1 = $row['historia'];
            }else{
                $historia1 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias1 = $row['ciencias'];
            }else{
                $ciencias1 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica1 = $row['matematica'];
            }else{
                $matematica1 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica1 = $row['ed_fisica'];
            }else{
                $ed_fisica1 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes1 = $row['artes'];
            }else{
                $artes1 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao1 = $row['redacao'];
            }else{
                $redacao1 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura1 = $row['soc_cultura'];
            }else{
                $soc_cultura1 = 0;
            }
    
            $faltas1 = $row['faltas'];
            if($portugues3 <= ($portugues1+$portugues3)/2){
            $portugues4 = ($portugues1+$portugues3)/2;
        }else{
            $portugues4 = $portugues3;
        }

        if($geografia3 <= ($geografia1+$geografia3)/2){
            $geografia4 = ($geografia1+$geografia3)/2;
        }else{
            $geografia4 = $geografia3;
        }

        if($historia3 <= ($historia1+$historia3)/2){
            $historia4 = ($historia1+$historia3)/2;
        }else{
            $historia4 = $historia3;
        }

        if($ciencias3 <= ($ciencias1+$ciencias3)/2){
            $ciencias4 = ($ciencias1+$ciencias3)/2;
        }else{
            $ciencias4 = $ciencias3;
        }
        
        if($matematica3 <= ($matematica1+$matematica3)/2){
            $matematica4 = ($matematica1+$matematica3)/2;
        }else{
            $matematica4 = $matematica3;
        }
        
        if($ed_fisica3 <= ($ed_fisica1+$ed_fisica3)/2){
            $ed_fisica4 = ($ed_fisica1+$ed_fisica3)/2;
        }else{
            $ed_fisica4 = $ed_fisica3;
        }
        
        if($artes3 <= ($artes1+$artes3)/2){
            $artes4 = ($artes1+$artes3)/2;
        }else{
            $artes4 = $artes3;
        }
        
        if($redacao3 <= ($redacao1+$redacao3)/2){
            $redacao4 = ($redacao1+$redacao3)/2;
        }else{
            $redacao4 = $redacao3;
        }
        
        if($soc_cultura3 <= ($soc_cultura1+$soc_cultura3)/2){
            $soc_cultura4 = ($soc_cultura1+$soc_cultura3)/2;
        }else{
            $soc_cultura4 = $soc_cultura3;
        }
            $faltas4 = $faltas1+$faltas3;

            
        }
        if($row['avaliacao'] == "U3"){
    
            if($row['portugues'] != "-1"){
            $portugues1 = $row['portugues'];
            }else{
                $portugues1 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia1 = $row['geografia'];
                }else{
                    $geografia1 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia1 = $row['historia'];
                }else{
                    $historia1 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias1 = $row['ciencias'];
                }else{
                    $ciencias1 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica1 = $row['matematica'];
                }else{
                    $matematica1 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica1 = $row['ed_fisica'];
                }else{
                    $ed_fisica1 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes1 = $row['artes'];
                }else{
                    $artes1 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao1 = $row['redacao'];
                }else{
                    $redacao1 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura1 = $row['soc_cultura'];
                }else{
                    $soc_cultura1 = 0;
                }
        
                $faltas1 = $row['faltas'];
            }
            
            if($row['avaliacao'] == "U4"){
        
                if($row['portugues'] != "-1"){
                $portugues2 = $row['portugues'];
                }else{
                    $portugues2 = 0;
                }
            
                if($row['geografia'] != "-1"){
                    $geografia2 = $row['geografia'];
                    }else{
                        $geografia2 = 0;
                    }
            
                if($row['historia'] != "-1"){
                    $historia2 = $row['historia'];
                    }else{
                        $historia2 = 0;
                    }
            
                if($row['ciencias'] != "-1"){
                    $ciencias2 = $row['ciencias'];
                    }else{
                        $ciencias2 = 0;
                    }
            
                if($row['matematica'] != "-1"){
                    $matematica2 = $row['matematica'];
                    }else{
                        $matematica2 = 0;
                    }
            
                if($row['ed_fisica'] != "-1"){
                    $ed_fisica2 = $row['ed_fisica'];
                    }else{
                        $ed_fisica2 = 0;
                    }
            
                if($row['artes'] != "-1"){
                    $artes2 = $row['artes'];
                    }else{
                        $artes2 = 0;
                    }
            
                if($row['redacao'] != "-1"){
                    $redacao2 = $row['redacao'];
                    }else{
                        $redacao2 = 0;
                    }
            
                if($row['soc_cultura'] != "-1"){
                    $soc_cultura2 = $row['soc_cultura'];
                    }else{
                        $soc_cultura2 = 0;
                    }
            
                    $faltas2 = $row['faltas'];
        
                $portugues3 = ($portugues1+$portugues2)/2;
                $geografia3 = ($geografia1+$geografia2)/2;
                $historia3 = ($historia1+$historia2)/2;
                $ciencias3 = ($ciencias1+$ciencias2)/2;
                $matematica3 = ($matematica1+$matematica2)/2;
                $ed_fisica3 = ($ed_fisica1+$ed_fisica2)/2;
                $artes3 = ($artes1+$artes2)/2;
                $redacao3 = ($redacao1+$redacao2)/2;
                $soc_cultura3 = ($soc_cultura1+$soc_cultura2)/2;
                $faltas3 = $faltas1+$faltas2;
                
        }
    
        if($row['avaliacao'] == "R2"){
        
            if($row['portugues'] != "-1"){
            $portugues1 = $row['portugues'];
            }else{
                $portugues1 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia1 = $row['geografia'];
                }else{
                    $geografia1 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia1 = $row['historia'];
                }else{
                    $historia1 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias1 = $row['ciencias'];
                }else{
                    $ciencias1 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica1 = $row['matematica'];
                }else{
                    $matematica1 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica1 = $row['ed_fisica'];
                }else{
                    $ed_fisica1 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes1 = $row['artes'];
                }else{
                    $artes1 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao1 = $row['redacao'];
                }else{
                    $redacao1 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura1 = $row['soc_cultura'];
                }else{
                    $soc_cultura1 = 0;
                }
        
                $faltas1 = $row['faltas'];
                if($portugues3 <= ($portugues1+$portugues3)/2){
                $portugues5 = ($portugues1+$portugues3)/2;
            }else{
                $portugues5 = $portugues3;
            }
    
            if($geografia3 <= ($geografia1+$geografia3)/2){
                $geografia5 = ($geografia1+$geografia3)/2;
            }else{
                $geografia5 = $geografia3;
            }
    
            if($historia3 <= ($historia1+$historia3)/2){
                $historia5 = ($historia1+$historia3)/2;
            }else{
                $historia5 = $historia3;
            }
    
            if($ciencias3 <= ($ciencias1+$ciencias3)/2){
                $ciencias5 = ($ciencias1+$ciencias3)/2;
            }else{
                $ciencias5 = $ciencias3;
            }
            
            if($matematica3 <= ($matematica1+$matematica3)/2){
                $matematica5 = ($matematica1+$matematica3)/2;
            }else{
                $matematica5 = $matematica3;
            }
            
            if($ed_fisica3 <= ($ed_fisica1+$ed_fisica3)/2){
                $ed_fisica5 = ($ed_fisica1+$ed_fisica3)/2;
            }else{
                $ed_fisica5 = $ed_fisica3;
            }
            
            if($artes3 <= ($artes1+$artes3)/2){
                $artes5 = ($artes1+$artes3)/2;
            }else{
                $artes5 = $artes3;
            }
            
            if($redacao3 <= ($redacao1+$redacao3)/2){
                $redacao5 = ($redacao1+$redacao3)/2;
            }else{
                $redacao5 = $redacao3;
            }
            
            if($soc_cultura3 <= ($soc_cultura1+$soc_cultura3)/2){
                $soc_cultura5 = ($soc_cultura1+$soc_cultura3)/2;
            }else{
                $soc_cultura5 = $soc_cultura3;
            }
                $faltas5 = $faltas1+$faltas3;
        

                $portugues = ($portugues4+$portugues5)/2;
                $portugues = number_format($portugues, 1, '.', '');
                $portugues = str_replace(".",",",$portugues);

                $geografia = ($geografia4+$geografia5)/2;
                $geografia = number_format($geografia, 1, '.', '');
                $geografia = str_replace(".",",",$geografia);

                $historia = ($historia4+$historia5)/2;
                $historia = number_format($historia, 1, '.', '');
                $historia = str_replace(".",",",$historia);
                
                $ciencias = ($ciencias4+$ciencias5)/2;
                $ciencias = number_format($ciencias, 1, '.', '');
                $ciencias = str_replace(".",",",$ciencias);

                $matematica = ($matematica4+$matematica5)/2;
                $matematica = number_format($matematica, 1, '.', '');
                $matematica = str_replace(".",",",$matematica);

                $ed_fisica = ($ed_fisica4+$ed_fisica5)/2;
                $ed_fisica = number_format($ed_fisica, 1, '.', '');
                $ed_fisica = str_replace(".",",",$ed_fisica);

                $artes = ($artes4+$artes5)/2;
                $artes = number_format($artes, 1, '.', '');
                $artes = str_replace(".",",",$artes);

                $redacao = ($redacao4+$redacao5)/2;
                $redacao = number_format($redacao, 1, '.', '');
                $redacao = str_replace(".",",",$redacao);

                $soc_cultura = ($soc_cultura4+$soc_cultura5)/2;
                $soc_cultura = number_format($soc_cultura, 1, '.', '');
                $soc_cultura = str_replace(".",",",$soc_cultura);

                $faltas = $faltas4+$faltas5;

       echo"
                <tr>
                   <td class='text-center'> $mat_aluno </td>
                   <td class='text-center'> $nome_aluno </td>
                   <td class='text-center'> $portugues </td>
                   <td class='text-center'> $geografia </td>
                   <td class='text-center'> $historia </td>
                   <td class='text-center'> $ciencias </td>
                   <td class='text-center'> $matematica </td>
                   <td class='text-center'> $ed_fisica </td>
                   <td class='text-center'> $artes </td>
                   <td class='text-center'> $redacao </td>
                   <td class='text-center'> $soc_cultura </td>
                   <td class='text-center'> $faltas </td>
                   
                </tr>";
            }
        }
    echo"</tbody> 
    </table>";
    
    }


/*=======================================Média final=====================================*/

else if($unidade == "MF"){
    $sql = "SELECT * FROM aluno,turma,aluno_turma Where aluno_turma.cod_turma = turma.cod_turma AND
    turma.cod_turma = '$turma' AND aluno.mat_aluno = '$matriculaal' AND aluno.mat_aluno = aluno_turma.mat_aluno ";
    
    $result = $conn->query($sql);
    echo"
             <table class='display bordas' style='width:100%'  id='mostrar_boletimaluno'>
             <thead>
             <tr>
                <th class='text-center'>Matrícula</th>
                <th class='text-center'>Nome</th>
                <th class='text-center'>Português</th>
                <th class='text-center'>Geografia</th>
                <th class='text-center'>História</th>
                <th class='text-center'>Ciências</th>
                <th class='text-center'>Matemática</th>
                <th class='text-center'>Ed. Física</th>
                <th class='text-center'>Artes</th>            
                <th class='text-center'>Redação</th>
                <th class='text-center'>Soc. e Cultura</th>
                <th class='text-center'>Faltas</th>
             </tr>
             </thead>
             
       <tbody>";
    
    
    while($row = $result->fetch_assoc()){
        $portugues = 0;
            $geografia = 0;
            $historia = 0;
            $ciencias = 0;
            $matematica = 0;
            $ed_fisica = 0;
            $artes = 0;
            $redacao = 0;
            $soc_cultura = 0;
            $faltas = 0;
        
        $nome_aluno = $row['nome_aluno'];
        $mat_aluno = $row['mat_aluno'];
    
    if($row['avaliacao'] == "U1"){
    
        if($row['portugues'] != "-1"){
        $portugues1 = $row['portugues'];
        }else{
            $portugues1 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia1 = $row['geografia'];
            }else{
                $geografia1 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia1 = $row['historia'];
            }else{
                $historia1 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias1 = $row['ciencias'];
            }else{
                $ciencias1 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica1 = $row['matematica'];
            }else{
                $matematica1 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica1 = $row['ed_fisica'];
            }else{
                $ed_fisica1 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes1 = $row['artes'];
            }else{
                $artes1 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao1 = $row['redacao'];
            }else{
                $redacao1 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura1 = $row['soc_cultura'];
            }else{
                $soc_cultura1 = 0;
            }
    
            $faltas1 = $row['faltas'];
        }
        
        if($row['avaliacao'] == "U2"){
    
            if($row['portugues'] != "-1"){
            $portugues2 = $row['portugues'];
            }else{
                $portugues2 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia2 = $row['geografia'];
                }else{
                    $geografia2 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia2 = $row['historia'];
                }else{
                    $historia2 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias2 = $row['ciencias'];
                }else{
                    $ciencias2 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica2 = $row['matematica'];
                }else{
                    $matematica2 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica2 = $row['ed_fisica'];
                }else{
                    $ed_fisica2 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes2 = $row['artes'];
                }else{
                    $artes2 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao2 = $row['redacao'];
                }else{
                    $redacao2 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura2 = $row['soc_cultura'];
                }else{
                    $soc_cultura2 = 0;
                }
        
                $faltas2 = $row['faltas'];
    
            $portugues3 = ($portugues1+$portugues2)/2;
            $geografia3 = ($geografia1+$geografia2)/2;
            $historia3 = ($historia1+$historia2)/2;
            $ciencias3 = ($ciencias1+$ciencias2)/2;
            $matematica3 = ($matematica1+$matematica2)/2;
            $ed_fisica3 = ($ed_fisica1+$ed_fisica2)/2;
            $artes3 = ($artes1+$artes2)/2;
            $redacao3 = ($redacao1+$redacao2)/2;
            $soc_cultura3 = ($soc_cultura1+$soc_cultura2)/2;
            $faltas3 = $faltas1+$faltas2;
            
    }

    if($row['avaliacao'] == "R1"){
    
        if($row['portugues'] != "-1"){
        $portugues1 = $row['portugues'];
        }else{
            $portugues1 = 0;
        }
    
        if($row['geografia'] != "-1"){
            $geografia1 = $row['geografia'];
            }else{
                $geografia1 = 0;
            }
    
        if($row['historia'] != "-1"){
            $historia1 = $row['historia'];
            }else{
                $historia1 = 0;
            }
    
        if($row['ciencias'] != "-1"){
            $ciencias1 = $row['ciencias'];
            }else{
                $ciencias1 = 0;
            }
    
        if($row['matematica'] != "-1"){
            $matematica1 = $row['matematica'];
            }else{
                $matematica1 = 0;
            }
    
        if($row['ed_fisica'] != "-1"){
            $ed_fisica1 = $row['ed_fisica'];
            }else{
                $ed_fisica1 = 0;
            }
    
        if($row['artes'] != "-1"){
            $artes1 = $row['artes'];
            }else{
                $artes1 = 0;
            }
    
        if($row['redacao'] != "-1"){
            $redacao1 = $row['redacao'];
            }else{
                $redacao1 = 0;
            }
    
        if($row['soc_cultura'] != "-1"){
            $soc_cultura1 = $row['soc_cultura'];
            }else{
                $soc_cultura1 = 0;
            }
    
            $faltas1 = $row['faltas'];
            if($portugues3 <= ($portugues1+$portugues3)/2){
            $portugues4 = ($portugues1+$portugues3)/2;
        }else{
            $portugues4 = $portugues3;
        }

        if($geografia3 <= ($geografia1+$geografia3)/2){
            $geografia4 = ($geografia1+$geografia3)/2;
        }else{
            $geografia4 = $geografia3;
        }

        if($historia3 <= ($historia1+$historia3)/2){
            $historia4 = ($historia1+$historia3)/2;
        }else{
            $historia4 = $historia3;
        }

        if($ciencias3 <= ($ciencias1+$ciencias3)/2){
            $ciencias4 = ($ciencias1+$ciencias3)/2;
        }else{
            $ciencias4 = $ciencias3;
        }
        
        if($matematica3 <= ($matematica1+$matematica3)/2){
            $matematica4 = ($matematica1+$matematica3)/2;
        }else{
            $matematica4 = $matematica3;
        }
        
        if($ed_fisica3 <= ($ed_fisica1+$ed_fisica3)/2){
            $ed_fisica4 = ($ed_fisica1+$ed_fisica3)/2;
        }else{
            $ed_fisica4 = $ed_fisica3;
        }
        
        if($artes3 <= ($artes1+$artes3)/2){
            $artes4 = ($artes1+$artes3)/2;
        }else{
            $artes4 = $artes3;
        }
        
        if($redacao3 <= ($redacao1+$redacao3)/2){
            $redacao4 = ($redacao1+$redacao3)/2;
        }else{
            $redacao4 = $redacao3;
        }
        
        if($soc_cultura3 <= ($soc_cultura1+$soc_cultura3)/2){
            $soc_cultura4 = ($soc_cultura1+$soc_cultura3)/2;
        }else{
            $soc_cultura4 = $soc_cultura3;
        }
            $faltas4 = $faltas1+$faltas3;

            
        }
        if($row['avaliacao'] == "U3"){
    
            if($row['portugues'] != "-1"){
            $portugues1 = $row['portugues'];
            }else{
                $portugues1 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia1 = $row['geografia'];
                }else{
                    $geografia1 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia1 = $row['historia'];
                }else{
                    $historia1 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias1 = $row['ciencias'];
                }else{
                    $ciencias1 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica1 = $row['matematica'];
                }else{
                    $matematica1 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica1 = $row['ed_fisica'];
                }else{
                    $ed_fisica1 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes1 = $row['artes'];
                }else{
                    $artes1 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao1 = $row['redacao'];
                }else{
                    $redacao1 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura1 = $row['soc_cultura'];
                }else{
                    $soc_cultura1 = 0;
                }
        
                $faltas1 = $row['faltas'];
            }
            
            if($row['avaliacao'] == "U4"){
        
                if($row['portugues'] != "-1"){
                $portugues2 = $row['portugues'];
                }else{
                    $portugues2 = 0;
                }
            
                if($row['geografia'] != "-1"){
                    $geografia2 = $row['geografia'];
                    }else{
                        $geografia2 = 0;
                    }
            
                if($row['historia'] != "-1"){
                    $historia2 = $row['historia'];
                    }else{
                        $historia2 = 0;
                    }
            
                if($row['ciencias'] != "-1"){
                    $ciencias2 = $row['ciencias'];
                    }else{
                        $ciencias2 = 0;
                    }
            
                if($row['matematica'] != "-1"){
                    $matematica2 = $row['matematica'];
                    }else{
                        $matematica2 = 0;
                    }
            
                if($row['ed_fisica'] != "-1"){
                    $ed_fisica2 = $row['ed_fisica'];
                    }else{
                        $ed_fisica2 = 0;
                    }
            
                if($row['artes'] != "-1"){
                    $artes2 = $row['artes'];
                    }else{
                        $artes2 = 0;
                    }
            
                if($row['redacao'] != "-1"){
                    $redacao2 = $row['redacao'];
                    }else{
                        $redacao2 = 0;
                    }
            
                if($row['soc_cultura'] != "-1"){
                    $soc_cultura2 = $row['soc_cultura'];
                    }else{
                        $soc_cultura2 = 0;
                    }
            
                    $faltas2 = $row['faltas'];
        
                $portugues3 = ($portugues1+$portugues2)/2;
                $geografia3 = ($geografia1+$geografia2)/2;
                $historia3 = ($historia1+$historia2)/2;
                $ciencias3 = ($ciencias1+$ciencias2)/2;
                $matematica3 = ($matematica1+$matematica2)/2;
                $ed_fisica3 = ($ed_fisica1+$ed_fisica2)/2;
                $artes3 = ($artes1+$artes2)/2;
                $redacao3 = ($redacao1+$redacao2)/2;
                $soc_cultura3 = ($soc_cultura1+$soc_cultura2)/2;
                $faltas3 = $faltas1+$faltas2;
                
        }
    
        if($row['avaliacao'] == "R2"){
        
            if($row['portugues'] != "-1"){
            $portugues1 = $row['portugues'];
            }else{
                $portugues1 = 0;
            }
        
            if($row['geografia'] != "-1"){
                $geografia1 = $row['geografia'];
                }else{
                    $geografia1 = 0;
                }
        
            if($row['historia'] != "-1"){
                $historia1 = $row['historia'];
                }else{
                    $historia1 = 0;
                }
        
            if($row['ciencias'] != "-1"){
                $ciencias1 = $row['ciencias'];
                }else{
                    $ciencias1 = 0;
                }
        
            if($row['matematica'] != "-1"){
                $matematica1 = $row['matematica'];
                }else{
                    $matematica1 = 0;
                }
        
            if($row['ed_fisica'] != "-1"){
                $ed_fisica1 = $row['ed_fisica'];
                }else{
                    $ed_fisica1 = 0;
                }
        
            if($row['artes'] != "-1"){
                $artes1 = $row['artes'];
                }else{
                    $artes1 = 0;
                }
        
            if($row['redacao'] != "-1"){
                $redacao1 = $row['redacao'];
                }else{
                    $redacao1 = 0;
                }
        
            if($row['soc_cultura'] != "-1"){
                $soc_cultura1 = $row['soc_cultura'];
                }else{
                    $soc_cultura1 = 0;
                }
        
                $faltas1 = $row['faltas'];
                if($portugues3 <= ($portugues1+$portugues3)/2){
                $portugues5 = ($portugues1+$portugues3)/2;
            }else{
                $portugues5 = $portugues3;
            }
    
            if($geografia3 <= ($geografia1+$geografia3)/2){
                $geografia5 = ($geografia1+$geografia3)/2;
            }else{
                $geografia5 = $geografia3;
            }
    
            if($historia3 <= ($historia1+$historia3)/2){
                $historia5 = ($historia1+$historia3)/2;
            }else{
                $historia5 = $historia3;
            }
    
            if($ciencias3 <= ($ciencias1+$ciencias3)/2){
                $ciencias5 = ($ciencias1+$ciencias3)/2;
            }else{
                $ciencias5 = $ciencias3;
            }
            
            if($matematica3 <= ($matematica1+$matematica3)/2){
                $matematica5 = ($matematica1+$matematica3)/2;
            }else{
                $matematica5 = $matematica3;
            }
            
            if($ed_fisica3 <= ($ed_fisica1+$ed_fisica3)/2){
                $ed_fisica5 = ($ed_fisica1+$ed_fisica3)/2;
            }else{
                $ed_fisica5 = $ed_fisica3;
            }
            
            if($artes3 <= ($artes1+$artes3)/2){
                $artes5 = ($artes1+$artes3)/2;
            }else{
                $artes5 = $artes3;
            }
            
            if($redacao3 <= ($redacao1+$redacao3)/2){
                $redacao5 = ($redacao1+$redacao3)/2;
            }else{
                $redacao5 = $redacao3;
            }
            
            if($soc_cultura3 <= ($soc_cultura1+$soc_cultura3)/2){
                $soc_cultura5 = ($soc_cultura1+$soc_cultura3)/2;
            }else{
                $soc_cultura5 = $soc_cultura3;
            }
                $faltas5 = $faltas1+$faltas3;
        

                $portugues6 = ($portugues4+$portugues5)/2;
                $geografia6 = ($geografia4+$geografia5)/2;
                $historia6 = ($historia4+$historia5)/2;
                $ciencias6 = ($ciencias4+$ciencias5)/2;
                $matematica6 = ($matematica4+$matematica5)/2;
                $ed_fisica6 = ($ed_fisica4+$ed_fisica5)/2;
                $artes6 = ($artes4+$artes5)/2;
                $redacao6 = ($redacao4+$redacao5)/2;
                $soc_cultura6 = ($soc_cultura4+$soc_cultura5)/2;
                $faltas6 = $faltas4+$faltas5;

       
            }
            if($row['avaliacao'] == "RF"){
        
                if($row['portugues'] != "-1"){
                $portugues1 = $row['portugues'];
                }else{
                    $portugues1 = 0;
                }
            
                if($row['geografia'] != "-1"){
                    $geografia1 = $row['geografia'];
                    }else{
                        $geografia1 = 0;
                    }
            
                if($row['historia'] != "-1"){
                    $historia1 = $row['historia'];
                    }else{
                        $historia1 = 0;
                    }
            
                if($row['ciencias'] != "-1"){
                    $ciencias1 = $row['ciencias'];
                    }else{
                        $ciencias1 = 0;
                    }
            
                if($row['matematica'] != "-1"){
                    $matematica1 = $row['matematica'];
                    }else{
                        $matematica1 = 0;
                    }
            
                if($row['ed_fisica'] != "-1"){
                    $ed_fisica1 = $row['ed_fisica'];
                    }else{
                        $ed_fisica1 = 0;
                    }
            
                if($row['artes'] != "-1"){
                    $artes1 = $row['artes'];
                    }else{
                        $artes1 = 0;
                    }
            
                if($row['redacao'] != "-1"){
                    $redacao1 = $row['redacao'];
                    }else{
                        $redacao1 = 0;
                    }
            
                if($row['soc_cultura'] != "-1"){
                    $soc_cultura1 = $row['soc_cultura'];
                    }else{
                        $soc_cultura1 = 0;
                    }
            
                    $faltas1 = $row['faltas'];
                    if($portugues6 <= ($portugues1+$portugues6)/2){
                    $portugues = ($portugues1+$portugues6)/2;
                    $portugues = number_format($portugues, 1, '.', '');
                    $portugues = str_replace(".",",",$portugues);
                }else{
                    $portugues = $portugues6;
                    $portugues = number_format($portugues, 1, '.', '');;
                    $portugues = str_replace(".",",",$portugues);
                }
        
                if($geografia6 <= ($geografia1+$geografia6)/2){
                    $geografia = ($geografia1+$geografia6)/2;
                    $geografia = number_format($geografia, 1, '.', '');
                    $geografia = str_replace(".",",",$geografia);
                }else{
                    $geografia = $geografia6;
                    $geografia = number_format($geografia, 1, '.', '');
                    $geografia = str_replace(".",",",$geografia);
                }
        
                if($historia6 <= ($historia1+$historia6)/2){
                    $historia = ($historia1+$historia6)/2;
                    $historia = number_format($historia, 1, '.', '');
                    $historia = str_replace(".",",",$historia);
                }else{
                    $historia = $historia6;
                    $historia = number_format($historia, 1, '.', '');
                    $historia = str_replace(".",",",$historia);
                }
        
                if($ciencias6 <= ($ciencias1+$ciencias6)/2){
                    $ciencias = ($ciencias1+$ciencias6)/2;
                    $ciencias = number_format($ciencias, 1, '.', '');
                    $ciencias = str_replace(".",",",$ciencias);
                }else{
                    $ciencias = $ciencias6;
                    $ciencias = number_format($ciencias, 1, '.', '');
                    $ciencias = str_replace(".",",",$ciencias);
                }
                
                if($matematica6 <= ($matematica1+$matematica6)/2){
                    $matematica = ($matematica1+$matematica6)/2;
                    $matematica = number_format($matematica, 1, '.', '');
                    $matematica = str_replace(".",",",$matematica);
                }else{
                    $matematica = $matematica6;
                    $matematica = number_format($matematica, 1, '.', '');
                    $matematica = str_replace(".",",",$matematica);
                }
                
                if($ed_fisica6 <= ($ed_fisica1+$ed_fisica6)/2){
                    $ed_fisica = ($ed_fisica1+$ed_fisica6)/2;
                    $ed_fisica = number_format($ed_fisica, 1, '.', '');
                    $ed_fisica = str_replace(".",",",$ed_fisica);
                }else{
                    $ed_fisica = $ed_fisica6;
                    $ed_fisica = number_format($ed_fisica, 1, '.', '');
                    $ed_fisica = str_replace(".",",",$ed_fisica);
                }
                
                if($artes6 <= ($artes1+$artes6)/2){
                    $artes = ($artes1+$artes6)/2;
                    $artes = number_format($artes, 1, '.', '');
                    $artes = str_replace(".",",",$artes);
                }else{
                    $artes = $artes6;
                    $artes = number_format($artes, 1, '.', '');
                    $artes = str_replace(".",",",$artes);
                }
                
                if($redacao6 <= ($redacao1+$redacao6)/2){
                    $redacao = ($redacao1+$redacao6)/2;
                    $redacao = number_format($redacao, 1, '.', '');
                    $redacao = str_replace(".",",",$redacao);
                }else{
                    $redacao = $redacao6;
                    $redacao = number_format($redacao, 1, '.', '');
                    $redacao = str_replace(".",",",$redacao);
                }
                
                if($soc_cultura6 <= ($soc_cultura1+$soc_cultura6)/2){
                    $soc_cultura = ($soc_cultura1+$soc_cultura6)/2;
                    $soc_cultura = number_format($soc_cultura, 1, '.', '');
                    $soc_cultura = str_replace(".",",",$soc_cultura);
                }else{
                    $soc_cultura = $soc_cultura6;
                    $soc_cultura = number_format($soc_cultura, 1, '.', '');
                    $soc_cultura = str_replace(".",",",$soc_cultura);
                }
                    $faltas = $faltas1+$faltas6; 



            echo"
                <tr>
                   <td class='text-center'> $mat_aluno </td>
                   <td class='text-center'> $nome_aluno </td>
                   <td class='text-center'> $portugues </td>
                   <td class='text-center'> $geografia </td>
                   <td class='text-center'> $historia </td>
                   <td class='text-center'> $ciencias </td>
                   <td class='text-center'> $matematica </td>
                   <td class='text-center'> $ed_fisica </td>
                   <td class='text-center'> $artes </td>
                   <td class='text-center'> $redacao </td>
                   <td class='text-center'> $soc_cultura </td>
                   <td class='text-center'> $faltas </td>
                   
                </tr>";
        }
    }
    echo"</tbody> 
    </table>";
    
    }


    
if (mysqli_query($conn,$sql)){
    echo "";
      }
      else {
         echo "Erro: ".mysqli_error($conn);
      }
    
?>
