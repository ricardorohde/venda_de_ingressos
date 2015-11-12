<?php
 
include ('conn.php');

session_start();
			  if((!isset ($_SESSION['userClient']) == true) and (!isset ($_SESSION['passClient']) == true)) {
				   unset($_SESSION['userClient']);
				    unset($_SESSION['passClient']);
					 header('location:login.php'); 
				   } 
                   //$logado = $_SESSION['login'];


$id_evento= $_POST['id_evento'];

$query = "SELECT id_cliente FROM cliente WHERE email= '{$_SESSION['userClient']}' limit 1 ";
$result = $conn->query($query);
while($row = $result->fetch_array())
				{
				$id_cliente = $row['id_cliente'];
				
				// grava compra
mysqli_query($conn,"SELECT * FROM ingressos");
mysqli_query($conn,"INSERT INTO ingressos (id_cliente,id_evento) 
					VALUES ('{$id_cliente}', '{$id_evento}')");					
				}
	
mysqli_close($conn);				
header('Location: minhas_compras.php')

?>