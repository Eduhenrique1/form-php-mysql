
<!-- FAZENDO INSERT NO MYSQL -->
<?php
$nome = $_POST["name"];
$departamento = $_POST["cat"];
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

$sql= "INSERT INTO tbquestionario(Nome,departamento, dataResposta, quantidadeRealizada, quantidadeReal, valorProvisionado, valorUtilizado,ResultadoFinal, Observacao) VALUES ('$nome','$departamento','$dataResposta','$quantidadeRealizada','$quantidadeReal','$valorProvisionado','$valorUtilizado','$Resultado','$Observacao')";

if($conn->query($sql) == TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!-- FAZENDO UMA QUERY NO MYSQL PARA O SEGUNDO SELECT  -->
<?php 
//Include database configuration file
include('conexao.php');

if(isset($_POST["cat_id"]) && !empty($_POST["cat_id"])){
    //Get all state data
    $query = $conn->query("SELECT * FROM sub WHERE id_cat= ".$_POST['cat_id']." order by nome_sub ");
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id_cat'].'">'.$row['nome_sub'].'</option>';
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