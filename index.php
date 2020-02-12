<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script type="text/javascritp" src="script.js"></script>
    <title>Questionário de Indicadores</title>
    <!-- PRIMEIRO SELECT -->
<?php
include('conexao.php');
$sql = $conn->query("select * from tb_indicadores group by up  ");
?>  

<!-- SCRIPT DO AJAX/JQUERY -->
< <script type="text/javascript">
$(document).ready(function(){
    $('#listaUP').on('change',function(){
        var codID = $(this).val();
        if(codID){
            $.ajax({
                type:'POST',
                url:'dados.php',
                data:'listaUP_id='+codID,
                success:function(html){
                    $('#listaPrg').html(html);
                }
            }); 
        }else{
            $('#listaPrg').html('<option value="">Select country first</option>'); 
        }
    });
    
    $('#listaPrg').on('change',function(){
        var prgID = $(this).val();
        if(prgID){
            $.ajax({
                type:'POST',
                url:'dados.php',
                data:'listaPrg_id='+prgID,
                success:function(html){
                $('#listaAction').html(html);
                }
            }); 
        }else{
            $('#listaAction').html('<option value="">Selecione</option>');
        }
    });
});
</script>
</head>
<body>

    <div class="primary-div">
    <form method="POST" action="dados.php" name="formulario1" class="form1">

            <h1>Questionário COMAV</h1>
		
            <div class="container">
                <label for="">Órgão</label>
          
				<select id="listaUP" name="orgao" class="select1" >
                <option value="">Selecione</option>
                <?php

                while($row = mysqli_fetch_assoc($sql)){
                    echo '<option value="'.$row['codigo_up'].'">'.$row['up'].'</option>';
                }

                ?>
				</select>
				
            </div>

            <div class="container">
                <label for="">Programa</label>
                
                <select id="listaPrg" name="programa" class="select1" >
                    <option value="">Selecione</option>
                </select>

            </div>
			
			 <div class="container">
                <label for="">Ação</label>         
				<select id="listaAction" name="acao" class="select1">

                </select> <br>
		
            </div>

			<!-- REALIZAR UMA CONSULTA NA TABELA DE INDICADORES -->
			
			 <div class="container">
                <label for="">Indicadores</label>         
				 <select id="listaInd" name="indicador" class="select1" >
						
					
  
                    </select> <br>
		
            </div>
			
		
            <div class="container">
                <label for="">Realizado</label>
                <input type="number" name="realizado" class="select"> <br>
            </div>
        

            <div class="container">
                <label for="">Observação</label>
                <input type="text" name="obs" class="select"> <br>

            </div>
			
			   <div class="container">
                <label for="">Data Resposta</label>
                <input type="date" name="dtresposta" class="select"> <br>
            </div>
			
			  <div class="container">
                <label for="">Nome do Respondente</label>
                <input type="text" name="name" class="select"> <br>
            </div>
       
            <center>
				<input type="submit" class="button">
				
            </center>
			
        </form>
    </div>
	
	 <script>   

    </script>
	
</body>

</htm