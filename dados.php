<?php

$nome = $_POST["name"];
$departamento = $_POST["dp"];
$dataResposta = $_POST["dtres"];
$quantidadeRealizada = $_POST["qtreali"];
$quantidadeReal = $_POST["qtreal"];
$valorProvisionado = $_POST["valorP"];
$valorUtilizado = $_POST["valorU"];
$Resultado = $_POST["rfinal"];
$Observacao = $_POST["obs"];

$servername    = "localhost"; 
$user = "root"; 
$password = ""; 
$db_Name = "suplan"; 

$conn = new mysqli($servername, $user, $password, $db_Name);

if ($conn->connect_error) {

    die("Sem acesso ao Banco" . $conn->connect_error);
};

$sql= "insert into tbquestionario(Nome,departamento, dataResposta, quantidadeRealizada, quantidadeReal, valorProvisionado, valorUtilizado,ResultadoFinal, Observacao) VALUES ('$nome','$departamento','$dataResposta','$quantidadeRealizada','$quantidadeReal','$valorProvisionado','$valorUtilizado','$Resultado','$Observacao')";

if($conn->query($sql) == TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <title>Inserido</title>
</head>
<body>
   <h2 class="form">FORMULÁRIO CRIADO COM SUCESSO</h2> 
   <a href="index.php">Voltar ao formulário</a>
</body>
</html>