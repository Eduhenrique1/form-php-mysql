<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css"/>
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
<script type="text/javascript">
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
					$('#listaAction').html('<option value="">Selecione o Programa</option>');
                }
            }); 
        }else{
            $('#listaPrg').html('<option value="">Selecione</option>');
            $('#listaAction').html('<option value="">Selecione</option>');
            $('#listaInd').html('<option value="">Selecione</option>');
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
            $('#listaAction').html('<option value="">Selecione a Ação</option>');
           
        }
    });
    $('#listaAction').on('change',function(){
        var ActID = $(this).val();
        if(ActID){
            $.ajax({
                type:'POST',
                url:'dados.php',
                data:'listaAction_id='+ActID,
                success:function(html){
                $('#listaInd').html(html);
                }
            }); 
        }else{
            $('#listaAction').html('<option value="">Selecione o Indicador</option>');
           
        }
    });
	
	$('#listaInd').on('change',function(){
        var IndID = $(this).val();
        if(IndID){
            $.ajax({
                type:'POST',
                url:'dados.php',
				dataType: "html",   //expect html to be returned  
                data:'listaInd_id='+IndID,
                success:function(html){
				$("#tableInd").html(html);
                },
				error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
            });         
        }
    });
	
});
		
		// Preencher tabela no PHP utilizando AJAX.
		// var ajax = new XMLHttpRequest();
		// ajax.open("GET", "getdados.php", true);
		// ajax.send();
		
		// ajax.onreadystatechange=function(){
			// if(this.readyState == 4 && this.status==200){
				// console.log(this.responseText);
				// var data = JSON.parse(this.responseText);
				// console.log(data);
				// var html = "";
				// for(var a = 0; a < data.length; a++){
					
					// var nm_indicador =  data[a].nm_indicador;
					// var dsc_indicador = data[a].dsc_indicador;
					// var formula_calculo = data[a].formula_calculo; 
					// var unidade_medida= data[a].unidade_medida; 
					// var periodicidade= data[a].periodicidade;
					// var linha_base= data[a].linha_base;
					// var meta_2020 = data[a].meta_2020;
					
					// html += "<tr>";
						// html += "<td>" + nm_indicador + "</td>";
						// html += "<td>" + dsc_indicador + "</td>";
						// html += "<td>" + formula_calculo + "</td>";
						// html += "<td>" + unidade_medida + "</td>";
						// html += "<td>" + periodicidade + "</td>";
						// html += "<td>" + linha_base + "</td>";
						// html += "<td>" + meta_2020 + "</td>";
					// html +="</tr>";					
				// }
				
				// document.getElementById("data").innerHTML += html;
				
			// }
		// };
		
</script>
</head>
<body>

    <div class="primary-div">
    <form method="POST" action="dados.php" name="formulario1" class="form1">

            <h1>Questionário COMAV</h1>

            <div class="container">
                <label for="">Órgão</label>
                    <select id="listaUP" name="orgao" class="select1" >
                        <option value="">Selecione a Unidade de Planejamento</option>
                        <?php

                        while($row = mysqli_fetch_assoc($sql)){
                            echo '<option value="'.$row['cod_up'].'">'.$row['up'].'</option>';
                        }

                        ?>
                    </select>
				
            </div>

            <div class="container">
                <label for="">Programa</label>
                    <select id="listaPrg" name="programa" class="select1" >
                        <option value="">Selecione o Programa</option>
                    </select>

            </div>
			
			 <div class="container">
                <label for="">Ação</label>         
                    <select id="listaAction" name="acao" class="select1">
                        <option value="">Selecione a Ação</option>
                    </select>
            </div>

			<div class="container">
                <label for="">Indicadores</label>         
                    <select id="listaInd" name="indicador" class="select1" >
                        <option value="">Selecione o Indicador</option>
                    </select>
            </div>
			
			<div class="container" style="overflow-x:auto;">
                <label for="">Atributos do Indicador</label>
				<table id="tableInd" class="my-table"> 
				<tr>
					<thead>
						<th>Nome do Indicador</th>
						<th>Descrição do Indicador</th>
						<th>Fórmula</th>
						<th>Unidade de Medida</th>
						<th>Periodicidade</th>
						<th>Linha de Base</th>
						<th>Meta do Ano</th>						
					</thead>
				</tr>
					<tbody id="data"></tbody>
				</table>
                    
            </div>				

            <div class="container">
                <label for="">Realizado</label>
                <input type="number" name="realizado" class="input">
            </div>

            <div class="container">
                <label for="">Data Resposta</label>
                <input type="date" name="dtresposta" class="input">

            </div>

			<div class="container">
                <label for="">Observação</label>
                <input type="text" name="obs" class="input">
            </div>
			
			 <div class="container">
                <label for="">Nome do Respondente</label>
                     <input type="text" name="name" class="input">
            </div>
			
       
            <center>
				<input type="submit" class="button">
				
            </center>
			
        </form>
    </div>
	
</body>

</html>