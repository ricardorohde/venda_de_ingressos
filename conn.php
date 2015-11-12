
<?php

$conn = new mysqli("localhost","root","","venda_de_ingressos");
$conn-> set_charset ("utf8");
error_reporting(0);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Falha de conexão", mysqli_connect_error());
    exit();
} 

?>

