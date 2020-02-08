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
    <script src="jquery.min.js"></script>
    <script type="text/javascritp" src="script.js"></script>
    <title>Formulário</title>
    <!-- PRIMEIRO SELECT -->
<?php
include('conexao.php');
$sql = $conn->query("select * from categoria order by nome ");
?>  

<!-- SCRIPT DO AJAX/JQUERY -->
<script type="text/javascript">
$(document).ready(function(){
    $('#cat').on('change',function(){
        var catID = $(this).val();
        if(catID){
            $.ajax({
                type:'POST',
                url:'dados.php',
                data:'cat_id='+catID,
                success:function(html){
                    $('#sub').html(html);
                }
            }); 
        }else{
            $('#sub').html('<option value="">Selecione</option>'); 
        }
    });

});
</script>

</head>

<body>
    <div class="primary-div">
        <form method="POST" action="dados.php" name="formulario1" class="form1">

            <h1>FORMULÁRIO</h1>
            <div class="container">
                <label for="">Nome</label>
                <input type="text" name="name" class="select"><br>
            </div>

            <div class="container">
                <label for="">SELECT 1(Departamento)</label>
                <select id="cat" name="cat" class="select1">
                    <option value="">Selecione</option>
                <?php
    
                    while($row = mysqli_fetch_assoc($sql)){
                        echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                    }
                ?> 
                </select> <br>    	 
            </div>
            <div class="container">
                <label for="">SELECT 2</label>
                <select class="select1" name="sub" id="sub">
                    <option value="-">Selecione</option>
                </select> 
            </div> 

            <div class="container">
                <label for="">data resposta</label>
                <input type="date" name="dtres" class="select"> <br>
            </div>

            <div class="container">
                <label for=""> quantidade Realizada</label>
                <input type="number" name="qtreali" class="select"> <br>
            </div>

            <div class="container">
                <label for="">quantidade Real </label>
                <input type="number" name="qtreal" class="select"> <br>
            </div>

            <div class="container">
                <label for="">valor Provisionado</label>
                <input type="number" name="valorP" class="select"> <br>
            </div>

            <div class="container">
                <label for="">valor Utilizado</label>
                <input type="number" name="valorU" class="select"> <br>
            </div>

            <div class="container">
                <label for="">Resultado Final</label>
                <input type="text" name="rfinal" class="select"> <br>

            </div>
            <div class="container">
                <label for="">Observacao</label>
                <input type="text" textarea="30" name="obs" class="select">
            </div>
            <center>
                <input type="submit" class="button">
            </center>
        </form>
    </div>
</body>

</htm