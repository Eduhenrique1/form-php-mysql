<?php  
   $servername = "localhost";
   $user = "root";
   $password = "";
   $dbname = "suplan";


   $conn = mysqli_connect($servername, $user, $password, $dbname);

   if ($conn->connect_error) {

       die("Sem acesso ao Banco" . $conn->connect_error);
   };

?>