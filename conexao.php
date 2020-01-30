<? php 

$servername    = "localhost"; 
$user = "root"; 
$password = ""; 
$db_Name = "suplan"; 

$conn = new mysqli($servername, $user, $password, $dbname);

    if ($conn->connect_error) {

        die("Sem acesso ao Banco" . $conn->connect_error);
    };
    
    $conn->close();
    ?>;
?>