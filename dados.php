
<!-- FAZENDO INSERT NO MYSQL -->
<?php
$orgao = $_POST["orgao"];
$programa = $_POST["programa"];
$acao = $_POST["acao"];
$indicador = $_POST["indicador"];
$realizado = $_POST["realizado"];
$observacao = $_POST["obs"];
$data_resposta = $_POST["dtresposta"];
$name = $_POST["name"];

$servername    = "localhost"; 
$user = "root"; 
$password = ""; 
$db_Name = "suplan"; 

$conn = new mysqli($servername, $user, $password, $db_Name);

if ($conn->connect_error) {

    die("Sem acesso ao Banco" . $conn->connect_error);
};

$sql= "insert into tbquestionario(orgao, programa, acao, indicador, vl_realizado, observacao, dataResposta, nomeRespondente) values ('$orgao','$programa','$acao','$indicador','$realizado','$observacao','$data_resposta','$name')";

if($conn->query($sql) == TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!-- FAZENDO UMA QUERY NO MYSQL PARA O SEGUNDO SELECT  -->
<?php 
include('conexao.php');

if(isset($_POST["listaUP_id"]) && !empty($_POST["listaUP_id"])){
    
    $query = $conn->query("select * from tb_indicadores where codigo_up = ".$_POST['listaUP_id']." group by programa");
    while($row = $query->fetch_assoc() or die($conn->error)){  
            echo '<option value="'.$row['codigo_programa'].'">'.$row['programa'].'</option>';
        }
    }

    if(isset($_POST["listaPrg_id"]) && !empty($_POST["listaPrg_id"])){
        //Get all city data
        $query = $conn->query("select * from tb_indicadores where codigo_programa = ".$_POST['listaPrg_id']." group by acao");  
        while($row = $query->fetch_assoc() or die($conn->error)){ 
                echo '<option value="'.$row['codigo_acao'].'">'.$row['acao'].'</option>';
            }
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <title>Inserido</title>
   <style>
   
.bt{
    background-color: white;
    width: 30%;
    height: 40px;
    border-radius: 25px;
    font-size: 13pt;
    margin-left: 33%;
}
a{
    text-decoration:none;
    color: black;
    text-transform: uppercase;
}


   </style>
</head>
<body>
   <h2 class="form">FORMULÁRIO CRIADO COM SUCESSO</h2> 
   <button class="bt"><a href="index.php">Voltar ao formulário</a></button>
</body>
</html>